<?php

use App\Area;
use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                'name' => 'South Africa',
                'children' => [
                    [
                        'name' => 'Eastern Cape',
                        'children' => [
                            [
                                'name' => 'Aberdeen'
                            ],
                            [
                                'name' => 'Addo'
                            ],
                            [
                                'name' => 'Adelaide'
                            ],
                            [
                                'name' => 'Adendorp'
                            ],
                            [
                                'name' => 'Alexandria'
                            ],
                            [
                                'name' => 'Alice'
                            ],
                            [
                                'name' => 'Alicedale'
                            ],
                            [
                                'name' => 'Aliwal North'
                            ],
                            [
                                'name' => 'Balfour'
                            ],
                            [
                                'name' => 'Barkly East'
                            ],
                            [
                                'name' => 'Bathurst'
                            ],
                            [
                                'name' => 'Bedford'
                            ],
                            [
                                'name' => 'Bisho'
                            ],
                            [
                                'name' => 'Boesmansriviermond'
                            ],
                            [
                                'name' => 'Boknesstrand'
                            ],
                            [
                                'name' => 'Buffalo City'
                            ],
                            [
                                'name' => 'Burgersdorp'
                            ],
                            [
                                'name' => 'Butterworth'
                            ],
                            [
                                'name' => 'Cala'
                            ],
                            [
                                'name' => 'Cannon Rocks'
                            ],
                            [
                                'name' => 'Cape St Francis'
                            ],
                            [
                                'name' => 'Cathcart'
                            ],
                            [
                                'name' => 'Cedarville'
                            ],
                            [
                                'name' => 'Cintsa'
                            ],
                            [
                                'name' => 'Clarendon Marine'
                            ],
                            [
                                'name' => 'Coffee Bay'
                            ],
                            [
                                'name' => 'Colchester'
                            ],
                            [
                                'name' => 'Cookhouse'
                            ],
                            [
                                'name' => 'Cradock'
                            ],
                            [
                                'name' => 'Despatch'
                            ],
                            [
                                'name' => 'Dordrecht'
                            ],
                            [
                                'name' => 'East London'
                            ],
                            [
                                'name' => 'Eersterivierstrand'
                            ],
                            [
                                'name' => 'Elliot'
                            ],
                            [
                                'name' => 'Engcobo'
                            ],
                            [
                                'name' => 'Ezibeleni'
                            ],
                            [
                                'name' => 'Fort Beaufort'
                            ],
                            [
                                'name' => 'Gambleville'
                            ],
                            [
                                'name' => 'Gamtoos Mouth'
                            ],
                            [
                                'name' => 'Gqunube Green Ecovillage'
                            ],
                            [
                                'name' => 'Graaff-Reinet'
                            ],
                            [
                                'name' => 'Grahamstown'
                            ],
                            [
                                'name' => 'Great Kei'
                            ],
                            [
                                'name' => 'Hamburg'
                            ],
                            [
                                'name' => 'Hankey'
                            ],
                            [
                                'name' => 'Hofmeyr'
                            ],
                            [
                                'name' => 'Hogsback'
                            ],
                            [
                                'name' => 'Humansdorp'
                            ],
                            [
                                'name' => 'Ibhayi'
                            ],
                            [
                                'name' => 'Idutywa'
                            ],
                            [
                                'name' => 'Jamestown'
                            ],
                            [
                                'name' => 'Jansenville'
                            ],
                            [
                                'name' => 'Jeffreys Bay'
                            ],
                            [
                                'name' => 'Joubertina'
                            ],
                            [
                                'name' => 'Kareedouw'
                            ],
                            [
                                'name' => 'Katberg'
                            ],
                            [
                                'name' => 'Kei Road'
                            ],
                            [
                                'name' => 'Keiskammahoek'
                            ],
                            [
                                'name' => 'Kenton On Sea'
                            ],
                            [
                                'name' => 'King Williams Town'
                            ],
                            [
                                'name' => 'Kirkwood'
                            ],
                            [
                                'name' => 'Kleinemonde'
                            ],
                            [
                                'name' => 'Klipplaat'
                            ],
                            [
                                'name' => 'Komga'
                            ],
                            [
                                'name' => 'Koukamma'
                            ],
                            [
                                'name' => 'Krakeel River'
                            ],
                            [
                                'name' => 'Kwa Nobuhle'
                            ],
                            [
                                'name' => 'Lady Grey'
                            ],
                            [
                                'name' => 'Lusikisiki'
                            ],
                            [
                                'name' => 'Macelweni'
                            ],
                            [
                                'name' => 'Macleantown'
                            ],
                            [
                                'name' => 'Maclear'
                            ],
                            [
                                'name' => 'Matatiele'
                            ],
                            [
                                'name' => 'Middelburg'
                            ],
                            [
                                'name' => 'Middeldrift'
                            ],
                            [
                                'name' => 'Misgund'
                            ],
                            [
                                'name' => 'Molteno'
                            ],
                            [
                                'name' => 'Mount Fletcher'
                            ],
                            [
                                'name' => 'Mount Frere'
                            ],
                            [
                                'name' => 'Mthatha'
                            ],
                            [
                                'name' => 'Nieu Bethesda'
                            ],
                            [
                                'name' => 'Oyster Bay'
                            ],
                            [
                                'name' => 'Patensie'
                            ],
                            [
                                'name' => 'Paterson'
                            ],
                            [
                                'name' => 'Pearston'
                            ],
                            [
                                'name' => 'Peddie'
                            ],
                            [
                                'name' => 'Petersburg'
                            ],
                            [
                                'name' => 'Phakamisa'
                            ],
                            [
                                'name' => 'Port Alfred'
                            ],
                            [
                                'name' => 'Port Elizabeth'
                            ],
                            [
                                'name' => 'Port St Johns'
                            ],
                            [
                                'name' => 'Queenstown'
                            ],
                            [
                                'name' => 'Qumbu'
                            ],
                            [
                                'name' => 'Riebeek East'
                            ],
                            [
                                'name' => 'Rietbron'
                            ],
                            [
                                'name' => 'Seymour'
                            ],
                            [
                                'name' => 'Somerset East'
                            ],
                            [
                                'name' => 'South Seas'
                            ],
                            [
                                'name' => 'St Francis Bay'
                            ],
                            [
                                'name' => 'Sterkstroom'
                            ],
                            [
                                'name' => 'Steynsburg'
                            ],
                            [
                                'name' => 'Steytlerville'
                            ],
                            [
                                'name' => 'Stormberg'
                            ],
                            [
                                'name' => 'Storms River'
                            ],
                            [
                                'name' => 'Stutterheim'
                            ],
                            [
                                'name' => 'Tarkastad'
                            ],
                            [
                                'name' => 'Thornhill'
                            ],
                            [
                                'name' => 'Tsitsikamma'
                            ],
                            [
                                'name' => 'Tsolo'
                            ],
                            [
                                'name' => 'Tylden'
                            ],
                            [
                                'name' => 'Ugie'
                            ],
                            [
                                'name' => 'Uitenhage'
                            ],
                            [
                                'name' => 'Venterstad'
                            ],
                            [
                                'name' => 'Whittlesea'
                            ],
                            [
                                'name' => 'Willowmore'
                            ],
                            [
                                'name' => 'Zwelitsha'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Free State',
                        'children' => [
                            [
                                'name' => 'Allanridge'
                            ],
                            [
                                'name' => 'Arlington'
                            ],
                            [
                                'name' => 'Bethlehem'
                            ],
                            [
                                'name' => 'Bethulie'
                            ],
                            [
                                'name' => 'Bloemfontein'
                            ],
                            [
                                'name' => 'Boshof'
                            ],
                            [
                                'name' => 'Bothaville'
                            ],
                            [
                                'name' => 'Brandfort'
                            ],
                            [
                                'name' => 'Bultfontein'
                            ],
                            [
                                'name' => 'Clarens'
                            ],
                            [
                                'name' => 'Clocolan'
                            ],
                            [
                                'name' => 'Dealesville'
                            ],
                            [
                                'name' => 'Deneysville'
                            ],
                            [
                                'name' => 'Dewetsdorp'
                            ],
                            [
                                'name' => 'Edenburg'
                            ],
                            [
                                'name' => 'Edenville'
                            ],
                            [
                                'name' => 'Excelsior'
                            ],
                            [
                                'name' => 'Fauresmith'
                            ],
                            [
                                'name' => 'Ficksburg'
                            ],
                            [
                                'name' => 'Fouriesburg'
                            ],
                            [
                                'name' => 'Frankfort'
                            ],
                            [
                                'name' => 'Gariepdam'
                            ],
                            [
                                'name' => 'Harrismith'
                            ],
                            [
                                'name' => 'Heilbron'
                            ],
                            [
                                'name' => 'Hennenman'
                            ],
                            [
                                'name' => 'Hertzogville'
                            ],
                            [
                                'name' => 'Hobhouse'
                            ],
                            [
                                'name' => 'Hoopstad'
                            ],
                            [
                                'name' => 'Jacobsdal'
                            ],
                            [
                                'name' => 'Jagersfontein'
                            ],
                            [
                                'name' => 'Kestell'
                            ],
                            [
                                'name' => 'Koffiefontein'
                            ],
                            [
                                'name' => 'Koppies'
                            ],
                            [
                                'name' => 'Kragbron'
                            ],
                            [
                                'name' => 'Kroonstad'
                            ],
                            [
                                'name' => 'Ladybrand'
                            ],
                            [
                                'name' => 'Lindley'
                            ],
                            [
                                'name' => 'Luckhoff'
                            ],
                            [
                                'name' => 'Mangaung'
                            ],
                            [
                                'name' => 'Marquard'
                            ],
                            [
                                'name' => 'Memel'
                            ],
                            [
                                'name' => 'New Jerusalem'
                            ],
                            [
                                'name' => 'Northern Free State'
                            ],
                            [
                                'name' => 'Odendaalsrus'
                            ],
                            [
                                'name' => 'Oranjeville'
                            ],
                            [
                                'name' => 'Parys'
                            ],
                            [
                                'name' => 'Paul Roux'
                            ],
                            [
                                'name' => 'Petrus Steyn'
                            ],
                            [
                                'name' => 'Petrusburg'
                            ],
                            [
                                'name' => 'Philippolis'
                            ],
                            [
                                'name' => 'Phuthaditjhaba'
                            ],
                            [
                                'name' => 'Reddersburg'
                            ],
                            [
                                'name' => 'Reitz'
                            ],
                            [
                                'name' => 'Renovaal'
                            ],
                            [
                                'name' => 'Rosendal'
                            ],
                            [
                                'name' => 'Rouxville'
                            ],
                            [
                                'name' => 'Sasolburg'
                            ],
                            [
                                'name' => 'Senekal'
                            ],
                            [
                                'name' => 'Smithfield'
                            ],
                            [
                                'name' => 'Springfontein'
                            ],
                            [
                                'name' => 'Steynsrus'
                            ],
                            [
                                'name' => 'Thaba Nchu'
                            ],
                            [
                                'name' => 'Theunissen'
                            ],
                            [
                                'name' => 'Trompsburg'
                            ],
                            [
                                'name' => 'Tweeling'
                            ],
                            [
                                'name' => 'Tweespruit'
                            ],
                            [
                                'name' => 'Vaal River'
                            ],
                            [
                                'name' => 'Ventersburg'
                            ],
                            [
                                'name' => 'Verkeerdevlei'
                            ],
                            [
                                'name' => 'Vierfontein'
                            ],
                            [
                                'name' => 'Viljoenskroon'
                            ],
                            [
                                'name' => 'Villiers'
                            ],
                            [
                                'name' => 'Virginia'
                            ],
                            [
                                'name' => 'Vrede'
                            ],
                            [
                                'name' => 'Vredefort'
                            ],
                            [
                                'name' => 'Warden'
                            ],
                            [
                                'name' => 'Welkom'
                            ],
                            [
                                'name' => 'Wepener'
                            ],
                            [
                                'name' => 'Wesselsbron'
                            ],
                            [
                                'name' => 'Winburg'
                            ],
                            [
                                'name' => 'Zamdela'
                            ],
                            [
                                'name' => 'Zastron'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Gauteng',
                        'children' => [
                            [
                                'name' => 'Akasia'
                            ],
                            [
                                'name' => 'Alberton'
                            ],
                            [
                                'name' => 'Bedfordview'
                            ],
                            [
                                'name' => 'Benoni'
                            ],
                            [
                                'name' => 'Boksburg'
                            ],
                            [
                                'name' => 'Brakpan'
                            ],
                            [
                                'name' => 'Bronkhorstspruit'
                            ],
                            [
                                'name' => 'Carletonville'
                            ],
                            [
                                'name' => 'Centurion'
                            ],
                            [
                                'name' => 'Cradle Of Humankind'
                            ],
                            [
                                'name' => 'Cullinan'
                            ],
                            [
                                'name' => 'Dainfern'
                            ],
                            [
                                'name' => 'De Deur'
                            ],
                            [
                                'name' => 'Devon'
                            ],
                            [
                                'name' => 'Edenvale'
                            ],
                            [
                                'name' => 'Eikenhof'
                            ],
                            [
                                'name' => 'Evaton'
                            ],
                            [
                                'name' => 'Fochville'
                            ],
                            [
                                'name' => 'Ga-rankuwa'
                            ],
                            [
                                'name' => 'Germiston'
                            ],
                            [
                                'name' => 'Greenstone Hill'
                            ],
                            [
                                'name' => 'Hammanskraal'
                            ],
                            [
                                'name' => 'Heidelberg'
                            ],
                            [
                                'name' => 'Johannesburg'
                            ],
                            [
                                'name' => 'Katlehong'
                            ],
                            [
                                'name' => 'Kempton Park'
                            ],
                            [
                                'name' => 'Krugersdorp'
                            ],
                            [
                                'name' => 'Kwa-Thema'
                            ],
                            [
                                'name' => 'Lanseria'
                            ],
                            [
                                'name' => 'Lenasia'
                            ],
                            [
                                'name' => 'Lethabong'
                            ],
                            [
                                'name' => 'Mabopane'
                            ],
                            [
                                'name' => 'Magaliesburg'
                            ],
                            [
                                'name' => 'Mamelodi'
                            ],
                            [
                                'name' => 'Merafong City'
                            ],
                            [
                                'name' => 'Meyerton'
                            ],
                            [
                                'name' => 'Midrand'
                            ],
                            [
                                'name' => 'Midvaal'
                            ],
                            [
                                'name' => 'Modderfontein'
                            ],
                            [
                                'name' => 'Moloto'
                            ],
                            [
                                'name' => 'Muldersdrif'
                            ],
                            [
                                'name' => 'Needwood'
                            ],
                            [
                                'name' => 'Nigel'
                            ],
                            [
                                'name' => 'Nokeng Tsa Taemane'
                            ],
                            [
                                'name' => 'Olifantsfontein'
                            ],
                            [
                                'name' => 'Pienaars River'
                            ],
                            [
                                'name' => 'Pretoria'
                            ],
                            [
                                'name' => 'Randburg'
                            ],
                            [
                                'name' => 'Randfontein'
                            ],
                            [
                                'name' => 'Randvaal'
                            ],
                            [
                                'name' => 'Rayton'
                            ],
                            [
                                'name' => 'Roodeplaat'
                            ],
                            [
                                'name' => 'Roodepoort'
                            ],
                            [
                                'name' => 'Rosslyn'
                            ],
                            [
                                'name' => 'Sandton'
                            ],
                            [
                                'name' => 'Sebokeng'
                            ],
                            [
                                'name' => 'Silver Lakes'
                            ],
                            [
                                'name' => 'Soshanguve'
                            ],
                            [
                                'name' => 'Soweto'
                            ],
                            [
                                'name' => 'Springs'
                            ],
                            [
                                'name' => 'Tarlton'
                            ],
                            [
                                'name' => 'Temba'
                            ],
                            [
                                'name' => 'Tembisa'
                            ],
                            [
                                'name' => 'Vaal Dam'
                            ],
                            [
                                'name' => 'Vanderbijlpark'
                            ],
                            [
                                'name' => 'Vereeniging'
                            ],
                            [
                                'name' => 'Vosloorus'
                            ],
                            [
                                'name' => 'Walkerville'
                            ],
                            [
                                'name' => 'Waterfall'
                            ],
                            [
                                'name' => 'Westonaria'
                            ],
                            [
                                'name' => 'Winterveldt'
                            ],
                            [
                                'name' => 'Wonderboom'
                            ],
                        ]
                    ],
                    [
                        'name' => 'KwaZulu-Natal',
                        'children' => [
                            [
                                'name' => 'Adams Mission'
                            ],
                            [
                                'name' => 'Amanzimtoti'
                            ],
                            [
                                'name' => 'Amatikulu'
                            ],
                            [
                                'name' => 'Anerley'
                            ],
                            [
                                'name' => 'Ballito'
                            ],
                            [
                                'name' => 'Bergville'
                            ],
                            [
                                'name' => 'Bluff'
                            ],
                            [
                                'name' => 'Blythedale'
                            ],
                            [
                                'name' => 'Bulwer'
                            ],
                            [
                                'name' => 'Byrne'
                            ],
                            [
                                'name' => 'Camperdown'
                            ],
                            [
                                'name' => 'Cathedral Peak'
                            ],
                            [
                                'name' => 'Cathkin Park'
                            ],
                            [
                                'name' => 'Cato Ridge'
                            ],
                            [
                                'name' => 'Champagne Castle'
                            ],
                            [
                                'name' => 'Colenso'
                            ],
                            [
                                'name' => 'Cool Air'
                            ],
                            [
                                'name' => 'Cornubia'
                            ],
                            [
                                'name' => 'Craigieburn'
                            ],
                            [
                                'name' => 'Creighton'
                            ],
                            [
                                'name' => 'Dannhauser'
                            ],
                            [
                                'name' => 'Darnall'
                            ],
                            [
                                'name' => 'Desainagar'
                            ],
                            [
                                'name' => 'Donnybrook'
                            ],
                            [
                                'name' => 'Dundee'
                            ],
                            [
                                'name' => 'Durban'
                            ],
                            [
                                'name' => 'Durban North'
                            ],
                            [
                                'name' => 'Edendale'
                            ],
                            [
                                'name' => 'Empangeni'
                            ],
                            [
                                'name' => 'Eshowe'
                            ],
                            [
                                'name' => 'Esikhawini'
                            ],
                            [
                                'name' => 'Estcourt'
                            ],
                            [
                                'name' => 'Eston'
                            ],
                            [
                                'name' => 'Ezakheni'
                            ],
                            [
                                'name' => 'Folweni'
                            ],
                            [
                                'name' => 'Gamalakhe'
                            ],
                            [
                                'name' => 'Glencoe'
                            ],
                            [
                                'name' => 'Greytown'
                            ],
                            [
                                'name' => 'Hammarsdale'
                            ],
                            [
                                'name' => 'Harding'
                            ],
                            [
                                'name' => 'Hibberdene'
                            ],
                            [
                                'name' => 'Highmoor'
                            ],
                            [
                                'name' => 'Hillcrest'
                            ],
                            [
                                'name' => 'Hilton'
                            ],
                            [
                                'name' => 'Himeville'
                            ],
                            [
                                'name' => 'Hluhluwe'
                            ],
                            [
                                'name' => 'Howick'
                            ],
                            [
                                'name' => 'Impendhle'
                            ],
                            [
                                'name' => 'Isipingo'
                            ],
                            [
                                'name' => 'Ixopo'
                            ],
                            [
                                'name' => 'Izinqolweni'
                            ],
                            [
                                'name' => 'Jozini'
                            ],
                            [
                                'name' => 'Kingsburgh'
                            ],
                            [
                                'name' => 'Kloof'
                            ],
                            [
                                'name' => 'Kokstad'
                            ],
                            [
                                'name' => 'Kranskop'
                            ],
                            [
                                'name' => 'KwaMazambane'
                            ],
                            [
                                'name' => 'Kwambonambi'
                            ],
                            [
                                'name' => 'La Mercy'
                            ],
                            [
                                'name' => 'Ladysmith'
                            ],
                            [
                                'name' => 'Louwsburg'
                            ],
                            [
                                'name' => 'Malagazi'
                            ],
                            [
                                'name' => 'Mandeni'
                            ],
                            [
                                'name' => 'Margate'
                            ],
                            [
                                'name' => 'Marina Beach'
                            ],
                            [
                                'name' => 'Melmoth'
                            ],
                            [
                                'name' => 'Mkuze'
                            ],
                            [
                                'name' => 'Monteseel'
                            ],
                            [
                                'name' => 'Mooi River'
                            ],
                            [
                                'name' => 'Mount Edgecombe'
                            ],
                            [
                                'name' => 'Mtubatuba'
                            ],
                            [
                                'name' => 'Mtunzini'
                            ],
                            [
                                'name' => 'Mtwalume'
                            ],
                            [
                                'name' => 'Natal Coast'
                            ],
                            [
                                'name' => 'Newcastle'
                            ],
                            [
                                'name' => 'Nkandla'
                            ],
                            [
                                'name' => 'Nottingham Road'
                            ],
                            [
                                'name' => 'Ottos Bluff'
                            ],
                            [
                                'name' => 'Outer West Durban'
                            ],
                            [
                                'name' => 'Paulpietersburg'
                            ],
                            [
                                'name' => 'Pennington'
                            ],
                            [
                                'name' => 'Phoenix'
                            ],
                            [
                                'name' => 'Pietermaritzburg'
                            ],
                            [
                                'name' => 'Pinetown'
                            ],
                            [
                                'name' => 'Pongola'
                            ],
                            [
                                'name' => 'Port Edward'
                            ],
                            [
                                'name' => 'Port Shepstone'
                            ],
                            [
                                'name' => 'Prospecton'
                            ],
                            [
                                'name' => 'Queensburgh'
                            ],
                            [
                                'name' => 'Ramsgate'
                            ],
                            [
                                'name' => 'Richards Bay'
                            ],
                            [
                                'name' => 'Richmond'
                            ],
                            [
                                'name' => 'Rietvlei'
                            ],
                            [
                                'name' => 'San Lameer'
                            ],
                            [
                                'name' => 'Scottburgh'
                            ],
                            [
                                'name' => 'Shakas Head'
                            ],
                            [
                                'name' => 'Shallcross'
                            ],
                            [
                                'name' => 'Shelly Beach'
                            ],
                            [
                                'name' => 'Sodwana Bay'
                            ],
                            [
                                'name' => 'Southbroom'
                            ],
                            [
                                'name' => 'St Lucia'
                            ],
                            [
                                'name' => 'Stanger'
                            ],
                            [
                                'name' => 'Tinley Manor'
                            ],
                            [
                                'name' => 'Tongaat'
                            ],
                            [
                                'name' => 'Trafalgar'
                            ],
                            [
                                'name' => 'Ulundi'
                            ],
                            [
                                'name' => 'Umbumbulu'
                            ],
                            [
                                'name' => 'Umdloti'
                            ],
                            [
                                'name' => 'Umhlanga'
                            ],
                            [
                                'name' => 'Umhlanga Ridge'
                            ],
                            [
                                'name' => 'Umkomaas'
                            ],
                            [
                                'name' => 'Umlazi'
                            ],
                            [
                                'name' => 'Umzimkhulu'
                            ],
                            [
                                'name' => 'Umzinto'
                            ],
                            [
                                'name' => 'Umzumbe'
                            ],
                            [
                                'name' => 'Underberg'
                            ],
                            [
                                'name' => 'Utrecht'
                            ],
                            [
                                'name' => 'Uvongo'
                            ],
                            [
                                'name' => 'Verulam'
                            ],
                            [
                                'name' => 'Vryheid'
                            ],
                            [
                                'name' => 'Waterfall'
                            ],
                            [
                                'name' => 'Westbrook'
                            ],
                            [
                                'name' => 'Westville'
                            ],
                            [
                                'name' => 'Winterskloof'
                            ],
                            [
                                'name' => 'Winterton'
                            ],
                            [
                                'name' => 'Zinkwazi'
                            ],
                            [
                                'name' => 'Zululand'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Limpopo',
                        'children' => [
                            [
                                'name' => 'Alldays'
                            ],
                            [
                                'name' => 'Baltimore'
                            ],
                            [
                                'name' => 'Bela Bela'
                            ],
                            [
                                'name' => 'Bochum'
                            ],
                            [
                                'name' => 'Bosveld'
                            ],
                            [
                                'name' => 'Burgersfort'
                            ],
                            [
                                'name' => 'Dendron'
                            ],
                            [
                                'name' => 'Ellisras'
                            ],
                            [
                                'name' => 'Gakgapane'
                            ],
                            [
                                'name' => 'Giyani'
                            ],
                            [
                                'name' => 'Gravelotte'
                            ],
                            [
                                'name' => 'Groblersdal'
                            ],
                            [
                                'name' => 'Hoedspruit'
                            ],
                            [
                                'name' => 'Jane Furse'
                            ],
                            [
                                'name' => 'Lephalale'
                            ],
                            [
                                'name' => 'Letaba'
                            ],
                            [
                                'name' => 'Louis Trichardt'
                            ],
                            [
                                'name' => 'Malamulele'
                            ],
                            [
                                'name' => 'Marulaneng'
                            ],
                            [
                                'name' => 'Messina'
                            ],
                            [
                                'name' => 'Modimolle'
                            ],
                            [
                                'name' => 'Modjadji'
                            ],
                            [
                                'name' => 'Modjadjiskloof'
                            ],
                            [
                                'name' => 'Mokopane'
                            ],
                            [
                                'name' => 'Mookgopong'
                            ],
                            [
                                'name' => 'Morbeng'
                            ],
                            [
                                'name' => 'Musina'
                            ],
                            [
                                'name' => 'Nebo'
                            ],
                            [
                                'name' => 'Northam'
                            ],
                            [
                                'name' => 'Ohrigstad'
                            ],
                            [
                                'name' => 'Phalaborwa'
                            ],
                            [
                                'name' => 'Polokwane'
                            ],
                            [
                                'name' => 'Steelpoort'
                            ],
                            [
                                'name' => 'Swartwater'
                            ],
                            [
                                'name' => 'Thabazimbi'
                            ],
                            [
                                'name' => 'Thohoyandou'
                            ],
                            [
                                'name' => 'Tom Burke'
                            ],
                            [
                                'name' => 'Tonteldoos'
                            ],
                            [
                                'name' => 'Tzaneen'
                            ],
                            [
                                'name' => 'Vaalwater'
                            ],
                            [
                                'name' => 'Venda'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Mpumalanga',
                        'children' => [
                            [
                                'name' => 'Alkmaar'
                            ],
                            [
                                'name' => 'Amersfoort'
                            ],
                            [
                                'name' => 'Amsterdam'
                            ],
                            [
                                'name' => 'Badplaas'
                            ],
                            [
                                'name' => 'Balfour'
                            ],
                            [
                                'name' => 'Barberton'
                            ],
                            [
                                'name' => 'Belfast'
                            ],
                            [
                                'name' => 'Bethal'
                            ],
                            [
                                'name' => 'Bushbuckridge'
                            ],
                            [
                                'name' => 'Carolina'
                            ],
                            [
                                'name' => 'Delmas'
                            ],
                            [
                                'name' => 'Dullstroom'
                            ],
                            [
                                'name' => 'Ermelo'
                            ],
                            [
                                'name' => 'Graskop'
                            ],
                            [
                                'name' => 'Greylingstad'
                            ],
                            [
                                'name' => 'Grootvlei'
                            ],
                            [
                                'name' => 'Hazyview'
                            ],
                            [
                                'name' => 'Hectorspruit'
                            ],
                            [
                                'name' => 'Hendrina'
                            ],
                            [
                                'name' => 'Kaapsche Hoop'
                            ],
                            [
                                'name' => 'Komatipoort'
                            ],
                            [
                                'name' => 'Kriel'
                            ],
                            [
                                'name' => 'Kruger Park'
                            ],
                            [
                                'name' => 'Kwamhlanga'
                            ],
                            [
                                'name' => 'Leandra'
                            ],
                            [
                                'name' => 'Lydenburg'
                            ],
                            [
                                'name' => 'Machadodorp'
                            ],
                            [
                                'name' => 'Malelane'
                            ],
                            [
                                'name' => 'Marble Hall'
                            ],
                            [
                                'name' => 'Marloth Park'
                            ],
                            [
                                'name' => 'Middelburg'
                            ],
                            [
                                'name' => 'Mkobola'
                            ],
                            [
                                'name' => 'Morgenzon'
                            ],
                            [
                                'name' => 'Nelspruit'
                            ],
                            [
                                'name' => 'Ogies'
                            ],
                            [
                                'name' => 'Piet Retief'
                            ],
                            [
                                'name' => 'Pullens Hope'
                            ],
                            [
                                'name' => 'Rietkuil'
                            ],
                            [
                                'name' => 'Sabie'
                            ],
                            [
                                'name' => 'Secunda'
                            ],
                            [
                                'name' => 'Skukuza'
                            ],
                            [
                                'name' => 'Standerton'
                            ],
                            [
                                'name' => 'Trichardtsdal'
                            ],
                            [
                                'name' => 'Volksrust'
                            ],
                            [
                                'name' => 'Wakkerstroom'
                            ],
                            [
                                'name' => 'Waterval Boven'
                            ],
                            [
                                'name' => 'Waterval Onder'
                            ],
                            [
                                'name' => 'White River'
                            ],
                            [
                                'name' => 'Witbank'
                            ],
                            [
                                'name' => 'eMangweni'
                            ],
                        ]
                    ],
                    [
                        'name' => 'North West',
                        'children' => [
                            [
                                'name' => 'Atamelang'
                            ],
                            [
                                'name' => 'Bafokeng'
                            ],
                            [
                                'name' => 'Bloemhof'
                            ],
                            [
                                'name' => 'Bophirima'
                            ],
                            [
                                'name' => 'Brits'
                            ],
                            [
                                'name' => 'Christiana'
                            ],
                            [
                                'name' => 'Coligny'
                            ],
                            [
                                'name' => 'Delareyville'
                            ],
                            [
                                'name' => 'Groot Marico'
                            ],
                            [
                                'name' => 'Hartbeespoort'
                            ],
                            [
                                'name' => 'Klerksdorp'
                            ],
                            [
                                'name' => 'Koster'
                            ],
                            [
                                'name' => 'Leeudoringstad'
                            ],
                            [
                                'name' => 'Lichtenburg'
                            ],
                            [
                                'name' => 'Madikwe'
                            ],
                            [
                                'name' => 'Mafikeng'
                            ],
                            [
                                'name' => 'Magogong'
                            ],
                            [
                                'name' => 'Makwassie'
                            ],
                            [
                                'name' => 'Mmabatho'
                            ],
                            [
                                'name' => 'Mogwase'
                            ],
                            [
                                'name' => 'Mooinooi'
                            ],
                            [
                                'name' => 'Orkney'
                            ],
                            [
                                'name' => 'Ottosdal'
                            ],
                            [
                                'name' => 'Pilanesberg National Park'
                            ],
                            [
                                'name' => 'Potchefstroom'
                            ],
                            [
                                'name' => 'Rustenburg'
                            ],
                            [
                                'name' => 'Sannieshof'
                            ],
                            [
                                'name' => 'Schweizer Reneke'
                            ],
                            [
                                'name' => 'Stella'
                            ],
                            [
                                'name' => 'Stilfontein'
                            ],
                            [
                                'name' => 'Swartruggens'
                            ],
                            [
                                'name' => 'Taung'
                            ],
                            [
                                'name' => 'Tosca'
                            ],
                            [
                                'name' => 'Ventersdorp'
                            ],
                            [
                                'name' => 'Vryburg'
                            ],
                            [
                                'name' => 'Wolmaransstad'
                            ],
                            [
                                'name' => 'Zandfontein'
                            ],
                            [
                                'name' => 'Zeerust'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Northern Cape',
                        'children' => [
                            [
                                'name' => 'Askham'
                            ],
                            [
                                'name' => 'Barkly West'
                            ],
                            [
                                'name' => 'Brandvlei'
                            ],
                            [
                                'name' => 'Britstown'
                            ],
                            [
                                'name' => 'Calvinia'
                            ],
                            [
                                'name' => 'Carnarvon'
                            ],
                            [
                                'name' => 'Colesberg'
                            ],
                            [
                                'name' => 'Danielskuil'
                            ],
                            [
                                'name' => 'De Aar'
                            ],
                            [
                                'name' => 'Dibeng'
                            ],
                            [
                                'name' => 'Douglas'
                            ],
                            [
                                'name' => 'Fraserburg'
                            ],
                            [
                                'name' => 'Garies'
                            ],
                            [
                                'name' => 'Gordonia'
                            ],
                            [
                                'name' => 'Griekwastad'
                            ],
                            [
                                'name' => 'Groblershoop'
                            ],
                            [
                                'name' => 'Grootdrink'
                            ],
                            [
                                'name' => 'Hanover'
                            ],
                            [
                                'name' => 'Hartswater'
                            ],
                            [
                                'name' => 'Hondeklip Bay'
                            ],
                            [
                                'name' => 'Hopetown'
                            ],
                            [
                                'name' => 'Jan Kempdorp'
                            ],
                            [
                                'name' => 'Kakamas'
                            ],
                            [
                                'name' => 'Karos'
                            ],
                            [
                                'name' => 'Kathu'
                            ],
                            [
                                'name' => 'Keimoes'
                            ],
                            [
                                'name' => 'Kenhardt'
                            ],
                            [
                                'name' => 'Kimberley'
                            ],
                            [
                                'name' => 'Kleinsee'
                            ],
                            [
                                'name' => 'Koingnaas'
                            ],
                            [
                                'name' => 'Kuruman'
                            ],
                            [
                                'name' => 'Loeriesfontein'
                            ],
                            [
                                'name' => 'Loxton'
                            ],
                            [
                                'name' => 'Marydale'
                            ],
                            [
                                'name' => 'Modderrivier'
                            ],
                            [
                                'name' => 'Nababeep'
                            ],
                            [
                                'name' => 'Namakwa'
                            ],
                            [
                                'name' => 'Nieuwoudtville'
                            ],
                            [
                                'name' => 'Noupoort'
                            ],
                            [
                                'name' => 'Okiep'
                            ],
                            [
                                'name' => 'Olifantshoek'
                            ],
                            [
                                'name' => 'Orania'
                            ],
                            [
                                'name' => 'Petrusville'
                            ],
                            [
                                'name' => 'Philipstown'
                            ],
                            [
                                'name' => 'Pofadder'
                            ],
                            [
                                'name' => 'Port Nolloth'
                            ],
                            [
                                'name' => 'Postmasburg'
                            ],
                            [
                                'name' => 'Prieska'
                            ],
                            [
                                'name' => 'Pudimoe'
                            ],
                            [
                                'name' => 'Reivilo'
                            ],
                            [
                                'name' => 'Richmond'
                            ],
                            [
                                'name' => 'Ritchie'
                            ],
                            [
                                'name' => 'Springbok'
                            ],
                            [
                                'name' => 'Steinkopf'
                            ],
                            [
                                'name' => 'Strydenburg'
                            ],
                            [
                                'name' => 'Sutherland'
                            ],
                            [
                                'name' => 'Upington'
                            ],
                            [
                                'name' => 'Vanderkloof'
                            ],
                            [
                                'name' => 'Vanwyksvlei'
                            ],
                            [
                                'name' => 'Victoria West'
                            ],
                            [
                                'name' => 'Vioolsdrif'
                            ],
                            [
                                'name' => 'Vosburg'
                            ],
                            [
                                'name' => 'Warrenton'
                            ],
                            [
                                'name' => 'Williston'
                            ],
                            [
                                'name' => 'Windsorton'
                            ],
                        ]
                    ],
                    [
                        'name' => 'Western Cape',
                        'children' => [
                            [
                                'name' => 'Agulhas'
                            ],
                            [
                                'name' => 'Albertinia'
                            ],
                            [
                                'name' => 'Arniston'
                            ],
                            [
                                'name' => 'Atlantis'
                            ],
                            [
                                'name' => 'Aurora'
                            ],
                            [
                                'name' => 'Baardskeerdersbos'
                            ],
                            [
                                'name' => 'Barrydale'
                            ],
                            [
                                'name' => 'Beaufort West'
                            ],
                            [
                                'name' => 'Bellville'
                            ],
                            [
                                'name' => 'Bettys Bay'
                            ],
                            [
                                'name' => 'Bitterfontein'
                            ],
                            [
                                'name' => 'Blackheath'
                            ],
                            [
                                'name' => 'Blouberg'
                            ],
                            [
                                'name' => 'Blue Downs'
                            ],
                            [
                                'name' => 'Boggomsbaai'
                            ],
                            [
                                'name' => 'Bonnievale'
                            ],
                            [
                                'name' => 'Bot River'
                            ],
                            [
                                'name' => 'Brackenfell'
                            ],
                            [
                                'name' => 'Bredasdorp'
                            ],
                            [
                                'name' => 'Breede Rivier'
                            ],
                            [
                                'name' => 'Caledon'
                            ],
                            [
                                'name' => 'Calitzdorp'
                            ],
                            [
                                'name' => 'Cape Town'
                            ],
                            [
                                'name' => 'Ceres'
                            ],
                            [
                                'name' => 'Citrusdal'
                            ],
                            [
                                'name' => 'Clanwilliam'
                            ],
                            [
                                'name' => 'Darling'
                            ],
                            [
                                'name' => 'De Doorns'
                            ],
                            [
                                'name' => 'Delft'
                            ],
                            [
                                'name' => 'Durbanville'
                            ],
                            [
                                'name' => 'Eersterivier'
                            ],
                            [
                                'name' => 'Elands Bay'
                            ],
                            [
                                'name' => 'Elsies River'
                            ],
                            [
                                'name' => 'Fish Hoek'
                            ],
                            [
                                'name' => 'Franschhoek'
                            ],
                            [
                                'name' => 'Gansbaai'
                            ],
                            [
                                'name' => 'Genadendal'
                            ],
                            [
                                'name' => 'George'
                            ],
                            [
                                'name' => 'Goodwood'
                            ],
                            [
                                'name' => 'Gordons Bay'
                            ],
                            [
                                'name' => 'Gouritsmond'
                            ],
                            [
                                'name' => 'Graafwater'
                            ],
                            [
                                'name' => 'Grabouw'
                            ],
                            [
                                'name' => 'Greyton'
                            ],
                            [
                                'name' => 'Groot Brakrivier'
                            ],
                            [
                                'name' => 'Grotto Bay'
                            ],
                            [
                                'name' => 'Hartenbos'
                            ],
                            [
                                'name' => 'Heidelberg'
                            ],
                            [
                                'name' => 'Herbertsdale'
                            ],
                            [
                                'name' => 'Hermanus'
                            ],
                            [
                                'name' => 'Hermon'
                            ],
                            [
                                'name' => 'Hopefield'
                            ],
                            [
                                'name' => 'Hout Bay'
                            ],
                            [
                                'name' => 'Jacobsbaai'
                            ],
                            [
                                'name' => 'Khayelitsha'
                            ],
                            [
                                'name' => 'Klawer'
                            ],
                            [
                                'name' => 'Klein Brak Rivier'
                            ],
                            [
                                'name' => 'Kleinmond'
                            ],
                            [
                                'name' => 'Klipheuwel'
                            ],
                            [
                                'name' => 'Knysna'
                            ],
                            [
                                'name' => 'Kommetjie'
                            ],
                            [
                                'name' => 'Kraaifontein'
                            ],
                            [
                                'name' => 'Kuils River'
                            ],
                            [
                                'name' => 'Ladismith'
                            ],
                            [
                                'name' => 'Laingsburg'
                            ],
                            [
                                'name' => 'Lamberts Bay'
                            ],
                            [
                                'name' => 'Langebaan'
                            ],
                            [
                                'name' => 'Macassar'
                            ],
                            [
                                'name' => 'Malmesbury'
                            ],
                            [
                                'name' => 'Matroosfontein'
                            ],
                            [
                                'name' => 'Mcgregor'
                            ],
                            [
                                'name' => 'Melkbosstrand'
                            ],
                            [
                                'name' => 'Milnerton'
                            ],
                            [
                                'name' => 'Mitchells Plain'
                            ],
                            [
                                'name' => 'Montagu'
                            ],
                            [
                                'name' => 'Moorreesburg'
                            ],
                            [
                                'name' => 'Mossel Bay'
                            ],
                            [
                                'name' => 'Murraysburg'
                            ],
                            [
                                'name' => 'Napier'
                            ],
                            [
                                'name' => 'Noordhoek'
                            ],
                            [
                                'name' => 'Oudtshoorn'
                            ],
                            [
                                'name' => 'Paarl'
                            ],
                            [
                                'name' => 'Parow'
                            ],
                            [
                                'name' => 'Paternoster'
                            ],
                            [
                                'name' => 'Piketberg'
                            ],
                            [
                                'name' => 'Plettenberg Bay'
                            ],
                            [
                                'name' => 'Porterville'
                            ],
                            [
                                'name' => 'Prince Albert'
                            ],
                            [
                                'name' => 'Pringle Bay'
                            ],
                            [
                                'name' => 'Redelinghuys'
                            ],
                            [
                                'name' => 'Riebeek Valley'
                            ],
                            [
                                'name' => 'Riversdale'
                            ],
                            [
                                'name' => 'Riviersonderend'
                            ],
                            [
                                'name' => 'Robertson'
                            ],
                            [
                                'name' => 'Rooi Els'
                            ],
                            [
                                'name' => 'Saldanha'
                            ],
                            [
                                'name' => 'Scarborough'
                            ],
                            [
                                'name' => 'Sedgefield'
                            ],
                            [
                                'name' => 'Simons Town'
                            ],
                            [
                                'name' => 'Somerset West'
                            ],
                            [
                                'name' => 'St Helena Bay'
                            ],
                            [
                                'name' => 'Stanford'
                            ],
                            [
                                'name' => 'Stellenbosch'
                            ],
                            [
                                'name' => 'Stilbaai'
                            ],
                            [
                                'name' => 'Strand'
                            ],
                            [
                                'name' => 'Strandfontein'
                            ],
                            [
                                'name' => 'Struisbaai'
                            ],
                            [
                                'name' => 'Suiderstrand'
                            ],
                            [
                                'name' => 'Swellendam'
                            ],
                            [
                                'name' => 'Touws River'
                            ],
                            [
                                'name' => 'Tulbagh'
                            ],
                            [
                                'name' => 'Uniondale'
                            ],
                            [
                                'name' => 'Val De Vie'
                            ],
                            [
                                'name' => 'Van Wyksdorp'
                            ],
                            [
                                'name' => 'Vanrhynsdorp'
                            ],
                            [
                                'name' => 'Velddrif'
                            ],
                            [
                                'name' => 'Victoria Bay'
                            ],
                            [
                                'name' => 'Villiersdorp'
                            ],
                            [
                                'name' => 'Vleesbaai'
                            ],
                            [
                                'name' => 'Vredenburg'
                            ],
                            [
                                'name' => 'Vredendal'
                            ],
                            [
                                'name' => 'Wellington'
                            ],
                            [
                                'name' => 'Wilderness'
                            ],
                            [
                                'name' => 'Witsand'
                            ],
                            [
                                'name' => 'Wolseley'
                            ],
                            [
                                'name' => 'Worcester'
                            ],
                            [
                                'name' => 'Yzerfontein'
                            ]
                        ]
                    ],
                ]
            ]
        ];

        foreach ($areas as $area ) {
            Area::create($area);
        }

    }
}
