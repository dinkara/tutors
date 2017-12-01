<?php

namespace App\Support\Enum;


class Sentences
{
    public static function all(){
        return [
            SentenceCategories::IMPRESSION =>  [
                "{{student.name}} is one of the best students in his level.",
                "{{student.name}} is one of my favorite students and I am very proud of him.",
                "{{student.name}} never fails to surprise me with his unique way of comprehending new vocabulary.",
                "I am very happy with {{student.name}}'s work in my class.",
                "{{student.name}} is a great student and consistently shows he is eager to learn.",
                "I am impressed with {{student.name}} as a new student, he has my curiosity.", 
                "{{student.name}}'s english skills aren't yet as good as the others in his level.",
                "I think {{student.name}} has a lot of potential.",

            ],
            SentenceCategories::PARTICIPATION =>  [
                "He always asks questions whenever he is confused about something and I encourage him to continue doing so.",
                "He consistently participates in class, which is great for his learning.",
                "I am quite happy with his class participation.",
                "He sometimes needs a little motivation to participate in class.",
                "He is quite shy about participating in class.",
                "His work is always so well-done and creative.",
                "He is always enthusiastic to participate in class, I like his positive energy",
                "He seems to make an honest effort in class.",
                "He completes his classwork consistently.",
            ],
            SentenceCategories::ATTITUDE =>  [
                "I am really glad that {{student.name}} is both learning and having fun at my class!",
                "{{student.name}}'s positive attitude in class is such a delightful influence on his classmates!",
                "He seems to really enjoy learning english, and always brings with him a positive attitude to c	lass.",
                "He always has an excellent attitude towards his studies.",
                "He brings a lot of energy to the classroom, which is often good, but sometimes causes him to become distracted in class.",
                "He frequently needs to be reminded to speak in english during class, I don’t like that at all.",
                "I love the positive energy he brings to the classroom!",
                "He gets along with his classmates really well.",
            ],
            SentenceCategories::VOCABULARY =>  [
                "I am impressed by his ability to express himself using familiar words.",
                "{{student.name}} loves to explore using different words when he is speaking to.",
                "{{student.name}} always seems excited to use the new words he learned in class!",
                "{{student.name}} is never scared to use new words that he learns, which is great for his learning.",
                "{{student.name}} has a great vocabulary for his level, and uses it well.",
                "His vocabulary skills are good enough to understand most of the material we cover in class.",
                "He is still having some problems with his vocabulary.",
                "{{student.name}} would benefit by further studying vocabulary from past lessons.",

            ],
            SentenceCategories::SPEAKING =>  [
                "His speaking is great, and he always shows enthusiasm to speak in english.",
                "He is always eager and confident to practice his speaking at every given opportunity.",
                "{{student.name}} loves to speak in class and interact with me.", 
                "He is not shy to speak English in class, so his speaking skills are showing improvement.",
                "He uses every opportunity in class to speak English, so his speaking is improving on a steady rate.",
                "He is a little shy to speak English on his own accord.",
                "He seems quite shy and does not like to speak much, so his speaking and pronunciation need a bit of work.",
                "I think {{student.name}} needs to overcome his shyness, so he can practice speaking English in class more.",

            ],
            SentenceCategories::READING =>  [
                "He reads confidently and does not show shyness when he encounters unfamiliar words.",
                "{{student.name}} is able to read and learn new and unfamiliar words  very easily, I am truly impressed.", 
                "He reads material in class very enthusiastically and is not afraid to make mistakes.",
                "He is able to read quite fluently and seamlessly for his level and age.",
                "{{student.name}} can read well on his own with only occasional assistance.",
                "I am happy with {{student.name}}'s reading level, and he is showing excellent improvement.",
                "He reads quite smoothly for his level.",
                "The reading material given in class is well-suited for his reading level.",

            ],
            SentenceCategories::CONCLUSION =>  [
                "I hope {{student.name}}'s hard work and behavior will influence his classmates.",
                "I am not worried about {{student.name}} at all. He is such a great student.",
                "I enjoy teaching {{student.name}} and seeing him learning so many new things.",
                "I think if {{student.name}} keeps up his hard work and effort, he will grow to be a great english speaker.",
                "{{student.name}} has shown himself to be a smart child, and I am not worried by his progress in my class.",
                "This student] does not seem intimidated by the task of learning english. With this attitude, his english skills will continue to grow.",
                "If {{student.name}} keeps up the great work, he will have much success in his studies.", 
                "I am excited about {{student.name}}'s learning ability and I can't wait to see how he will grow in the future.",
                "He is a great student to have.",

            ],            
            
        ];
    }
    
    public static function count(){
        return count(Sentences::all(), COUNT_RECURSIVE) - count(Sentences::all());
    }

}