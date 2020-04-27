<?php


namespace App\DesignByCode;


use Kalnoy\Nestedset\Collection;

class Inspire
{

    public static function quote()
    {
        return Collection::make([
            [
                'name' => 'Deuteronomy 28:19',
                'passage' => 'You will be cursed when you come in and cursed when you go out.'

            ],
            [
                'name' => '2 Chronicles 32:12',
                'passage' => 'Did not Hezekiah himself remove this god\'s high places and altars, saying to Judah and Jerusalem, \'You must worship before one altar and burn sacrifices on it\'?'

            ],
            [
                'name' => 'Jeremiah 27:8',
                'passage' => 'If, however, any nation or kingdom will not serve Nebuchadnezzar king of Babylon or bow its neck under his yoke, I will punish that nation with the sword, famine and plague, declares the LORD, until I destroy it by his hand.'

            ],
            [
                'name' => 'Luke 3:27',
                'passage' => 'The son of Joanan, the son of Rhesa, the son of Zerubbabel, the son of Shealtiel, the son of Neri'

            ],
            [
                'name' => 'Jeremiah 13:16',
                'passage' => 'Give glory to the LORD your God before he brings the darkness, before your feet stumble on the darkening hills. You hope for light, but he will turn it to utter darkness and change it to deep gloom.'

            ],
            [
                'name' => 'John 8:54',
                'passage' => 'Jesus replied, "If I glorify myself, my glory means nothing. My Father, whom you claim as your God, is the one who glorifies me.'

            ],
            [
                'name' => '1 Peter 5:6',
                'passage' => 'Humble yourselves, therefore, under God\'s mighty hand, that he may lift you up in due time.'

            ],
            [
                'name' => '3 John 1:8',
                'passage' => 'We ought therefore to show hospitality to such people so that we may work together for the truth.'

            ],
            [
                'name' => 'Deuteronomy 14:2',
                'passage' => 'For you are a people holy to the LORD your God. Out of all the peoples on the face of the earth, the LORD has chosen you to be his treasured possession.'

            ],
            [
                'name' => 'Joshua 22:22',
                'passage' => 'The Mighty One, God, the LORD! The Mighty One, God, the LORD! He knows! And let Israel know! If this has been in rebellion or disobedience to the LORD, do not spare us this day.'

            ],
            [
                'name' => 'Genesis 35:2',
                'passage' => 'So Jacob said to his household and to all who were with him, "Get rid of the foreign gods you have with you, and purify yourselves and change your clothes."'

            ],
            [
                'name' => 'Psalms 6:1',
                'passage' => 'For the director of music. With stringed instruments. According to sheminith. A psalm of David. LORD, do not rebuke me in your anger or discipline me in your wrath.'

            ],
            [
                'name' => 'Genesis 32:24',
                'passage' => 'So Jacob was left alone, and a man wrestled with him till daybreak.'

            ],
            [
                'name' => 'Psalms 139:16',
                'passage' => 'Your eyes saw my unformed body. All the days ordained for me were written in your book before one of them came to be.'

            ],
            [
                'name' => 'Matthew 22:25',
                'passage' => 'Now there were seven brothers among us. The first one married and died, and since he had no children, he left his wife to his brother.'

            ],
            [
                'name' => 'Matthew 20:34',
                'passage' => 'Jesus had compassion on them and touched their eyes. Immediately they received their sight and followed him.'

            ],
            [
                'name' => 'Romans 6:5',
                'passage' => 'If we have been united with him in a death like his, we will certainly also be united with him in a resurrection like his.'

            ],
            [
                'name' => 'Ezra 4:2',
                'passage' => 'They came to Zerubbabel and to the heads of the families and said, "Let us help you build because, like you, we seek your God and have been sacrificing to him since the time of Esarhaddon king of Assyria, who brought us here."'

            ],
            [
                'name' => 'Luke 22:67',
                'passage' => 'If you are the Messiah," they said, "tell us." Jesus answered, "If I tell you, you will not believe me,"'

            ],

        ])->random();
    }



}
