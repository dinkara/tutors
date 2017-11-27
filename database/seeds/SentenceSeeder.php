<?php

use Illuminate\Database\Seeder;
use App\Repositories\Sentence\ISentenceRepo;
use App\Repositories\Category\ICategoryRepo;
use App\Support\Enum\SentenceCategories;

class SentenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ISentenceRepo $repo, ICategoryRepo $categoryRepo)
    {
        $sentences = [
            SentenceCategories::IMPRESSION =>  [
                "{{student.name}} is one of the best students in his level.",
                "{{student.name}} is one of my favorite students.",
                "{{student.name}} never fails to surprise me with his great English abilities",
                "I am very happy with {{student.name}}'s work in my class.",
                "{{student.name}} is a great student and consistently shows he has great English abilities.",
                "I am impressed with {{student.name}} as a new student.",
                "{{student.name}}'s english skills aren't yet as good as the others in the class, but he has potential.",
                "I think {{student.name}} has a lot of potential.",
            ],
            SentenceCategories::PARTICIPATION =>  [
                "Whenever he is confused about something or has a question, he always asks questions, which is great.",
                "He consistently participates in class, which is great.",
                "I am quite happy with his class participation, and he completes his classwork consistently.",
                "He sometimes needs a little motivation to participate in class, but he does well once he warms up to the lesson.",
                "He is quite shy about participating in class, but he always does a good job with his written work.",
                "His work is always so well-done and creative.",
                "He is always enthusiastic to participate in class every day.",
                "He seems to make an honest effort in class.",
            ],
            SentenceCategories::ATTITUDE =>  [
                "I am really glad that {{student.name}} seems to really enjoy my class!",
                "{{student.name}}'s positive attitude in class is such a great influence on his classmates!",
                "He seems to really enjoy learning English, and always brings with him a positive attitude to c	lass every day.",
                "He always has a great attitude towards his studies. He gets along with his classmates really well.",
                "He brings a lot of energy to the classroom, which is often good, but sometimes causes him to become distracted in class.",
                "He frequently needs to be reminded to speak in English during class, which is not good for his speaking development.",
                "I love the positive energy he brings to the classroom!",
            ],
            SentenceCategories::VOCABULARY =>  [
                "I am impressed by his ability to express himself using a great vocabulary for his level.",
                "{{student.name}} loves to explore using different words when he is speaking to others or writing in his books!",
                "{{student.name}} always seems excited to use the new words he learns in class!",
                "{{student.name}} is never scared to use new words that he learns, which is great for his learning.",
                "{{student.name}} has a great vocabulary, and uses it well.",
                "His vocabulary skills are good enough to understand most of the material.",
                "He is still having some problems with his vocabulary.",
                "{{student.name}} would benefit by further studying vocabulary from past lessons.",
            ],
            SentenceCategories::SPEAKING =>  [
                "His speaking is great, and he always shows enthusiasm to speak in English.",
                "He is always eager and confident to practice his speaking at every given opportunity.",
                "{{student.name}} loves to speak in class, and speaks English without hesitation.",
                "He is not shy to speak English in class, so his speaking skills are showing improvement.",
                "He uses every opportunity in class to speak English, so his speaking is improving rapidly.",
                "He shows great speaking skills when called on, but he is a little shy to speak English on his own accord.",
                "He seems quite shy and does not like to speak much, so his speaking and pronunciation need a bit of work.",
                "I think {{student.name}} needs to overcome his shyness, so he can practice speaking English in class more.",
            ],
            SentenceCategories::READING =>  [
                "He reads confidently and does not show shyness when he reads unfamiliar words.",
                "{{student.name}} is able to read and learn new and unfamiliar words with great accuracy.",
                "He reads material in class very enthusiastically and is not afraid to make mistakes.",
                "He is able to read quite fluently and seamlessly for his level.",
                "{{student.name}} can read well on his own with only occasional assistance.",
                "I am happy with {{student.name}}'s reading level, and he is always improving.",
                "He reads quite smoothly for his level.",
                "The reading material given in class is well-suited for his reading level.",
            ],
            SentenceCategories::CONCLUSION =>  [
                "I hope {{student.name}}'s hard work and behavior will influence his classmates. He is a great student to have.",
                "I am not worried about {{student.name}} at all. He is such a great student.",
                "I enjoy teaching {{student.name}} and seeing him learn so many new things.",
                "I think if {{student.name}} keeps up his hard work and effort, he will grow to be a great English speaker.",
                "{{student.name}} does not seem intimidated by the task of learning English. With this attitude, his English skills will continue to grow.",
                "{{student.name}} keeps up the great work, he will have much success in his endeavors.",
                "{{student.name}} has shown himself to be a smart child, and I am not worried by his progress in my class.",
                "I am excited about {{student.name}}'s potential and I can't wait to see how he will grow in the future.",
            ],            
            
        ];
        
        foreach($sentences as $category => $values){
            foreach($values as $sentence){
                $repo->create([
                    "user_id" => 1,
                    "text" => $sentence
                ])->attachCategory($categoryRepo->findByName($category)->getModel());
            }
        }        
    }
}
