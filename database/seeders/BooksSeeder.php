<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Alice in Wonderlands',
                'description' => 'Alice goes down a rabbit hole to find the mysterious underground Wonderland. She encounters fabulous creatures that defy all reasonable expectations. After numerous incoherent adventures involving a Hatter, a Hare and the Queen of Hearts, she wakes up in time for tea.'
            ],
            [
                'title' => 'Dwarf Fortress',
                'description' => 'Some dwarves try to survive the most hardest environment to thrives in the mountains',
            ],
            [
                'title' => 'Harry Potter And the Sorcerers Stone',
                'description' => 'On his 11th birthday, Harry receives a letter inviting him to study magic at the Hogwarts School of Witchcraft and Wizardry. Harry discovers that not only is he a wizard, but he is a famous one. He meets two best friends, Ron Weasley and Hermione Granger, and makes his first enemy, Draco Malfoy.'
            ],
            [
                'title' => 'Harry Potter and the Chamber of Secrets',
                'description' => 'Back at Hogwarts School of Witchcraft and Wizardry for his second year, Harry hears strange whispers echo through empty corridors - and then the attacks start.'
            ],
            [
                'title' => 'Harry Potter and the Prisoner of Azkaban',
                'description' => 'Back at Hogwarts School of Witchcraft and Wizardry for his second year, Harry hears strange whispers echo through empty corridors - and then the attacks start.'
            ],
            [
                'title' => 'Harry Potter and the Goblet of Fire',
                'description' => 'Harry is unexpectedly entered into the Triwizard Tournament, a dangerous magical competition between three wizarding schools. As Harry faces various challenges and uncovers a dark conspiracy, he learns more about the return of the dark wizard Lord Voldemort.'
            ],
            [
                'title' => 'Harry Potter and the Order of the Phoenix',
                'description' => 'In his fifth year at Hogwarts, Harry is confronted with skepticism from the wizarding world about Voldemort’s return. He forms Dumbledore’s Army to teach fellow students defensive spells and faces a tragic loss that propels him into a dangerous journey.'
            ],
            [
                'title' => 'Harry Potter and the Half-Blood Prince',
                'description' => 'As Dumbledore and Harry delve into Voldemort’s past, they discover crucial information about Horcruxes, objects containing pieces of Voldemort\'s soul. Meanwhile, dark forces strengthen, and friendships are tested as the wizarding world prepares for a final confrontation.'
            ],
            [
                'title' => 'Harry Potter and the Deathly Hallows',
                'description' => 'In the final installment, Harry, Ron, and Hermione embark on a perilous quest to find and destroy the remaining Horcruxes. The trio faces betrayal, loss, and unexpected alliances as they confront the ultimate battle between good and evil at Hogwarts.'
            ],
            [
                'title' => 'Northern Lights (The Golden Compass)',
                'description' => 'In a parallel universe where every human has a dæmon, a shape-shifting animal companion, Lyra Belacqua embarks on a journey to the Arctic to uncover a sinister plot involving kidnapped children, mysterious particles known as Dust, and a vast conspiracy that spans worlds.'
            ],
            [
                'title' => 'The Subtle Knife',
                'description' => 'Lyra\'s journey continues as she teams up with a boy named Will Parry, armed with a magical knife that can cut through any material, including the fabric of reality itself. Together, they explore new worlds and confront powerful adversaries in a quest to understand the nature of Dust and its impact on the multiverse.'
            ],
            [
                'title' => 'The Amber Spyglass',
                'description' => 'In the epic conclusion, Lyra and Will face their greatest challenges yet. The fate of all worlds hangs in the balance as they confront the Authority, the powerful figure at the center of a cosmic struggle. The story explores love, sacrifice, and the nature of consciousness in a breathtaking finale.'
            ],
        ];

        foreach ($books as $book) {
            if (!Book::where('title', $book['title'])->first()) {
                Book::create($book);
            }
        }
    }
}
