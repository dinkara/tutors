<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Sentence\ISentenceRepo;
use App\Repositories\Category\ICategoryRepo;
use App\Support\Enum\SentenceCategories;
use App\Repositories\Comment\ICommentRepo;
use App\Support\Enum\CommentsSentenceJoiners;

class UserSentenceSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "make:sentences 
        {--userId= : User id}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Seed user sets of sentences";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ISentenceRepo $repo, ICategoryRepo $categoryRepo, ICommentRepo $commentRepo)
    {
        $sentences = [
            [ // row #0
                    "text" => "His work is always so well-done and creative.",
                    "category" => "impression",
            ],
            [ // row #1
                    "text" => "I think {{student.name}} has a lot of potentials.",
                    "category" => "impression",
            ],
            [ // row #2
                    "text" => "{{student.name}} is doing quite well with his studies.",
                    "category" => "impression",
            ],
            [ // row #3
                    "text" => "I am very proud of him.",
                    "category" => "impression",
            ],
            [ // row #4
                    "text" => "{{student.name}}'s English abilities are above average for his age.",
                    "category" => "impression",
            ],
            [ // row #5
                    "text" => "{{student.name}} is always smiling, I think he truly enjoys learning the English language.",
                    "category" => "impression",
            ],
            [ // row #6
                    "text" => "I think that he is very friendly and clever.",
                    "category" => "impression",
            ],
            [ // row #7
                    "text" => "He shows a strong desire to learn.",
                    "category" => "impression",
            ],
            [ // row #8
                    "text" => "I am very excited to have {{student.name}} in my class today.",
                    "category" => "impression",
            ],
            [ // row #9
                    "text" => "{{student.name}} is a pleasure to teach.",
                    "category" => "impression",
            ],
            [ // row #10
                    "text" => "{{student.name}} is a very lovely student.",
                    "category" => "impression",
            ],
            [ // row #11
                    "text" => "I'm very happy with {{student.name}}'s work in my class.",
                    "category" => "impression",
            ],
            [ // row #12
                    "text" => "{{student.name}} is an excellent example to other students.",
                    "category" => "impression",
            ],
            [ // row #13
                    "text" => "I am quite happy with his class participation.",
                    "category" => "participation",
            ],
            [ // row #14
                    "text" => "He sometimes needs a little motivation to start actively participating in the class, but he does well once he warms up to the lesson.",
                    "category" => "participation",
            ],
            [ // row #15
                    "text" => "It is great to see him co-operate so well with the same age-students.",
                    "category" => "participation",
            ],
            [ // row #16
                    "text" => "He is sometimes a little shy to participate in class.",
                    "category" => "participation",
            ],
            [ // row #17
                    "text" => "{{student.name}} participated very well in class today.",
                    "category" => "participation",
            ],
            [ // row #18
                    "text" => "{{student.name}} is quite friendly to his peers.",
                    "category" => "participation",
            ],
            [ // row #19
                    "text" => "I like how he is always focused.",
                    "category" => "participation",
            ],
            [ // row #20
                    "text" => "He always has an excellent attitude towards his studies!",
                    "category" => "attitude",
            ],
            [ // row #21
                    "text" => "He is very friendly to his classmates.",
                    "category" => "attitude",
            ],
            [ // row #22
                    "text" => "He was very well behaved today.",
                    "category" => "attitude",
            ],
            [ // row #23
                    "text" => "He worked well with other students.",
                    "category" => "attitude",
            ],
            [ // row #24
                    "text" => "I enjoyed how {{student.name}} interacts with his classmates.",
                    "category" => "attitude",
            ],
            [ // row #25
                    "text" => "{{student.name}} was very excited today, I enjoyed his positive energy.",
                    "category" => "attitude",
            ],
            [ // row #26
                    "text" => "I'm really glad that {{student.name}} seems to really enjoy my class.",
                    "category" => "attitude",
            ],
            [ // row #27
                    "text" => "He had lots of positive energy today!",
                    "category" => "attitude",
            ],
            [ // row #28
                    "text" => "It's great to see him interacting with his teacher so well.",
                    "category" => "attitude",
            ],
            [ // row #29
                    "text" => "His vocabulary seems to be comfortable with the level he is in.",
                    "category" => "vocabulary",
            ],
            [ // row #30
                    "text" => "His vocabulary skills still need some work so we must continue to learn new words in the future classes.",
                    "category" => "vocabulary",
            ],
            [ // row #31
                    "text" => "{{student.name}} is never scared to use new words that he learns, which is great for his learning.",
                    "category" => "vocabulary",
            ],
            [ // row #32
                    "text" => "{{student.name}} is never scared to use newly learned words when he constructs a sentence, which is very beneficial for his learning.",
                    "category" => "vocabulary",
            ],
            [ // row #33
                    "text" => "I would like to encourage him to continue learning new words for his vocabulary.",
                    "category" => "vocabulary",
            ],
            [ // row #34
                    "text" => "He is not afraid of making mistakes, that's why he can improve faster than the other students in his level.",
                    "category" => "vocabulary",
            ],
            [ // row #35
                    "text" => "We must continue learning new words, good vocabulary skills are very important at this level.",
                    "category" => "vocabulary",
            ],
            [ // row #36
                    "text" => "Please continue repeating today's vocabulary words at home.",
                    "category" => "vocabulary",
            ],
            [ // row #37
                    "text" => "Please continue practicing the pronunciation of {{words}} at home.",
                    "category" => "vocabulary",
            ],
            [ // row #38
                    "text" => "Today's words are {{words}}, please continue to practice them at home.",
                    "category" => "vocabulary",
            ],
            [ // row #39
                    "text" => "I would like to encourage you to continue practicing today's words ( {{words}} ) at home.",
                    "category" => "vocabulary",
            ],
            [ // row #40
                    "text" => "Don't forget to practice today's vocabulary words, they are {{words}}.",
                    "category" => "vocabulary",
            ],
            [ // row #41
                    "text" => "New words for today are {{words}}.",
                    "category" => "vocabulary",
            ],
            [ // row #42
                    "text" => "I am impressed by his ability to express himself using familiar words.",
                    "category" => "speaking",
            ],
            [ // row #43
                    "text" => "He did very well in today's speaking practice.",
                    "category" => "speaking",
            ],
            [ // row #44
                    "text" => "His sentence structure while speaking is showing improvement.",
                    "category" => "speaking",
            ],
            [ // row #45
                    "text" => "His speaking and pronunciation would benefit from more practice.",
                    "category" => "speaking",
            ],
            [ // row #46
                    "text" => "His speaking will improve.",
                    "category" => "speaking",
            ],
            [ // row #47
                    "text" => "I would like to encourage {{student.name}} to practice his Pronunciation a bit more at home.",
                    "category" => "speaking",
            ],
            [ // row #48
                    "text" => "We should continue improving it in the future classes.",
                    "category" => "speaking",
            ],
            [ // row #49
                    "text" => "He performed amazingly in our speaking practice today.",
                    "category" => "speaking",
            ],
            [ // row #50
                    "text" => "We repeated words several times to make sure he can pronounce them correctly.",
                    "category" => "speaking",
            ],
            [ // row #51
                    "text" => "He reads with confidence.",
                    "category" => "reading",
            ],
            [ // row #52
                    "text" => "he does not show shyness when he reads unfamiliar words.",
                    "category" => "reading",
            ],
            [ // row #53
                    "text" => "I am happy with {{student.name}}'s reading level, and he is always improving.",
                    "category" => "reading",
            ],
            [ // row #54
                    "text" => "His reading skills are outstanding for his age.",
                    "category" => "reading",
            ],
            [ // row #55
                    "text" => "His reading skills are showing improvement because of his hard work in class.",
                    "category" => "reading",
            ],
            [ // row #56
                    "text" => "{{student.name}} is not afraid to practice reading.",
                    "category" => "reading",
            ],
            [ // row #57
                    "text" => "I would like to encourage him to practice reading at home.",
                    "category" => "reading",
            ],
            [ // row #58
                    "text" => "His letter recognition is showing improvement.",
                    "category" => "reading",
            ],
            [ // row #59
                    "text" => "He is a quick learner, so I expect to continue to see improvement in his English skills.",
                    "category" => "conclusion",
            ],
            [ // row #60
                    "text" => "I believe that if {{student.name}} keeps up his hard work and effort, he will grow to be an excellent English speaker.",
                    "category" => "conclusion",
            ],
            [ // row #61
                    "text" => "I am very happy with {{student.name}}'s progress in my class, and I hope he can keep it up.",
                    "category" => "conclusion",
            ],
            [ // row #62
                    "text" => "I enjoy having {{student.name}} as a student, and I hope he continues to work hard.",
                    "category" => "conclusion",
            ],
            [ // row #63
                    "text" => "He is having fun and learning at the same time!",
                    "category" => "conclusion",
            ],
            [ // row #64
                    "text" => "I am confident that he will become an excellent English speaker if he keeps his positive attitude.",
                    "category" => "conclusion",
            ],
            [ // row #65
                    "text" => "I am very happy to have him in my class.",
                    "category" => "conclusion",
            ],
            [ // row #66
                    "text" => "See you next time, {{teacher.nick}}",
                    "category" => "conclusion",
            ],
            [ // row #67
                    "text" => "See you next time buddy, {{teacher.nick}}",
                    "category" => "conclusion",
            ],
            [ // row #68
                    "text" => "I'm looking forward to our next class, {{teacher.nick}}",
                    "category" => "conclusion",
            ],
        ];
               
        $userId = $this->option("userId");
        $i = 0;
        foreach($sentences as $sentence){            
                $repo->create([
                    "user_id" => $userId,
                    "text" => $sentence["text"]
                ])->attachCategory($categoryRepo->findByName($sentence["category"])->getModel());
                $sentences[$i]["id"] = $repo->getModel()->id;
                $i++;
        }
        
        $comments = [
            [ // row #0
                    "text" => "{{student.name}} is an excellent example to other students, and i'm very happy with {{student.name}}'s work in my class. I think that he is very friendly and clever, and I like how he is always focused. He was very well behaved today. I would like to encourage you to continue practicing today's words ( {{words}} ) at home, and we must continue learning new words, good vocabulary skills are very important at this level. He is having fun and learning at the same time, and I am confident that he will become an excellent English speaker if he keeps his positive attitude. See you next time buddy, {{teacher.nick}}.",
                    "caption" => "Outstanding student - Well behaved",
                    "score" => 5,
                    "favorite" => 1,
                    "sentences" => [
                        [
                            "id" => $sentences[12]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[11]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[6]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[19]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[22]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[39]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[35]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[63]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[64]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[67]["id"],
                            "joiner" => null
                        ],
                    ],
            ],
            [ // row #1
                    "text" => "{{student.name}} is quite friendly to his peers, and i am quite happy with his class participation. He was very well behaved today, and he always has an excellent attitude towards his studies! He is not afraid of making mistakes, that's why he can improve faster than the other students in his level, additionally new words for today are {{words}}. His reading skills are showing improvement because of his hard work in class, and he did very well in today's speaking practice. I am very happy with {{student.name}}'s progress in my class, and I hope he can keep it up. See you next time buddy, {{teacher.nick}}.",
                    "caption" => "Very friendly - Read well - Speak well",
                    "score" => 5,
                    "favorite" => 1,
                    "sentences" => [
                        [
                            "id" => $sentences[18]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[13]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[22]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[20]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[34]["id"],
                            "joiner" => CommentsSentenceJoiners::ADDITIONALLY
                        ],
                        [
                            "id" => $sentences[41]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[55]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[43]["id"],
                            "joiner" => null                        
                        ],
                        [
                            "id" => $sentences[61]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[67]["id"],
                            "joiner" => null
                        ],
                    ],                 
                
            ],
            [ // row #2
                    "text" => "{{student.name}}'s English abilities are above average for his age, and he had lots of positive energy today! It's great to see him interacting with his teacher so well. He was very well behaved today, and i would like to encourage him to continue learning new words for his vocabulary, additionally today's words are {{words}}, please continue to practice them at home. We should continue improving it in the future classes, and his speaking will improve. I believe that if {{student.name}} keeps up his hard work and effort, he will grow to be an excellent English speaker. I'm looking forward to our next class, {{teacher.nick}}.",
                    "caption" => "Interacts well - speaking and vocab will improve",
                    "score" => 4,
                    "favorite" => 1,
                    "sentences" => [
                        [
                            "id" => $sentences[4]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[27]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[28]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[22]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[33]["id"],
                            "joiner" => CommentsSentenceJoiners::ADDITIONALLY
                        ],
                        [
                            "id" => $sentences[38]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[48]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[46]["id"],
                            "joiner" => null                        
                        ],
                        [
                            "id" => $sentences[60]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[68]["id"],
                            "joiner" => null
                        ],
                    ],                
            ],
            [ // row #3
                    "text" => "{{student.name}} participated very well in class today, and it is great to see him co-operate so well with the same age-students. I enjoyed how {{student.name}} interacts with his classmates. He always has an excellent attitude towards his studies! I would like to encourage you to continue practicing today's words ( {{words}} ) at home. He did very well in today's speaking practice, additionally i am happy with {{student.name}}'s reading level, and he is always improving. I enjoy having {{student.name}} as a student, and I hope he continues to work hard. See you next time, {{teacher.nick}}.",
                    "caption" => "Participated well - Improved well",
                    "score" => 4,
                    "favorite" => 1,
                    "sentences" => [
                        [
                            "id" => $sentences[17]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[15]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[24]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[20]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[39]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[43]["id"],
                            "joiner" => CommentsSentenceJoiners::ADDITIONALLY
                        ],
                        [
                            "id" => $sentences[53]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[62]["id"],
                            "joiner" => null                        
                        ],
                        [
                            "id" => $sentences[66]["id"],
                            "joiner" => null
                        ],
                    ],                   
            ],
            [ // row #4
                    "text" => "{{student.name}} is quite friendly to his peers, and i like how he is always focused. It's great to see him interacting with his teacher so well. He performed amazingly in our speaking practice today, and i would like to encourage him to continue learning new words for his vocabulary. His sentence structure while speaking is showing improvement. I am very happy to have him in my class. See you next time, {{teacher.nick}}.",
                    "caption" => "Very friendly , speaking is improving",
                    "score" => 4,
                    "favorite" => 1,
                    "sentences" => [
                        [
                            "id" => $sentences[18]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[19]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[28]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[49]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[33]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[44]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[65]["id"],
                            "joiner" => null                        
                        ],
                        [
                            "id" => $sentences[66]["id"],
                            "joiner" => null
                        ],
                    ],                 
            ],
            [ // row #5
                    "text" => "{{student.name}} is always smiling, I think he truly enjoys learning the English language, and he shows a strong desire to learn. It's great to see him interacting with his teacher so well. Please continue repeating today's vocabulary words at home. New words for today are {{words}}. I am happy with {{student.name}}'s reading level, and he is always improving, however his speaking and pronunciation would benefit from more practice. I am very happy to have him in my class. I'm looking forward to our next class, {{teacher.nick}}.",
                    "caption" => "Likes learning English - Needs to practice Pronunciation and Speaking",
                    "score" => 3,
                    "favorite" => 1,
                    "sentences" => [
                        [
                            "id" => $sentences[5]["id"],
                            "joiner" => CommentsSentenceJoiners::AND
                        ],
                        [
                            "id" => $sentences[7]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[28]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[36]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[41]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[53]["id"],
                            "joiner" => CommentsSentenceJoiners::HOWEVER
                        ],
                        [
                            "id" => $sentences[45]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[65]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[68]["id"],
                            "joiner" => null
                        ],
                    ],                            
            ],
            [ // row #6
                    "text" => "I enjoyed how {{student.name}} interacts with his classmates, additionally he always has an excellent attitude towards his studies! I'm really glad that {{student.name}} seems to really enjoy my class. His vocabulary skills still need some work so we must continue to learn new words in the future classes, however he is not afraid of making mistakes, that's why he can improve faster than the other students in his level. Please continue practicing the pronunciation of {{words}} at home. I am happy with {{student.name}}'s reading level, and he is always improving. I am confident that he will become an excellent English speaker if he keeps his positive attitude. See you next time buddy, {{teacher.nick}}.",
                    "caption" => "Friendly - Must study Vocab",
                    "score" => 3,
                    "favorite" => 1,
                    "sentences" => [
                        [
                            "id" => $sentences[24]["id"],
                            "joiner" => CommentsSentenceJoiners::ADDITIONALLY
                        ],
                        [
                            "id" => $sentences[20]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[26]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[30]["id"],
                            "joiner" => CommentsSentenceJoiners::HOWEVER
                        ],
                        [
                            "id" => $sentences[34]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[37]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[53]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[64]["id"],
                            "joiner" => null                        
                        ],
                        [
                            "id" => $sentences[67]["id"],
                            "joiner" => null
                        ],
                    ],                   
            ],
            [ // row #7
                    "text" => "{{student.name}} is a very lovely student. He sometimes needs a little motivation to start actively participating in the class, but he does well once he warms up to the lesson. He had lots of positive energy today, however I wouuld like to encourage {{student.name}} to practice his Pronunciation a bit more at home. We should continue improving it in the future classes. I would like to encourage you to continue practicing today's words ( {{words}} ) at home. I believe that if {{student.name}} keeps up his hard work and effort, he will grow to be an excellent English speaker. I am very happy to have him in my class. See you next time, {{teacher.nick}}.",
                    "caption" => "Lovely student - Needs motivation - Must practice Prononciation",
                    "score" => 2,
                    "favorite" => 1,
                    "sentences" => [
                        [
                            "id" => $sentences[10]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[14]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[27]["id"],
                            "joiner" => CommentsSentenceJoiners::HOWEVER
                        ],
                        [
                            "id" => $sentences[47]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[48]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[39]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[60]["id"],
                            "joiner" => null
                        ],
                        [
                            "id" => $sentences[65]["id"],
                            "joiner" => null                        
                        ],
                        [
                            "id" => $sentences[66]["id"],
                            "joiner" => null
                        ],
                    ],                 
            ],
        ];
                
        foreach($comments as $comment){            
                
                $commentRepo->create([
                    "user_id" => $userId,
                    "text" => $comment["text"],
                    "caption" => $comment["caption"],
                    "score" => $comment["score"],
                    "favorite" => $comment["favorite"],
                ]); 
                $order = 0;
                foreach($comment["sentences"] as $sentence){   
                    
                    $commentRepo->attachSentence($repo->find($sentence["id"])->getModel(), 
                                [
                                    "joiner" => $sentence["joiner"],
                                    "order" => $order
                                ]
                            );
                    $order++;
                }
        }        

    }
}
