<?php
class Model_updateExam extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->quizdb = $this->load->database('quizdb', TRUE);
    }

    public function  enableExam($quizid) {
        $this->quizdb->where('quizid',$quizid)->update('quiz',array('status' => 1));
        return $this->quizdb->affected_rows();
    }

    public function  disableExam($quizid) {
        $this->quizdb->where('quizid',$quizid)->update('quiz',array('status' => 0));
        return $this->quizdb->affected_rows();
    }

    public function  removeExam($quizid) {
        $query = $this->quizdb->select('*')->from('questions')->where('quizid',$quizid)->get();
        $questions = $query->result();
        foreach ($questions as $ques) {
            if($this->quizdb->where('quesid',$ques->quesid)->delete('user_answer') and $this->quizdb->where('quesid',$ques->quesid)->delete('options') and $this->quizdb->where('quesid', $ques->quesid)->delete('answer') )
                continue;
            else
                return false;
        }
        if($this->quizdb->where('quizid',$quizid)->delete('questions')) {
            $this->quizdb->where('quizid',$quizid)->delete('history');
            return $this->quizdb->where('quizid',$quizid)->delete('quiz');
        } else
            return false;
    }

    public function getExamByID($quizid) {
        $query = $this->quizdb->select('*')->from('quiz')->where('quizid',$quizid)->limit(1)->get();
        return $query->row();
    }

    public function getQuestionsByQuizID($quizid) {
        $query = $this->quizdb->select('*')->from('questions')->where('quizid',$quizid)->get();
        return $query->result();

    }

    public function getOptionsByQuestionID($quesid) {
        $query = $this->quizdb->select('*')->from('options')->where('quesid',$quesid)->get();
        return $query->result();
    }

    public function getCorrectAnsByID($quesid){
        return $this->quizdb->select('answer')->from('answer')->where('quesid', $quesid)->get()->row()->answer;
    }

    public function deleteQuestionByID($quizid,$quesid) {
        if($this->quizdb->where('quesid',$quesid)->delete('user_answer') and $this->quizdb->where('quesid',$quesid)->delete('options') and $this->quizdb->where('quesid', $quesid)->delete('answer') ) {
            $this->quizdb->where('quesid', $quesid)->delete('questions');
            $this->quizdb->query('update quiz set total = total-1 where quizid = ?',$quizid);
            if($this->quizdb->affected_rows())
                return true;
            else
                return false;
        }
        else
            return false;
    }

    public function updateinst($quizid, $inst){
        $this->quizdb->query('Update quizdb.quiz set instructions = " '.$inst.' " where quizid = '.$quizid);
    }

    public function updatequestion($question){
        $questionquery = 'update questions set qnstext = "'.$question['qnstext']. '" where quesid = '.$question['id'];
        $this->quizdb->query($questionquery);   

        if (array_key_exists('option', $question)) {
        foreach($question['option'] as $option){
            $optionquery = 'update options set text = "'.$option['text'].'" where optionid = '.$option['id'] ;
            $this->quizdb->query($optionquery);
        }
    }

        $corransquery = 'update answer set answer = "'.$question['correct']. '" where quesid = '.$question['id'];
        $this->quizdb->query($corransquery);
    }

    public function clone($quizid, $level, $title, $skill, $belongsto){

        $quizquery='insert into quiz 
        (title, correct, wrong, total, time,  status, Level, belongs_to, skill_id, difficulty_index, instructions) 
        select "'. $title .'", correct, wrong, total, time,  0, "'. $level .'" ,"'.$belongsto .'", "'.$skill .'", difficulty_index, instructions 
        from quiz 
        where quizid = '.$quizid;
        
        $this->quizdb->query($quizquery);
        
        // $title = $this->quizdb->select('title')->from('quiz')->where('quizid ', $quizid)->get()->row()->title;
        
        $newquizid = $this->quizdb->query('select max(quizid) as a from quiz where title = "'.$title.'"')->row()->a;
        // $newquizid = $this->quizdb->select_max('quizid')->where('title', $title)->get('quiz')->result();
        
        $questionsquery='insert into questions (qnstext, questions_img, accuracy, 
        difficulty, difficulty_level, quizid ) 
        select qnstext, 
        questions_img, 
        accuracy, 
        difficulty, 
        difficulty_level, '
        .$newquizid. 
        ' from questions where quizid ='. $quizid;
        
        $this->quizdb->query($questionsquery);
         $data =array();
         $quesarr = $this->quizdb->select('*')->from('questions')->where('quizid', $newquizid)->get()->result_array();
         $data['questions'] = $quesarr;
        foreach($quesarr as $question){
            $oldquestionid=$this->quizdb->query('select min(quesid) as a from questions where quizid = '.$quizid.' and qnstext = "'.$question['qnstext'].'"')->row()->a;
            
            $answersquery ='insert into answer (answer, quesid) 
            select answer, ' 
            .$question['quesid']. 
            ' from answer where quesid ='. $oldquestionid;                        //old question id should be here
            
            $this->quizdb->query($answersquery);
            
            // $data ->append($answersquery);
            
            array_push($data, $answersquery);
            
            $optionsquery = 'insert into options (option_label, text, img, quesid) 
            select option_label, text, img, ' 
            .$question['quesid']. 
            ' from options where quesid ='. $oldquestionid;
            
            $this->quizdb->query($optionsquery);

            // $data ->append ($optionsquery);
            array_push($data, $optionsquery);

        }

        // return $data;
    }
}