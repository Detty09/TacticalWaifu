<?php

namespace Database\Seeders;

use App\Models\DereType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DereTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dereTypes = [
            ['name' => 'Tsundere', 'description' => 'A tsundere refers to an outwardly violent character who "runs hot and  cold", alternating between two distinct moods: tsuntsun (aloof or irritable) and deredere (lovestruck).  There are 2 types of tsundere; tsundere type A (harsh is their default mood, they’re rude until someone triggers their sweet side) and tsundere type B (sweet is their default mood, they’re friendly in public but they  act mean towards their love interest).'],
            ['name' => 'Yandere', 'description' => 'They start out as nice and friendly, especially towards their love interest. That is until something or someone comes between them, then they become dark and obsessive over the one they love. Love makes them crazy, often violently so. They’re mentally destructive in nature through either over protectiveness, violence, brutality or all three combined.'],
            ['name' => 'Kuudere', 'description' => 'Someone who is calm and collected on the outside, and they rarely panic. I believe there are 2 types of kuuderes; one who pretends to be emotionless,  and one who’s actually emotionless. Either way, they turn out to be really caring - especially towards their love interest.'],
            ['name' => 'Dandere', 'description' => 'A dandere character is one who is quiet and asocial, possibly to  the point of coming across as emotionless at times, when they’re really just shy or afraid to talk. They will become talkative and sweet when alone with the right person.'],
            ['name' => 'Deredere', 'description' => 'Derederes are extremely lovey-dovey, always chasing and  fawning over the person they love. They\'re not ashamed and have no problems  with public displays of affection. They don’t hide their feelings, and no matter what may happen, they quickly revert to their cheerful self.'],
            ['name' => 'Bakadere', 'description' => 'Characters who are clumsy and stupid when it comes to expressing their love. They’re either oblivious to romance or don’t know how to express it.  They are for the most part very innocent and sweet, but their stupidity outshines their other attributes.'],
            ['name' => 'Bodere', 'description' => 'Boderes are usually shy around those  they’re infatuated with, and get embarrassed easily. They don’t know how to handle their embarrassment and so they use their fists instead of their words, and lash out so they can hide their shyness. Though they don\'t necessarily have a harsh exterior otherwise, and may feel  bad about their outbursts of violence.'],
            ['name' => 'Byoukidere', 'description' => 'A byoukidere refers to a character who is usually very sweet and kind, but suffers from a physical disease, usually a fatal one. Due to this, they are weak and frail. They are very kind, helpful, and sweet in nature.'],
            ['name' => 'Darudere', 'description' => 'Darudere characters would rather sit around and show no emotion towards  anyone, including their love interest. They are nonchalant to those whom  they love, but they do express emotions, they just usually show no interest  in those who like them.'],
            ['name' => 'Dorodere', 'description' => 'They appear sweet and lovable on the outside, but are twisted or  disturbed on the inside for various reasons. They initially act  lovey-dovey but their hidden deranged side can strike  at any moment. They can also possess the mind of a yandere, except they  don’t act on those thoughts.'],
            ['name' => 'Hajidere', 'description' => 'A hajidere is someone who is nervous and embarrassed around their crush. They get so shy around their love interest that they blush and have trouble confessing their feelings. On some occasions, they might even faint from being so bashful. Nonetheless, they can be social and outgoing with their peers.'],
            ['name' => 'Himedere', 'description' => 'A himedere is a female version of an oujidere. They act like a princess and want to be treated  like royalty.  They\'re often arrogant and overly dramatic. They will however, soften over time with their love interest.'],
            ['name' => 'Hinedere', 'description' => 'A hinedere is someone who has cynical world views.  They have a nihilistic view of the world and often see the worst rather than the best. Though cold-hearted and arrogant, their soft side is shown after their love interest breaks through.'],
            ['name' => 'Kamidere', 'description' => 'This describes someone with a god complex. They are arrogant and proud, and aren’t afraid to speak their minds and show everyone how right they are.  Their pride makes them highly arrogant, overconfident and stubborn. They  think they should get special attention and priority, but will eventually become loving once their exterior is broken.'],
            ['name' => 'Kanedere', 'description' => 'A kanedere refers to someone who is attracted to others with money or status. They’re the anime/manga equivalent of a gold digger, and they can be snobbish towards poor people. They only show affection and care towards people with money and how much money they have, but a true love can break their habit.'],
            ['name' => 'Kekkondere', 'description' => 'A kekkondere is someone who wants to get married right away, despite  having only just met. They immediately decide after they meet someone of interest  that they\'re the right person for them, and begin planning their  marriage.'],
            ['name' => 'Mayadere', 'description' => 'A mayadere refers to a character who is often a dangerous antagonist of a  series, but switches sides after falling in love with another character. However, they might remain deadly and unpredictable.'],
            ['name' => 'Megadere', 'description' => 'A megadere is someone who is obsessed with their love interest. They’re like derederes but to the extreme. They fangirl/fanboy over their love interest whenever they can; sometimes to the point of stalking, and they might even steal their items. However, despite their obsessive nature, they will never commit violent acts or manipulate their love interest.'],
            ['name' => 'Nemuidere', 'description' => 'A nemuidere refers to a character that spends much of his/her  time sleeping. Nemuidere characters tend to be very lazy and laconic in  nature but they can also be intelligent and artistic, if only they weren\'t such a  sleepyhead. Unlike a darudere, they sometimes show interest towards the one they love. They can be motivated by their loved interest to become less sleepy.'],
            ['name' => 'Nyandere', 'description' => 'A nyandere is a vague type of dere that\'s just cat-related.  While they don\'t have to actually be a cat; they are picky, needy, and punctuate their sentences with a cute meow.'],
            ['name' => 'Shundere', 'description' => 'A shundere is someone who is depressed without a specific reason. They might gradually open up, especially towards their love interest.  They’re chronically depressed and they have a tendency to ignore and avoid others.  However, not all shunderes show their chronic sadness, meaning their depression isn’t always obvious.  They might open up slightly if they find the right one.'],
            ['name' => 'Undere', 'description' => 'These people agree with pretty much everything their crush regardless of their true feelings. They do this to get closer to their crush, and they don’t want to offend by saying no in fear of losing them. This may cause them to be taken advantage of since they do pretty much whatever their love wants.'],
            ['name' => 'Yottadere', 'description' => 'A yottadere is a character who is addicted to alcohol. They’re rarely seen without alcohol in their hands and so they’re often drunk. It is rare for them to be sober, but they might stop drinking if it means having their special someone.'],
        ];
        foreach ($dereTypes as $type) {
            DereType::create($type);
        }
    }
}
