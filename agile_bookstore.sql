-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2021 at 06:36 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17244813_agile_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbn` varchar(13) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `publish_date` date NOT NULL,
  `description` text DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `trade_price` decimal(10,0) NOT NULL,
  `retail_price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `title`, `author`, `publish_date`, `description`, `picture`, `trade_price`, `retail_price`, `quantity`) VALUES
('9780007119318', 'Murder on the Orient Express', 'Agatha Christie', '2015-01-01', 'Agatha Christie\'s most famous murder mystery, reissued with a striking new cover designed to appeal to the latest generation of Agatha Christie fans and book lovers.\r\n\r\n\r\nJust after midnight, a snowdrift stops the Orient Express in its tracks. The luxurious train is surprisingly full for the time of the year, but by the morning it is one passenger fewer. An American tycoon lies dead in his compartment, stabbed a dozen times, his door locked from the inside.\r\n\r\n\r\nIsolated and with a killer in their midst, detective Hercule Poirot must identify the murderer - in case he or she decides to strike again.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/0071/9780007119318.jpg', 35, 45, 0),
('9780007578795', 'Putin\'s People: How the KGB Took Back Russia and Then Took on the West', 'Catherine Belton', '2020-06-07', 'The hacking of the 2016 US elections. The sponsorship of extremist politics in Europe. War in Ukraine. In recent years, Vladimir Putin\'s Russia has waged a concerted campaign to expand its influence and undermine Western institutions. But how and why did all this come about and who has orchestrated it? In Putin\'s People, investigative journalist Catherine Belton tells the untold story of the rise to power of Vladimir Putin and the small group of KGB men surrounding him. Delving deep into the workings of Putin\'s Kremlin, Belton accesses key inside players to reveal how Putin replaced the free-wheeling tycoons of the Yeltsin era with a new generation of loyal oligarchs, who in turn subverted their country\'s economy and legal system and expanded its influence into the West. The result is a chilling and revelatory expose of the KGB\'s revanche - a story that began long ago in the murk of the Soviet collapse when networks of operatives were able to siphon billions of dollars out of Russia and into the West. After Putin\'s takeover of the economy, these networks acquired new flows of cash to realize their goals. Ranging from Moscow to London, Switzerland and Brighton Beach, and introducing a colorful cast of characters, Putin\'s People is the definitive account of how hopes for the new Russia went astray, with stark consequences for its inhabitants and, increasingly, the world.', 'https://www.thebookshop.es/productimages/1200/putin-s-people---how-the-kgb-took-back-russia-and-then-took-on-the-west---catherine-belton_150772.jpg', 49, 153, 9),
('9780008156312', 'Time Travelling with a Hamster', 'Ross Welford', '2016-02-04', 'For readers who loved Wonder and The Curious Incident of the Dog in the Night-Time this extraordinary debut will make you laugh and cry.\r\n\r\n\r\nA story that crosses time and generations, for adventure-loving readers young and old.\r\n\r\n\r\n\"My dad died twice. Once when he was thirty nine and again four years later when he was twelve.\"\r\n\r\n\r\nOn Al Chaudhury\'s twelfth birthday his beloved Grandpa Byron gives him a letter from Al\'s late father. In it Al receives a mission: travel back to 1984 in a secret time machine and save his father\'s life.\r\n\r\n\r\nAl soon discovers that time travel requires daring and imagination. It also requires lies, theft, setting his school on fire and ignoring philosophical advice from Grandpa Byron. All without losing his pet hamster, Alan Shearer...\r\n\r\n\r\nTime Travelling With a Hamster is a funny, heart-warming race-against-time - and across generations - adventure that you will won\'t be able to put down.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/0081/9780008156312.jpg', 35, 4, 2),
('9780008207670', 'Time Travel', 'James Gleick', '2016-09-27', 'From the acclaimed author of The Information and Chaos, a mind-bending exploration of time travel: its subversive origins, its evolution in literature and science, and its influence on our understanding of time itself.\r\n\r\n\r\nGleick\'s story begins at the turn of the twentieth century with the young H. G. Wells writing and rewriting the fantastic tale that became his first book, an international sensation, The Time Machine. A host of forces were converging to transmute the human understanding of time, some philosophical and some technological - the electric telegraph, the steam railroad, the discovery of buried civilisations, and the perfection of clocks. Gleick tracks the evolution of time travel as an idea in the culture - from Marcel Proust to Doctor Who, from Woody Allen to Jorge Luis Borges. He explores the inevitable looping paradoxes and examines the porous boundary between pulp fiction and modern physics. Finally, he delves into a temporal shift that is unsettling our own moment: the instantaneous wired world, with its all-consuming present and vanishing future.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/0082/9780008207670.jpg', 74, 75, 15),
('9780140437683', 'Treasure Island', 'Robert Louis Stevenson', '2000-05-25', 'The quintessential adventure story that first established pirates in the popular imagination, Robert Louis Stevenson\'s Treasure Island is edited with an introduction by John Seelye in Penguin Classics.\r\n\r\nWhen a mysterious sailor dies in sinister circumstances at the Admiral Benbow inn, young Jim Hawkins stumbles across a treasure map among the dead man\'s possessions. But Jim soon becomes only too aware that he is not the only one who knows of the map\'s existence, and his bravery and cunning are tested to the full when, with his friends Squire Trelawney and Dr Livesey, he sets sail in the Hispaniola to track down the treasure. With its swift-moving plot and memorably drawn characters - Blind Pew and Black Dog, the castaway Ben Gunn and the charming but dangerous Long John Silver - Stevenson\'s tale of pirates, treachery and heroism was an immediate success when it was first published in 1883 and has retained its place as one of the greatest of all adventure stories.\r\n', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/1404/9780140437683.jpg', 36, 62, 5),
('9780141186672', 'The Man in the High Castle', 'Philip K. Dick', '2010-05-01', 'A dazzling speculative novel of \'counterfactual history\' from one of America\'s most highly-regarded science fiction authors, Philip K. Dick\'s The Man in the High Castle includes an introduction by Eric Brown in Penguin Modern Classics.\r\n\r\nPhilip K. Dick\'s acclaimed cult novel gives us a horrifying glimpse of an alternative world - one where the Allies have lost the Second World War. In this nightmare dystopia the Nazis have taken over New York, the Japanese control California and the African continent is virtually wiped out. In a neutral buffer zone in America that divides the world\'s new rival superpowers, lives the author of an underground bestseller. His book offers a new vision of reality - an alternative theory of world history in which the Axis powers were defeated - giving hope to the disenchanted. Does \'reality\' lie with him, or is his world just one among many others?\r\n\r\nPhilip Kindred Dick (1928-82) was born in Chicago in 1928. His career as a science fiction writer comprised an early burst of short stories followed by a stream of novels, typically character studies incorporating androids, drugs, and hallucinations. His best works are generally agreed to be The Man in the High Castle and Do Androids Dream of Electric Sheep?, the inspiration for the movie Blade Runner.\r\n\r\nIf you enjoyed The Man in the High Castle, you might like Yevgeny Zamyatin\'s We, also available in Penguin Classics.\r\n\r\n\'The most brilliant science fiction mind on any planet\'\r\nRolling Stone\r\n\r\n\'Dick\'s finest book, and one of the very best science fiction novels ever published\'\r\nEric Brown', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/1411/9780141186672.jpg', 44, 82, 1),
('9780141199177', 'The Hound of the Baskervilles', 'Arthur Conan Doyle', '2012-12-06', 'The Penguin English Library Edition of The Hound of the Baskervilles by Arthur Conan Doyle\r\n\r\n\"Mr Holmes, they were the footprints of a gigantic hound!\"\r\n\r\nThe terrible spectacle of the beast, the fog of the moor, the discovery of a body: this classic horror story pits detective against dog, rationalism against the supernatural, good against evil. When Sir Charles Baskerville is found dead on the wild Devon moorland with the footprints of a giant hound nearby, the blame is placed on a family curse. It is left to Sherlock Holmes and Doctor Watson to solve the mystery of the legend of the phantom hound before Sir Charles\' heir comes to an equally gruesome end. The Hound of the Baskervilles gripped readers when it was first serialised and has continued to hold its place in the popular imagination.\r\n\r\nThe Penguin English Library - 100 editions of the best fiction in English, from the eighteenth century and the very first novels to the beginning of the First World War.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/1411/9780141199177.jpg', 35, 40, 7),
('9780141395487', 'The Sign of Four', 'Sir Arthur Conan Doyle', '2014-09-04', 'The Penguin English Library edition\r\n\r\nA dense yellow miasma swirls in the streets of London as Sherlock Holmes and Dr Watson accompany a beautiful young woman to a sinister assignation.\r\n\r\nFor Mary Marston has received several large pearls - one a year for the last six years - and now a mystery letter telling her she is a wronged woman. If she would seek justice she is to meet her unknown benefactor, bringing with her two companions.\r\n\r\nBut unbeknownst to them all, others stalk London\'s fog-enshrouded streets: a one-legged ruffian with revenge on his mind - and his companion, who places no value on human life . . .', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/1413/9780141395487.jpg', 30, 46, 11),
('9780141395524', 'A Study in Scarlet', 'Arthur Conan Doyle', '2014-09-04', 'The Penguin English Library edition\r\n\r\nWhen Dr John Watson takes rooms in Baker Street with amateur detective Sherlock Holmes, he has no idea that he is about to enter a shadowy world of criminality and violence. Accompanying Holmes to an ill-omened house in south London, Watson is startled to find a dead man whose face is contorted in a rictus of horror. There is no mark of violence on the body yet a single word is written on the wall in blood. Dr Watson is as baffled as the police, but Holmes\'s brilliant analytical skills soon uncover a trail of murder, revenge and lost love . . .', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/1413/9780141395524.jpg', 34, 46, 18),
('9780141395562', 'The Valley of Fear', 'Sir Arthur Conan Doyle', '2014-09-04', 'The Penguin English Library Edition\r\n\r\nThe deadly hand of Professor Moriarty once more reaches out to commit a vile and ingenious crime, but a mole in Moriarty\'s criminal organization alerts Sherlock Holmes of the evil deed by means of a cipher . . .\r\n\r\nWhen Holmes and Watson arrive at a Sussex manor house they appear to be too late. The discovery of a body suggests that Moriarty\'s henchmen have been at their work. But there is much more to this tale of murder than at first meets the eye.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/1413/9780141395562.jpg', 35, 46, 11),
('9780199672899', 'Ocean Worlds: The story of seas on Earth and other planets', 'Jan Zalasiewicz, Mark Williams', '2018-02-14', 'Oceans make up most of the surface of our blue planet. They may form just a sliver on the outside of the Earth, but they are very important, not only in hosting life, including the fish and other animals on which many humans depend, but in terms of their role in the Earth system, in regulating climate, and cycling nutrients. As climate change, pollution, and over-exploitation by humans puts this precious resource at risk, it is more important than ever that we\r\nunderstand and appreciate the nature and history of oceans. There is much we still do not know about the story of the Earth\'s oceans, and we are only just beginning to find indications of oceans on other planets.\r\n\r\nIn this book, geologists Jan Zalasiewicz and Mark Williams consider the deep history of oceans, how and when they may have formed on the young Earth - topics of intense current research - how they became salty, and how they evolved through Earth history. We learn how oceans have formed and disappeared over millions of years, how the sea nurtured life, and what may become of our oceans in the future. We encounter some of the scientists and adventurers whose efforts led to our present\r\nunderstanding of oceans. And we look at clues to possible seas that may once have covered parts of Mars and Venus, that may still exist, below the surface, on moons such as Europa and Callisto, and the possibility of watery planets in other star systems.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/1996/9780199672899.jpg', 47, 67, 8),
('9780785239758', 'The Adventures of Sherlock Holmes (Seasons Edition--Spring)', 'Arthur Conan Doyle', '2021-04-29', 'A fine exclusive edition of one of literature\'s most beloved stories. Featuring a laser-cut jacket on a textured book with foil stamping, all titles in this series will be first editions. No more than 10,000 copies will be printed, and each will be individually numbered from 1 to 10,000.\r\n\r\nIt was a perfect day, with a bright sun and a few fleecy clouds in the heavens. The trees and wayside hedges were just throwing out their first green shoots, and the air was full of the pleasant smell of the moist earth. To me at least there was a strange contrast between the sweet promise of the spring and this sinister quest upon which we were engaged.\r\n\r\nThe Adventures of Sherlock Holmes is a collection of twelve stories written by Arthur Conan Doyle, featuring his iconic detective. Venture back in time to Victorian London to join literature\'s greatest detective team - the brilliant Sherlock Holmes and his devoted assistant, Dr. Watson - as they investigate a dozen of their best-known cases. Originally published in 1892, featured tales include several of the author\'s personal favorites: \"A Scandal in Bohemia\" - in which a king is blackmailed by a former lover and Holmes matches wits with the only woman to attract his open admiration - plus \"The Speckled Band,\" \"The Red-Headed League,\" and \"The Five Orange Pips.\" Additional mysteries include \"The Blue Carbuncle,\" \"The Engineer\'s Thumb,\" \"The Beryl Coronet,\" \"The Copper Beeches,\" and others.\r\n\r\nThe Adventures of Sherlock Holmes (Seasons Edition--Spring) is one of four titles available in March 2021. The spring season also will include Emma, The Secret Garden, and The Hunchback of Notre Dame.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/7852/9780785239758.jpg', 77, 147, 14),
('9780786846795', 'Jojo\'s Circus: My Name is Jojo - Easy-to-Read 1', 'Tennant Redbank', '2005-03-21', '‼️‼️OH MY GOD‼️‼️‼️‼️ IS THAT A JOJO REFERENCE??????!!!!!!!!!!11!1!1!1!1!1!1! JOJO IS THE BEST ANIME!!!!!! JOSUKE IS SO BADASSSSS\r\nORAORAORAORAORALORAORAORAORAORAORAORAORAORAORAORAORAORAORAORA MUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDAMUDA WRYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY\r\nYo Angelo!Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo!Yo Angelo!Yo Angelo! Yo Angelo!Yo Angelo!Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo!Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo!Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo! Yo Angelo!Yo Angelo!Yo Angelo! Yo Angelo! Oh you’re approaching me??????????? But it was me, Dio‼️‼️‼️‼️‼️‼️‼️‼️‼️‼️ XDDDDDXDDXDDXXDDD\r\nr/shitpostcrusaders r/unexpectedjojo r/expectedjojo perfectly balanced as all things should be r/unexpectedthanos r/expectedthanos for balance', 'https://images-na.ssl-images-amazon.com/images/I/51qCeODEu7L._SX327_BO1,204,203,200_.jpg', 10, 35, 5),
('9780857501004', 'A Brief History Of Time: From Big Bang To Black Holes', 'Stephen Hawking', '2015-01-20', 'Was there a beginning of time? Could time run backwards? Is the universe infinite or does it have boundaries?\r\n\r\nThese are just some of the questions considered in the internationally acclaimed masterpiece by the world renowned physicist - generally considered to have been one of the world\'s greatest thinkers. It begins by reviewing the great theories of the cosmos from Newton to Einstein, before delving into the secrets which still lie at the heart of space and time, from the Big Bang to black holes, via spiral galaxies and strong theory. To this day A Brief History of Time remains a staple of the scientific canon, and its succinct and clear language continues to introduce millions to the universe and its wonders.\r\n\r\nThis new edition includes recent updates from Stephen Hawking with his latest thoughts about the No Boundary Proposal and offers new information about dark energy, the information paradox, eternal inflation, the microwave background radiation observations, and the discovery of gravitational waves.\r\n\r\nIt was published in tandem with the app, Stephen Hawking\'s Pocket Universe.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/8575/9780857501004.jpg', 48, 85, 4),
('9781400209538', 'CHOOSE TO WIN: Transform Your Life, One Simple Choice At A Time', 'Tom Ziglar', '2021-06-24', 'Ziglar Inc. CEO Tom Ziglar shows readers how the choices they can make--beginning today--will help them achieve balanced success, true significance, and an everlasting legacy.\r\n\r\nThe secret to winning in life is one good choice at a time.\r\n\r\nAre you frustrated with your job, career, or relationships? Are you unsure if what you are doing right now in your life is the right thing? In this revolutionary new book, success and motivation expert Tom Ziglar shares the good news that you can change and that, in fact, you can win at life.\r\n\r\nChoose to Win shows you how to achieve massive change without massive upset. It all starts with identifying you are why, which reveals how that opens multiple doors of what. His revolutionary plan guides you through making one small choice at a time through a sequence of easy-to-follow steps in seven key areas: mental, spiritual, physical, family, finance, personal, and career. Ziglar also helps you identify the life-killing, unhealthy habits that cause misery, dissatisfaction, and lack of success and, more importantly, how to implement positive habits through the trinity of transformation: desire, hope, and grit. The result is a more productive, more fulfilling, and more meaningful life.\r\n\r\nYou can take control of your destiny and leave the lasting legacy you\'ve dreamed about and deserve. You simply need to choose to do so.', 'https://m.media-amazon.com/images/I/41QZfQiU3eL.jpg', 30, 64, 2),
('9781452503806', 'Karma Sutra: Insights Into the Design of Life', 'Lama Lami', '2012-03-28', 'Life is like one of those holographic pictures - if you look long enough, a three-dimensional image materializes out of the meaningless texture that initially meets the eye. Life is confusing when we see only that which meets the eye. We become a \'Seer\' when we look long and hard and are able to see that which is not immediately visible. Life then begins to come together. Lama Lami\'s Karma Sutra is a look at life behind the smokescreen of automatic beliefs of daily living. She deconstructs life, going to the very source of it and coming to a new understanding of life as we know it - and as we don\'t. We all know life but pay little attention to existence; we are called human beings but we are human doings; we feel pain in the body and turn it into suffering in the head. Karma Sutra is a collection of insightful revelations on the design of life interspersed with illustrative stories that leave you with a profound sense of aha! It doesn\'t attempt to instruct in the hope that these ruminations will help the reader design a creative as opposed to a reactive response to life. Cancer has been battling the Lama for five years. For five years she has been using her situation as an exercise ground for spiritual practice. Looking fear, mortality and pain in the eye and catching her mind the moment it begins to make a story of suffering out of the situation. \'Karma Sutra\' Karma is both cause and effect because every moment is a consequence of past action and at the same time, the cause of a future outcome. Karma is not personal - it is a synthesis of individual, familial and genetic karma that unfolds as life. It is in this sense that karma has come to mean destiny. However, the root meaning of karma is action. Hindu scriptures have termed human life as Karma Bhoomi - the domain of action. Karma is inevitable here because even non-action has a consequence and also counts as karma. Since life is a series of actions, including non-action, karma is a unit of life. The word Sutra means thread, so Karma Sutra is the thread that strings karma and into a continuum called life. It is the unfolding. And the unfolding rules our lives. R. Buckminster Fuller takes the idea of unfolding to another level when he says &quot;God, to me, it seems is a verb, not a noun, proper or improper.&quot;', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/mid/9781/4525/9781452503806.jpg', 41, 56, 3),
('9781524108595', 'The Boys Omnibus', 'Garth Ennis', '2019-04-02', 'This is going to hurt! In a world where costumed heroes soar through the sky and masked vigilantes prowl the night, someone\'s got to make sure the \"supes\" don\'t get out of line. And someone will!\r\n\r\nBilly Butcher, Wee Hughie, Mother\'s Milk, The Frenchman, and The Female are The Boys: A CIA-backed team of very dangerous people, each one dedicated to the struggle against the most dangerous force on Earth - superpower! Some superheroes have to be watched. Some have to be controlled. And some of them - sometimes - need to be taken out of the picture. That\'s when you call in The Boys!', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/5241/9781524108595.jpg', 103, 120, 4),
('9781524763169', 'A Promised Land (US)', 'Barack Obama', '2020-11-17', 'A riveting, deeply personal account of history in the making—from the president who inspired us to believe in the power of democracy\r\n\r\n#1 NEW YORK TIMES BESTSELLER • NAACP IMAGE AWARD FINALIST • NAMED ONE OF THE TEN BEST BOOKS OF THE YEAR BY THE NEW YORK TIMES BOOK REVIEW\r\n\r\nNAMED ONE OF THE BEST BOOKS OF THE YEAR BY The Washington Post • Jennifer Szalai, The New York Times • NPR • The Guardian • Marie Claire\r\n \r\nIn the stirring, highly anticipated first volume of his presidential memoirs, Barack Obama tells the story of his improbable odyssey from young man searching for his identity to leader of the free world, describing in strikingly personal detail both his political education and the landmark moments of the first term of his historic presidency—a time of dramatic transformation and turmoil.\r\n\r\nObama takes readers on a compelling journey from his earliest political aspirations to the pivotal Iowa caucus victory that demonstrated the power of grassroots activism to the watershed night of November 4, 2008, when he was elected 44th president of the United States, becoming the first African American to hold the nation’s highest office.\r\n\r\nReflecting on the presidency, he offers a unique and thoughtful exploration of both the awesome reach and the limits of presidential power, as well as singular insights into the dynamics of U.S. partisan politics and international diplomacy. Obama brings readers inside the Oval Office and the White House Situation Room, and to Moscow, Cairo, Beijing, and points beyond. We are privy to his thoughts as he assembles his cabinet, wrestles with a global financial crisis, takes the measure of Vladimir Putin, overcomes seemingly insurmountable odds to secure passage of the Affordable Care Act, clashes with generals about U.S. strategy in Afghanistan, tackles Wall Street reform, responds to the devastating Deepwater Horizon blowout, and authorizes Operation Neptune’s Spear, which leads to the death of Osama bin Laden.\r\n\r\nA Promised Land is extraordinarily intimate and introspective—the story of one man’s bet with history, the faith of a community organizer tested on the world stage. Obama is candid about the balancing act of running for office as a Black American, bearing the expectations of a generation buoyed by messages of “hope and change,” and meeting the moral challenges of high-stakes decision-making. He is frank about the forces that opposed him at home and abroad, open about how living in the White House affected his wife and daughters, and unafraid to reveal self-doubt and disappointment. Yet he never wavers from his belief that inside the great, ongoing American experiment, progress is always possible.\r\n\r\nThis beautifully written and powerful book captures Barack Obama’s conviction that democracy is not a gift from on high but something founded on empathy and common understanding and built together, day by day.', 'https://cdn.shopify.com/s/files/1/0511/7575/1837/products/d85c9f0d4d574738a969a440c29e7a27_400x.jpg', 93, 194, 3),
('9781529366839', 'KINTSUGI: Embrace Your Imperfections And Find Happiness The Japanese Way', 'Tomas Navarro', '2021-05-27', 'Discover how to embrace the imperfect with Kintsugi. Apply this ancient principle to your life and you will learn how to repair yourself, rebuild your life, and love your flaws.\r\n\r\nJapanese Kintsugi masters delicately patch up broken ceramics with gold adhesive, leaving the restoration clearly visible to others. Psychologist Tomas Navarro believes that we should approach our lives with the same philosophy. Everyone faces suffering, but it is the way in which we overcome our troubles, and heal our emotional wounds, that is key. We shouldn\'t conceal our repairs, they are proof of our strength.\r\n\r\nNavarro presents real solutions to genuine problems that he has seen in his professional practice. His anecdotes demonstrate that it is possible to transform adversity or setbacks into a strength. His psychological understanding and perspective will leave you feeling courageous and prepared, should you experience misfortune, be it heartbreak, a job loss, or bereavement.\r\n\r\nOften practiced alongside Ikigai (or the art of finding one\'s life purpose), Kintsugi shows you how happiness can be found again, often against all odds. A painful experience can in fact make you a more determined individual, ready to face the world with optimism', 'https://d26olvxuieoyaa.cloudfront.net/catalog/product/cache/1/small_image/400x500/9df78eab33525d08d6e5fb8d27136e95/9/7/9781529366839.jpg', 19, 57, 2),
('9781572842625', 'Mark Zuckerberg: In His Own Words', 'George Beahm', '2018-08-30', 'Mark Zuckerberg: In His Own Words details the visionary thoughts and opinions of Facebook\'s founder entirely through direct quotations from Zuckerberg himself. It is an intimate and authoritative look at the man behind Facebook\'s once-in-a-generation success. This book serves up his most thought-provoking insights, as researched and chosen by George Beahm, the New York Times bestselling editor of I, Steve: Steve Jobs In His Own Words. Mark Zuckerberg: In His Own Words provides crucial illumination of Zuckerberg and the company he\'s created, emphasizing insights, business strategies, and lessons learned. It is essential reading for people who seek innovative solutions applicable to their business, regardless of size, and makes an ideal gift or reference item for anyone interested in this American business icon.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/5728/9781572842625.jpg', 59, 69, 16),
('9781607103134', 'Grimm\'s Complete Fairy Tales', 'Jacob and Wilhelm Grimm', '2018-05-22', 'No library\'s complete without the classics! This new, enhanced leather-bound edition collects the legendary fairy tales of the Brothers Grimm. They are the stories we\'ve known since we were children. Rapunzel. Hansel and Gretel. Cinderella. Sleeping Beauty. But the works originally collected by the Brothers Grimm in the early 1800s are not necessarily the versions we heard before bedtime. They\'re darker and often don\'t end very happily--but they\'re often far more interesting. This elegant edition of Grimm\'s Complete Fairy Tales includes all our cherished favorites--Snow White, Rumpelstiltskin, Little Red Cap, and many more--in their original versions. With specially designed end papers, a genuine leather cover, and other enhancements, it\'s the perfect gift for anyone looking to build a complete home library. Many of these tales begin with the familiar refrain of \"once upon a time\"--but they end with something unexpected and fascinating!', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/6071/9781607103134.jpg', 94, 108, 16),
('9781612620244', 'Attack On Titan 1', 'Hajime Isayama', '2012-06-19', 'Several hundred years ago, humans were nearly exterminated by giants. Giants are typically several stories tall, seem to have no intelligence and who devour human beings. A small percentage of humanity survived barricading themselves in a city protected by walls even taller than the biggest of giants. Flash forward to the present and the city has not seen a giant in over 100 years - before teenager, Elen and his foster sister Mikasa witness something horrific as the city walls are destroyed by a super-giant that appears from nowhere.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/6126/9781612620244.jpg', 42, 84, 8),
('9781632368096', 'Granblue Fantasy 1', 'Cygames', '2019-06-11', 'The manga based on the acclaimed RPG, from the designers of gaming classics Final Fantasy V/VI/IX. Don’t wait for Granblue Fantasy: Relink to return to the world of Granblue!\r\n\r\nEver since his father left home, Gran has longed to search for Estalucia, the mystical island in the sky. Gran’s adventure begins when he runs into Lyria, a mysterious girl being chased by the Imperial Army. Even though Gran perishes trying to save her, she uses her powers to resurrect him, and this incredible act binds their fates together! Now, Gran and his pal, Vyrn, must fight to protect Lyria…and to find their way to the end of the sky!', 'https://d3525k1ryd2155.cloudfront.net/f/096/368/9781632368096.RH.0.m.jpg', 12, 58, 7),
('9781644710036', 'Angels Among Us', 'Marie McCluskey', '2018-12-31', '‼️‼️HOLY MOLY‼️‼️‼️‼️ IS THAT AN AMONG US REFERENCE??????!!!!!!!!!!11!1!1!1!1!1!1! AMONG US IS THE BEST GAME EVER!!!!!! RED IS SO SUSSSSS!!!!! COME TO MEDBAY AND WATCH ME SCAN WHY IS NO ONE FIXING O2!!!!!! OH YOUR CREWMATE? NAME EVERY TASK\r\nWhere Any sus! Where! Where! Any sus! Where! Any sus! Any sus! Where!Where!Where! Any sus!Where!Any sus Where! Where! Where!Any sus! Any sus! Where! Where! Any sus! Any sus!  Where! Any sus! Where! Where! Where!Where! Any sus! Any sus! Where! Where! Where!Any sus!Where! Where! I think it was purple!!!!! It wasnt me I was in vents!!!!!!!!!!!!!! XDDDDDXDXDDXDDXXDD\r\nr/amongusmemes r/unexpectedamongus r/expectedamongus perfectly balanced as all things should be r/unexpectedthanos r/expectedthanos for balance', 'https://m.media-amazon.com/images/I/4102N+pDh1L.jpg', 22, 64, 10),
('9781645020882', 'The Truth About COVID-19: Exposing The Great Reset, Lockdowns, Vaccine Passports, and the New Normal', 'Doctor Joseph Mercola &amp;  Ronnie Cummins', '2021-04-29', 'Multiple New York Times best-selling authors Dr. Joseph Mercola and Ronnie Cummins, founder, and director of the Organic Consumers Association, team up to expose the truth and end the madness about COVID-19.\r\n\r\nSince early 2020, the world has experienced a series of a catastrophic events-a global pandemic caused by what appears to be an engineered coronavirus; international lockdowns and border closings causing widespread business closures, economic collapse, and massive unemployment; and an unprecedented curtailment of civil liberties and freedoms in the name of keeping people safe by locking them up in their homes.\r\n\r\nWe are now living in a world that is increasingly ruled, not by our democratic systems and institutions, but by public health fiat, carried out by politicians who rule by instilling fear and panic.\r\n\r\nIn The Truth, About COVID-19, Dr. Mercola, and Cummins reveal new and emerging evidence that:\r\n\r\nThe SARS-CoV-2 virus was, indeed, lab-engineered and emerged from a negligently managed bioweapons lab in Wuhan, China\r\nThe global pandemic was long anticipated by global elites who have used it to facilitate and hide the largest upward transfer of wealth in human history\r\nPCR testing, case counts, morbidity, and vaccine safety and efficacy data have been widely manipulated and misrepresented\r\nObesity, diabetes, and heart disease are known to worsen COVID-19 outcomes, but the junk food industry continues to push its agenda at the expense of public health\r\nSafe, simple, and inexpensive treatment and prevention for COVID-19 have been censored and suppressed to create a clear path for vaccine acceptance\r\nThe effectiveness of the vaccines has been wildly exaggerated and major safety questions have gone unanswered\r\n\r\nThe good news in all of this is that we can take control of our health and that, together, we have the power to unite and fight back for our health, democracy, and freedom. The time is now for a global awakening. As Dr. Mercola and Cummins remind us, this is the fight of our lives.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/6450/9781645020882.jpg', 83, 99, 16),
('9781786037329', 'Stephen Hawking: Volume 21', 'María Isabel Sánchez Vegara', '2019-02-07', 'In this book from the critically acclaimed, multimillion-copy bestselling Little People, BIG DREAMS series, discover the life of Stephen Hawking, the genius physicist and author.\r\n\r\nWhen Stephen Hawking was a little boy, he used to stare up at the stars and wonder about the universe. Although he was never top of the class, his curiosity took him to the best universities in England: Oxford and Cambridge. It also led him to make one of the biggest scientific discoveries of the 20th century: Hawking radiation. This moving book features stylish and quirky illustrations and extra facts at the back, including a biographical timeline with historical photos and a detailed profile of the brilliant physicist\'s life.\r\n\r\nLittle People, BIG DREAMS is a bestselling series of books and educational games that explore the lives of outstanding people, from designers and artists to scientists and activists. All of them achieved incredible things, yet each began life as a child with a dream.\r\n\r\nThis empowering series offers inspiring messages to children of all ages, in a range of formats. The board books are told in simple sentences, perfect for reading aloud to babies and toddlers. The hardback versions present expanded stories for beginning readers. Boxed gift sets allow you to collect a selection of the books by theme. Paper dolls, learning cards, matching games and other fun learning tools provide even more ways to make the lives of these role models accessible to children.\r\n\r\nInspire the next generation of outstanding people who will change the world with Little People, BIG DREAMS!', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/7860/9781786037329.jpg', 49, 58, 10),
('9781786894694', 'Vladimir Putin: Life Coach', 'Rob Sears', '2018-06-11', 'What can the rise and reign of this century\'s most feared politician teach us about life, work and love? Rob Sears shows how the machinations that enabled Putin to dominate the Kremlin and undermine the United States of America could also help you take control of your mundane life. How would you like to ruin your enemies by sharing compromising material about that time they didn\'t wash their hands? Or annex territory by claiming the stationery cupboard at work as your personal empire? Fancy hacking democracy at the parent-teacher association to ensure you\'re a shoo-in for social secretary? Or serving up a cold dish called revenge in a high street restaurant?\r\n\r\nFilled with stories from Putin\'s extraordinary time in power, and ideas and illustrations to help you emulate him on a small scale, Vladimir Putin: Life Coach is the ultimate guide to releasing the pseudo-elected, judo black belt, 5D chess-playing autocrat inside each and every one of us.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/7868/9781786894694.jpg', 46, 58, 1),
('9781786894724', 'The Beautiful Poetry of Donald Trump', 'Rob Sears', '2019-11-05', 'What if there\'s a hidden dimension to Donald Trump; a sensitive, poetic side? Driven by this question, Rob Sears began combing Trump\'s words for signs of poetry.\r\n\r\nWhat he found was a revelation. By simply taking the 45th President of the United States\' tweets and transcripts, cutting them up and reordering them, Sears unearthed a trove of beautiful verse that was just waiting to be discovered.\r\n\r\nThis groundbreaking collection gives readers a glimpse of Trump\'s innermost thoughts and feelings on everything from the nature of truth, to what he hates about Lord Sugar. And it will reveal a hitherto hidden Donald, who may surprise and delight both students and critics alike.\r\n\r\nNow with seventeen all-new poems! As we lurch deeper into the Trump presidency, this timely publication also includes Sears\' scholarly footnotes and introduction, in which he excavates new critical angles and insights into the President\'s poetry which the casual reader might initially overlook.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/7868/9781786894724.jpg', 51, 58, 1),
('9781786898647', 'Choose Your Own Apocalypse With Kim Jong-un &amp; Friends', 'Rob Sears', '2019-11-11', 'There are many ways civilisation could end, even with wise, benevolent leaders like Kim Jong-un, Donald Trump and Vladimir Putin watching over us. Now, in this fun interactive story of global doom, YOU decide how humanity perishes.\r\n\r\nWill we be turned to grey goo by Elon Musk\'s nanobots?\r\nDriven collectively insane by Russia\'s most potent memes?\r\nOr smashed to atoms by someone sitting on the wrong button in North Korea?\r\n\r\nIn this book, YOU will meet the leaders with the future of civilisation in their hands. And YOUR wits and judgement will decide how we all inevitably die. Or then again, maybe, just maybe, with a little positive thinking, YOU will find a way to keep us all safe long enough to expire of old age and global warming instead. Just don\'t get too hopeful. On every page of Choose Your Own Apocalypse with Kim Jong-un & Friends, the end of your choice is most definitely nigh.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/7868/9781786898647.jpg', 45, 58, 4),
('9781787734425', 'Snowpiercer 1: The Escape : The Escape', 'Jacques Lob, Jean Marc Rochette', '2020-06-05', 'The stunning graphic novel that inspired the movie Snowpiercer, starring Chris Evans, and TV Series, starring Jennifer Connelly - presented in English for the very first time!  On a future, frozen Earth, a train that never stops circumnavigates the globe. On board: all of humanity that we could save from the great disaster that wrapped the planet in ice. At the front of the train, the survivors live in comfort and luxury - at the rear, their lives are worse than cattle, trapped in the squalid dark. When one of the occupants of the tail breaks through into the main train - all hell follows in his wake!', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/7877/9781787734425.jpg', 65, 69, 15),
('9781787734432', 'Snowpiercer 2: The Explorers', 'Benjamin Legrand, Jean Marc Rochette', '2020-06-11', 'The second volume of the graphic novel series that inspired the movie Snowpiercer, starring Chris Evans - presented in English for the very first time!\r\n\r\nOn a future, frozen Earth, a train that never stops circumnavigates the globe. On board: all of humanity that could be saved from the great disaster that wrapped the planet in ice.\r\n\r\nIt has long been thought that Snowpiercer was the last bastion of human civilization... but there is another train. Coursing through the endless, wintry night, its occupants live in a constant state of terror that they will collide with the train that went before...\r\n\r\nFrom this second train emerges a small group of the passengers who are willing to risk their lives in the deadly cold to explore what\'s left of our world.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/7877/9781787734432.jpg', 75, 83, 0),
('9781790752805', 'Quotations from Chairman Mao Tse-Tung: The Little Red Book', 'Mao Tse-tung', '2018-12-04', 'Quotations from Chairman Mao Tse-Tung are comprised of statements from speeches and writings of Mao Tse-Tung, the former Chairman of the Communist Party of China from 1943 to 1976. The book was originally printed in small sizes and bound in bright red covers, becoming commonly known as The Little Red Book. The contents cover a wide swath of Mao\'s interpretations of Marxist-Leninist thought and how it should be applied to the Chinese people and culture.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/7907/9781790752805.jpg', 45, 57, 14),
('9781839350832', 'The Impostor\'s Guide to Among Us (Independent &amp; Unofficial)', 'Pettman, Kevin', '2021-02-09', 'In this two-part, unofficial and independent guide to Among Us, you\'ll learn how to spot impostors... and how to fool the team when you are one!\r\n\r\nThe first section gives you all the best techniques for spotting the impostors in your crew. Learn all about task checking, questioning, time management, teaming up, and loads of other excellent snooping skills. And then it\'s time for the sneaky stuff! The Impostor\'s Handbook section gives you all the tools you need to fool everyone and win the game. You\'ll read about crafting alibis, faking task work, and lying with confidence.\r\n\r\nTogether, they make the only guide to Among Us you\'ll need - it\'s the perfect read for anyone who wants to survive in space (or destroy everyone!).', 'https://cdn.shopify.com/s/files/1/0511/7575/1837/products/9781839350832_307x.jpg', 6, 32, 2),
('9781840220766', 'The Complete Stories of Sherlock Holmes', 'Sir Arthur Conan Doyle', '2008-03-05', 'It is more than a century since the ascetic, gaunt and enigmatic detective, Sherlock Holmes, made his first appearance in A Study in Scarlet. From 1891, beginning with The Adventures of Sherlock Holmes, the now legendary and pioneering Strand Magazine began serialising Arthur Conan Doyle\'s matchless tales of detection, featuring the incomparable sleuth patiently assisted by his doggedly loyal and lovably pedantic friend and companion, Dr Watson.\r\n\r\n\r\nThe stories are illustrated by the remarkable Sydney Paget from whom our images of Sherlock Holmes and his world derive and who first equipped Holmes with his famous deerstalker hat. The literary cult of Sherlock Holmes shows no sign of fading with time as each new generation comes to love and revere the penetrating mind and ruthless logic which were the undoing of so many Victorian master criminals.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/8402/9781840220766.jpg', 97, 105, 3),
('9781912854547', 'Billion Dollar Whale', 'Bradley Hope &amp; Tom Wright', '2019-09-12', 'A BOOK OF THE YEAR FOR THE FINANCIAL TIMES AND FORTUNE MAGAZINE.\r\n\r\nThe epic story of how a young social climber from Malaysia pulled off one of the biggest financial heists in history.\r\n\r\nIn 2015, rumours began circulating that billions of dollars had been stolen from a Malaysian investment fund. The mastermind of the heist was twenty-seven-year-old Jho Low, a serial fabulist from an upper-middle-class Malaysian family, who had carefully built his reputation as a member of the jet-setting elite by arranging and financing elaborate parties for Wall Street bankers, celebrities, and even royalty.\r\n\r\nWith the aid of Goldman Sachs and others, Low stole billions of dollars, right under the nose of global financial industry watchdogs. He used the money to finance elections, purchase luxury real estate, throw champagne-drenched parties, and bankroll Hollywood films like The Wolf of Wall Street.\r\n\r\nBillion Dollar Whale reveals how this silver-tongued con man, a \'modern Gatsby\', emerged from obscurity to pull off one of the most audacious financial heists the world has ever seen, and how the financial industry let him. It is a classic harrowing parable of hubris and greed in the financial world.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/9128/9781912854547.jpg', 48, 82, 5),
('9781948838511', 'Is the order a rabbit? Vol. 1', 'Koi', '2020-12-16', '\"Bunny rabbits! Bunny rabbits!♪\" Cocoa sang as she entered the café \"Rabbit House.\" Little did she know that she would be spending the next few years of her life there.\r\n\r\nFollow Cocoa as she makes friends with the quiet and blunt Chino, the strict yet kind military buff Rize, the calm and gentle Chiya, and the elegant yet down-to-earth Syaro! You don\'t want to miss the first volume of Is the order a rabbit?', 'https://rimg.bookwalker.jp/3045804/OWWPXNVne2Og5o9nA6tp3Q__.jpg', 10, 31, 0),
('9781974700523', 'Demon Slayer: Kimetsu no Yaiba', 'Koyoharu Gotouge', '2018-07-26', 'Tanjiro sets out on the path of the Demon Slayer to save his sister and avenge his family! In Taisho-era Japan, Tanjiro Kamado is a kindhearted boy who makes a living selling charcoal. But his peaceful life is shattered when a demon slaughters his entire family. His little sister Nezuko is the only survivor, but she has been transformed into a demon herself! Tanjiro sets out on a dangerous journey to find a way to return his sister to normal and destroy the demon who ruined his life. Learning to slay demons won\'t be easy, and Tanjiro barely knows where to start. The surprise appearance of another boy named Giyu, who seems to know what\'s going on, might provide some answers...but only if Tanjiro can stop Giyu from killing his sister first! Action-adventure title similar to InuYasha that pits samurai swords against demons.', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/9747/9781974700523.jpg', 93, 103, 0),
('9784758072526', 'Yuru Yuri vol.10 Special Edition', 'Namori', '2013-06-01', 'The tenth volume of Yuru Yuri!', 'https://pictures.abebooks.com/isbn/9784758072526-us.jpg', 20, 54, 9),
('9784832249905', 'Is the Order a Rabbit? Vol. 7', 'Koi', '2018-11-07', 'Cocoa Hoto is a positive and cheerful girl who has just moved to a new town to attend high school and moves in with the Kafu family which runs a cafe called the Rabbit House Cafe. She quickly becomes friends with Chino Kafu, a quiet, precocious girl who walks around with a talking rabbit named Tippy on her head. After beginning to work in the cafe to pay for her room and board, she begins befriending a host of other unique girls including coworker Rize Tedeza, a serious girl with an obsession with guns, along with girls from other nearby cafes including Syaro Kirima, a hardworking, clumsy girl who works at Fleur de Lapin, and Chiya Ujimatsu, a playful girl who does things at her own pace. Together, the girls have silly caffeinated fun every day!', 'https://i.ebayimg.com/images/g/wIQAAOSwQXlb75dz/s-l640.jpg', 21, 42, 13),
('9784832272323', 'Is the Order a Rabbit? Art Book Café de Étoile', 'Koi', '2020-11-26', 'Is the Order a Rabbit? The first art book in 6 years is \"Soleil\" and \"Etoile\" released in November for 2 consecutive months!\r\n\r\nKirara MAX cover , Color door paintings, comics benefits, anime package illustrations, April Fool illustrations, etc.\r\nA lot of beautiful illustrations written from 2017 to 2020 are posted.', 'https://i.ebayimg.com/images/g/t~EAAOSwYB1g7BwR/s-l500.jpg', 88, 174, 1),
('9787119090573', 'Xi Jinping: The Governance of China', 'Xi Jinping', '2014-11-14', 'As general secretary of the CPC Central Committee and president of the People\'s Republic of China, Xi Jinping has delivered many speeches on a broad range of issues. He has offered his thoughts, views and judgments, and answered a series of important theoretical and practical questions about the Party and the country in these changing times. His speeches embody the philosophy of the new central leadership. To respond to rising international interest and to enhance the rest of the world\'s understanding of the Chinese government\'s philosophy and its domestic and foreign policies, the State Council Information Office, the Party Literature Research Office of the CPC Central Committee and the China International Publishing Group have worked together to produce this book. The book is a compilation of Xi Jinping\'s major works from November 15, 2012 to June 13, 2014. It includes, speeches, talks, interviews, instructions, and correspondence for a total of 70 pieces. It also contains 45 pictures of Xi Jinping atwork and in daily life with focus on the period since the 18th National Congress of the Communist Party of China in 2012', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9787/1190/9787119090573.jpg', 107, 151, 1);
INSERT INTO `book` (`isbn`, `title`, `author`, `publish_date`, `description`, `picture`, `trade_price`, `retail_price`, `quantity`) VALUES
('9789672464181', 'My Story: Justice in the Wilderness', 'Tommy Thomas', '2021-01-30', 'As the first private practitioner in some 70 years to be appointed Attorney General of Malaysia, Tommy Thomas describes his experience in the highest legal office in the land in this highly personal book.\r\n\r\nThe former AG discusses key decisions he made, including the prosecution of former Prime Minister Najib Razak, Jho Low, Arul Kanda, and Goldman Sachs for their roles in the 1MDB scandal.\r\n\r\nHis book is the first insider’s account by a senior Pakatan Harapan government official on the achievements, disappointments, and failures of the first non-Barisan administration in the 60-year history of independent Malaysia. His authentic voice is captured in this candid memoir and is recommended reading for anyone interested in Malaysian politics and the law.', 'https://cdn.shopify.com/s/files/1/0511/7575/1837/products/9789672464181_600x600_crop_center.jpg?v=1614586776', 26, 73, 4),
('9789674152284', 'Town Boy', 'Lat', '2014-08-29', 'The town boy, also known as Lat, the Kampung Boy, or simply Kampung Boy, is a graphic novel by Lat about a young boy\'s experience growing up in rural Perak in the 1950s. The book is an autobiographical account of the artist\'s life, telling of his adventures in the jungles and tin mines, his circumcision, family, and school life.', 'https://my-test-11.slatic.net/p/998348a41a24a45e01571ca11b736234.png_360x360q90.jpg_.webp', 17, 30, 6),
('9789674152482', 'A Doctor in the House: The Memoirs of Tun Dr Mahathir Mohamad', 'Tun Dr Mahathir Mohamad', '2011-01-01', 'The West has called him recalcitrant, racist, anti-Semitic, and arrogant. The developing world, however, sees former Malaysian Prime Minister Tun Dr. Mahathir Mohamad as a visionary champion, the rare leader who gave every Third World individual reason to stand tall. Even his harshest critics cannot deny that, above all else, he gave some of the most neglected countries courage, showing the way to a more hopeful future. But it was not without controversy. His 22 years at the country\'s helm have been characterized as both dictatorial and inspiring.\r\n\r\nFew leaders have been able to turn an entire country from a predominantly agrarian economy into an industrial powerhouse-fewer still have been able to do so within a short two decades. Here, with surgical precision, Dr. Mahathir explores a nuanced history and scrutinises his own role in the shaping of modern Malaysia.', 'https://images-na.ssl-images-amazon.com/images/I/51Li4D5FAwL._SX332_BO1,204,203,200_.jpg', 48, 88, 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `ship_address` text COLLATE utf8_unicode_ci NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `email`, `username`, `order_date`, `ship_address`, `total_price`) VALUES
(53, 29, 'lukazholiao@yahoo.com', 'lukazio123', '2021-07-17 12:25:57', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Malaysia', 354),
(54, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 13:37:40', '1653131 Area 51. SomeCityName. 696969. Nevada. Guam', 233),
(55, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 13:39:42', '9-00 Lorong Aman. Balik Pulau. 11000 . Penang. Malaysia', 100),
(56, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 13:48:36', 'Wuhan South China Seafood Wholesale Market Building. Wuhan. 31122019 . Hubei. China', 187),
(57, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 13:49:49', '1653131 Area 51. SomeCityName. 696969. Nevada. Guam', 343),
(58, 19, 'junxian5407@gmail.com', 'Xian5407', '2021-07-17 13:51:26', '5941,Jalan Boria\r\nTaman Ria Jaya. Sungai petani. 08000. Kedah. Malaysia', 810),
(59, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 13:55:33', '1600 Pennsylvania Avenue. NW. 20500. Washington DC. United States', 269),
(60, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 13:57:39', '12345 Lorong Aman. Balik Pulau. 11000 . Penang. Malaysia', 16),
(61, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 14:00:09', '12345 Lorong Aman. Balik Pulau. 11000 . Penang. Malaysia', 148),
(62, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 14:01:03', '12345 Lorong Aman. Balik Pulau. 11000 . Penang. Malaysia', 128),
(63, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 14:03:41', '12345 Lorong Aman. Balik Pulau. 11000 . Penang. Malaysia', 200),
(64, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 14:07:55', '12345 Lorong Aman. Balik Pulau. 11000 . Penang. Malaysia', 140),
(65, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 14:08:19', '12345 Lorong Aman. Balik Pulau. 11000 . Penang. Thailand', 95),
(66, 19, 'Junxian5407@gmail.com', 'Xian5407', '2021-07-17 14:13:49', '5941,Jalan Boria\r\nTaman Ria Jaya. Sungai petani. 08000. Kedah. Malaysia', 74),
(67, 20, 'jaysonneoh@gmail.com', 'Jayson', '2021-07-17 14:14:21', 'Blk 23-6-20, Taman Lone Pine, Lebuh Raya Thean Teik, Ayer Itam, 11060, Pulau Pinang.. Georgetown. 11060. Penang. Malaysia', 186),
(68, 19, 'Junxian5407@gmail.com', 'Xian5407', '2021-07-17 14:14:29', '5941,Jalan Boria\r\nTaman Ria Jaya. Sungai petani. 08000. Kedah. Malaysia', 324),
(69, 19, 'Junxian5407@gmail.com', 'Xian5407', '2021-07-17 14:15:08', '5941,Jalan Boria\r\nTaman Ria Jaya. Sungai petani. 08000. Kedah. Malaysia', 257),
(70, 20, 'jaysonneoh@gmail.com', 'Jayson', '2021-07-17 14:15:36', 'Blk 23-6-20, Taman Lone Pine, Lebuh Raya Thean Teik, Ayer Itam, 11060, Pulau Pinang.. Georgetown. 11060. Penang. Mali', 125),
(71, 19, 'Junxian5407@gmail.com', 'Xian5407', '2021-07-17 14:16:06', '5941,Jalan Boria\r\nTaman Ria Jaya. Sungai petani. 08000. Kedah. Malaysia', 125),
(72, 19, 'Junxian5407@gmail.com', 'Xian5407', '2021-07-17 14:16:17', '5941,Jalan Boria\r\nTaman Ria Jaya. Sungai petani. 08000. Kedah. Malaysia', 97),
(73, 20, 'jaysonneoh@gmail.com', 'Jayson', '2021-07-17 14:16:38', 'Blk 23-6-20, Taman Lone Pine, Lebuh Raya Thean Teik, Ayer Itam, 11060, Pulau Pinang.. Georgetown. 11060. Penang. Madagascar', 429),
(74, 19, 'Junxian5407@gmail.com', 'Xian5407', '2021-07-17 14:17:03', '5941,Jalan Boria\r\nTaman Ria Jaya. Sungai petani. 08000. Kedah. Malaysia', 295),
(75, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 14:17:34', '12345 Lorong Aman. Balik Pulau. 11000 . Penang. Malaysia', 107),
(76, 20, 'jaysonneoh@gmail.com', 'Jayson', '2021-07-17 14:17:35', 'Blk 23-6-20, Taman Lone Pine, Lebuh Raya Thean Teik, Ayer Itam, 11060, Pulau Pinang.. Georgetown. 11060. Penang. Mali', 413),
(77, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 14:19:18', '12345 Lorong Aman. Balik Pulau. 11000 . Penang. Malaysia', 145),
(78, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 14:20:24', '12345 Lorong Aman. Balik Pulau. 11000 . Penang. Malaysia', 94),
(79, 19, 'Junxian5407@gmail.com', 'Xian5407', '2021-07-17 14:20:25', '5941,Jalan Boria\r\nTaman Ria Jaya. Sungai petani. 08000. Kedah. Malaysia', 16),
(80, 17, 'admin@test.com', 'admin', '2021-07-17 14:20:32', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Albania', 856),
(81, 19, 'Junxian5407@gmail.com', 'Xian5407', '2021-07-17 14:20:58', '5941,Jalan Boria\r\nTaman Ria Jaya. Sungai petani. 08000. Kedah. Malaysia', 306),
(82, 17, 'admin@test.com', 'admin', '2021-07-17 14:21:25', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Albania', 717),
(83, 20, 'jaysonneoh@gmail.com', 'Jayson', '2021-07-17 14:21:43', 'Blk 23-6-20, Taman Lone Pine, Lebuh Raya Thean Teik, Ayer Itam, 11060, Pulau Pinang.. Georgetown. 11060. Penang. Malaysia', 149),
(84, 19, 'Junxian5407@gmail.com', 'Xian5407', '2021-07-17 14:21:43', '5941,Jalan Boria\r\nTaman Ria Jaya. Sungai petani. 08000. Kedah. Malaysia', 69),
(85, 29, 'lukazholiao@yahoo.com', 'lukazio123', '2021-07-17 14:22:08', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Malaysia', 307),
(86, 29, 'lukazholiao@yahoo.com', 'lukazio123', '2021-07-17 14:22:33', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Malaysia', 529),
(87, 20, 'jaysonneoh@gmail.com', 'Jayson', '2021-07-17 14:23:09', 'Blk 23-6-20, Taman Lone Pine, Lebuh Raya Thean Teik, Ayer Itam, 11060, Pulau Pinang.. Georgetown. 11060. Penang. Maldives', 442),
(88, 29, 'lukazholiao@yahoo.com', 'lukazio123', '2021-07-17 14:23:16', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Malaysia', 394),
(89, 20, 'jaysonneoh@gmail.com', 'Jayson', '2021-07-17 14:26:19', 'Blk 69-6-9, Taman Lone Pine, Lebuh Raya Thean Teik, Ayer Itam, 11060, Pulau Pinang.. Georgetown. 11060. Penang. Malaysia', 291),
(90, 20, 'jaysonneoh@gmail.com', 'Jayson', '2021-07-17 14:26:47', 'Blk 23-6-20, Taman Lone Pine, Lebuh Raya Thean Teik, Ayer Itam, 11060, Pulau Pinang.. Georgetown. 11060. Penang. Libyan Arab Jamahiriya', 336),
(91, 29, 'lukazholiao@yahoo.com', 'lukazio123', '2021-07-17 14:28:12', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Malaysia', 100),
(92, 29, 'lukazholiao@yahoo.com', 'lukazio123', '2021-07-17 14:28:27', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Malaysia', 262),
(93, 29, 'lukazholiao@yahoo.com', 'lukazio123', '2021-07-17 14:28:59', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Malaysia', 226),
(94, 20, 'jaysonneoh@gmail.com', 'Jayson', '2021-07-17 14:29:09', 'Blk 69-6-9, Taman Lone Pine, Lebuh Raya Thean Teik, Ayer Itam, 11060, Pulau Pinang.. Georgetown. 11060. Penang. Malaysia', 167),
(95, 29, 'lukazholiao@yahoo.com', 'lukazio123', '2021-07-17 14:29:15', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Malaysia', 328),
(96, 20, 'jaysonneoh@gmail.com', 'Jayson', '2021-07-17 14:29:52', 'Blk 23-6-20, Taman Lone Pine, Lebuh Raya Thean Teik, Ayer Itam, 11060, Pulau Pinang.. Georgetown. 11060. Penang. Malawi', 74),
(97, 17, 'admin@test.com', 'admin', '2021-07-17 14:30:21', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Albania', 602),
(98, 20, 'jaysonneoh@gmail.com', 'Jayson', '2021-07-17 14:30:36', 'Blk 23-6-20, Taman Lone Pine, Lebuh Raya Thean Teik, Ayer Itam, 11060, Pulau Pinang.. Georgetown. 11060. Penang. Djibouti', 253),
(99, 19, 'Junxian5407@gmail.com', 'Xian5407', '2021-07-17 14:30:40', '5941,Jalan Boria\r\nTaman Ria Jaya. Sungai petani. 08000. Kedah. Malaysia', 70),
(100, 17, 'admin@test.com', 'admin', '2021-07-17 14:30:44', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Albania', 694),
(101, 20, 'jaysonneoh@gmail.com', 'Jayson', '2021-07-17 14:31:19', 'Blk 23-6-20, Taman Lone Pine, Lebuh Raya Thean Teik, Ayer Itam, 11060, Pulau Pinang.. Georgetown. 11060. Penang. Mali', 430),
(102, 19, 'Junxian5407@gmail.com', 'Xian5407', '2021-07-17 14:31:24', '5941,Jalan Boria\r\nTaman Ria Jaya. Sungai petani. 08000. Kedah. Malaysia', 547),
(103, 17, 'admin@test.com', 'admin', '2021-07-17 14:31:46', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Albania', 303),
(104, 23, 'vminhui@yahoo.com', 'vanessa', '2021-07-17 14:32:50', '12345 Lorong Aman. Balik Pulau. 11000 . Penang. Malaysia', 167),
(105, 17, 'admin@test.com', 'admin', '2021-07-17 14:33:42', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Babylon. 11700. Pulau Pinang. Bahrain', 230),
(106, 17, 'admin@test.com', 'admin', '2021-07-17 14:33:46', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Albania', 502),
(107, 17, 'admin@test.com', 'admin', '2021-07-17 14:34:11', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Albania', 276),
(108, 17, 'admin@test.com', 'admin', '2021-07-17 14:35:19', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee. Gelugor. 11700. Pulau Pinang. Albania', 1256);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `book_isbn` varchar(13) CHARACTER SET utf8mb4 NOT NULL,
  `book_title` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `book_isbn`, `book_title`, `quantity`, `subtotal`) VALUES
(132, 53, '9791256356355', 'life of a cat 2 electric boogaloo', 1, 273),
(133, 53, '69', 'Karma Sutra', 1, 69),
(134, 54, '9780007578795', 'Putin\'s People: How the KGB Took Back Russia and Then Took on the West', 1, 153),
(135, 54, '9789672464181', 'My Story: Justice in the Wilderness', 1, 73),
(136, 55, '9789674152482', 'A Doctor in the House: The Memoirs of Tun Dr Mahathir Mohamad', 1, 88),
(137, 56, '9787119090573', 'Xi Jinping: The Governance of China', 1, 151),
(138, 56, '9781839350832', 'The Impostor\'s Guide to Among Us (Independent ', 1, 32),
(139, 57, '9781612620244', 'Attack On Titan 1', 1, 84),
(140, 57, '9781645020882', 'The Truth About COVID-19 : Exposing The Great Reset, Lockdowns, Vaccine Passports, and the New Normal', 1, 99),
(141, 57, '9780007578795', 'Putin\'s People: How the KGB Took Back Russia and Then Took on the West', 1, 153),
(142, 58, '9780007578795', 'Putin\'s People: How the KGB Took Back Russia and Then Took on the West', 1, 153),
(143, 58, '9781524763169', 'A Promised Land (US)', 1, 194),
(144, 58, '9781790752805', 'Quotations from Chairman Mao Tse-Tung : The Little Red Book', 1, 57),
(145, 58, '9787119090573', 'Xi Jinping: The Governance of China', 1, 151),
(146, 58, '9789672464181', 'My Story: Justice in the Wilderness', 1, 73),
(147, 58, '9789674152482', 'A Doctor in the House: The Memoirs of Tun Dr Mahathir Mohamad', 1, 88),
(148, 58, '9781912854547', 'Billion Dollar Whale', 1, 82),
(149, 59, '9781974700523', 'Demon Slayer: Kimetsu no Yaiba', 1, 103),
(150, 59, '9780785239758', 'The Adventures of Sherlock Holmes (Seasons Edition--Spring)', 1, 147),
(151, 60, '9780008156312', 'Time Travelling with a Hamster', 1, 4),
(152, 61, '9780199672899', 'Ocean Worlds : The story of seas on Earth and other planets', 1, 67),
(153, 61, '9781572842625', 'Mark Zuckerberg: In His Own Words', 1, 69),
(154, 62, '9781632368096', 'Granblue Fantasy 1', 2, 116),
(155, 63, '9780199672899', 'Ocean Worlds: The story of seas on Earth and other planets', 2, 134),
(156, 63, '9784758072526', 'Yuru Yuri vol.10 Special Edition', 1, 54),
(157, 64, '9781400209538', 'CHOOSE TO WIN: Transform Your Life, One Simple Choice At A Time', 2, 128),
(158, 65, '9780007119318', 'Murder on the Orient Express', 1, 45),
(159, 65, '9781948838511', 'Is the order a rabbit? Vol. 1', 1, 31),
(160, 66, '9780140437683', 'Treasure Island', 1, 62),
(161, 67, '9781786894694', 'Vladimir Putin: Life Coach', 1, 58),
(162, 67, '9781786894724', 'The Beautiful Poetry of Donald Trump', 1, 58),
(163, 67, '9781786898647', 'Choose Your Own Apocalypse With Kim Jong-un ', 1, 58),
(164, 68, '9781786894724', 'The Beautiful Poetry of Donald Trump', 1, 58),
(165, 68, '9781786898647', 'Choose Your Own Apocalypse With Kim Jong-un ', 1, 58),
(166, 68, '9781786894694', 'Vladimir Putin: Life Coach', 1, 58),
(167, 68, '9781974700523', 'Demon Slayer: Kimetsu no Yaiba', 1, 103),
(168, 68, '9780786846795', 'Jojo\'s Circus: My Name is Jojo - Easy-to-Read 1', 1, 35),
(169, 69, '9781632368096', 'Granblue Fantasy 1', 1, 58),
(170, 69, '9781612620244', 'Attack On Titan 1', 1, 84),
(171, 69, '9781948838511', 'Is the order a rabbit? Vol. 1', 1, 31),
(172, 69, '9784832249905', 'Is the Order a Rabbit? Vol. 7', 1, 42),
(173, 69, '9789674152284', 'Town Boy', 1, 30),
(174, 70, '9781452503806', 'Karma Sutra : Insights Into the Design of Life', 1, 56),
(175, 70, '9781790752805', 'Quotations from Chairman Mao Tse-Tung: The Little Red Book', 1, 57),
(176, 71, '9781452503806', 'Karma Sutra : Insights Into the Design of Life', 1, 56),
(177, 71, '9781790752805', 'Quotations from Chairman Mao Tse-Tung: The Little Red Book', 1, 57),
(178, 72, '9780857501004', 'A Brief History Of Time: From Big Bang To Black Holes', 1, 85),
(179, 73, '9780007578795', 'Putin\'s People: How the KGB Took Back Russia and Then Took on the West', 1, 153),
(180, 73, '9780007119318', 'Murder on the Orient Express', 1, 45),
(181, 73, '9781524108595', 'The Boys Omnibus', 1, 120),
(182, 73, '9781645020882', 'The Truth About COVID-19: Exposing The Great Reset, Lockdowns, Vaccine Passports, and the New Normal', 1, 99),
(183, 74, '9781839350832', 'The Impostor\'s Guide to Among Us (Independent ', 1, 32),
(184, 74, '9781645020882', 'The Truth About COVID-19: Exposing The Great Reset, Lockdowns, Vaccine Passports, and the New Normal', 1, 99),
(185, 74, '9781787734425', 'Snowpiercer 1: The Escape : The Escape', 1, 69),
(186, 74, '9781787734432', 'Snowpiercer 2: The Explorers', 1, 83),
(187, 75, '9780786846795', 'Jojo\'s Circus: My Name is Jojo - Easy-to-Read 1', 1, 35),
(188, 75, '9789674152284', 'Town Boy', 2, 60),
(189, 76, '9781612620244', 'Attack On Titan 1', 1, 84),
(190, 76, '9781632368096', 'Granblue Fantasy 1', 1, 58),
(191, 76, '9781948838511', 'Is the order a rabbit? Vol. 1', 1, 31),
(192, 76, '9784832272323', 'Is the Order a Rabbit? Art Book Café de Étoile', 1, 174),
(193, 76, '9784758072526', 'Yuru Yuri vol.10 Special Edition', 1, 54),
(194, 77, '9780008207670', 'Time Travel', 1, 75),
(195, 77, '9781786037329', 'Stephen Hawking: Volume 21', 1, 58),
(196, 78, '9780141186672', 'The Man in the High Castle', 1, 82),
(197, 79, '9780008156312', 'Time Travelling with a Hamster', 1, 4),
(198, 80, '9781524763169', 'A Promised Land (US)', 3, 582),
(199, 80, '9784758072526', 'Yuru Yuri vol.10 Special Edition', 1, 54),
(200, 80, '9784832249905', 'Is the Order a Rabbit? Vol. 7', 1, 42),
(201, 80, '9784832272323', 'Is the Order a Rabbit? Art Book Café de Étoile', 1, 174),
(202, 81, '9780785239758', 'The Adventures of Sherlock Holmes (Seasons Edition--Spring)', 2, 294),
(203, 82, '9781452503806', 'Karma Sutra: Insights Into the Design of Life', 8, 448),
(204, 82, '9780786846795', 'Jojo\'s Circus: My Name is Jojo - Easy-to-Read 1', 1, 35),
(205, 82, '9781644710036', 'Angels Among Us', 1, 64),
(206, 82, '9781632368096', 'Granblue Fantasy 1', 1, 58),
(207, 82, '9781607103134', 'Grimm\'s Complete Fairy Tales', 1, 108),
(208, 83, '9780008156312', 'Time Travelling with a Hamster', 1, 4),
(209, 83, '9780008207670', 'Time Travel', 1, 75),
(210, 83, '9781786037329', 'Stephen Hawking: Volume 21', 1, 58),
(211, 84, '9781529366839', 'KINTSUGI: Embrace Your Imperfections And Find Happiness The Japanese Way', 1, 57),
(212, 85, '9789674152482', 'A Doctor in the House: The Memoirs of Tun Dr Mahathir Mohamad', 1, 88),
(213, 85, '9787119090573', 'Xi Jinping: The Governance of China', 1, 151),
(214, 85, '9781452503806', 'Karma Sutra: Insights Into the Design of Life', 1, 56),
(215, 86, '9780007578795', 'Putin\'s People: How the KGB Took Back Russia and Then Took on the West', 3, 459),
(216, 86, '9781786894694', 'Vladimir Putin: Life Coach', 1, 58),
(217, 87, '9780141395487', 'The Sign of Four', 1, 46),
(218, 87, '9780141199177', 'The Hound of the Baskervilles', 1, 40),
(219, 87, '9780141395562', 'The Valley of Fear', 1, 46),
(220, 87, '9780141395524', 'A Study in Scarlet', 1, 46),
(221, 87, '9780785239758', 'The Adventures of Sherlock Holmes (Seasons Edition--Spring)', 1, 147),
(222, 87, '9781840220766', 'The Complete Stories of Sherlock Holmes', 1, 105),
(223, 88, '9781786894694', 'Vladimir Putin: Life Coach', 1, 58),
(224, 88, '9781786894724', 'The Beautiful Poetry of Donald Trump', 1, 58),
(225, 88, '9781786898647', 'Choose Your Own Apocalypse With Kim Jong-un ', 1, 58),
(226, 88, '9781790752805', 'Quotations from Chairman Mao Tse-Tung: The Little Red Book', 1, 57),
(227, 88, '9787119090573', 'Xi Jinping: The Governance of China', 1, 151),
(228, 89, '9780007119318', 'Murder on the Orient Express', 1, 45),
(229, 89, '9780141186672', 'The Man in the High Castle', 1, 82),
(230, 89, '9781787734425', 'Snowpiercer 1: The Escape : The Escape', 1, 69),
(231, 89, '9781787734432', 'Snowpiercer 2: The Explorers', 1, 83),
(232, 90, '9781607103134', 'Grimm\'s Complete Fairy Tales', 3, 324),
(233, 91, '9781632368096', 'Granblue Fantasy 1', 1, 58),
(234, 91, '9789674152284', 'Town Boy', 1, 30),
(235, 92, '9781645020882', 'The Truth About COVID-19: Exposing The Great Reset, Lockdowns, Vaccine Passports, and the New Normal', 1, 99),
(236, 92, '9787119090573', 'Xi Jinping: The Governance of China', 1, 151),
(237, 93, '9780199672899', 'Ocean Worlds: The story of seas on Earth and other planets', 1, 67),
(238, 93, '9780785239758', 'The Adventures of Sherlock Holmes (Seasons Edition--Spring)', 1, 147),
(239, 94, '9789674152482', 'A Doctor in the House: The Memoirs of Tun Dr Mahathir Mohamad', 1, 88),
(240, 94, '9780199672899', 'Ocean Worlds: The story of seas on Earth and other planets', 1, 67),
(241, 95, '9780141199177', 'The Hound of the Baskervilles', 1, 40),
(242, 95, '9780141395487', 'The Sign of Four', 1, 46),
(243, 95, '9780141395524', 'A Study in Scarlet', 1, 46),
(244, 95, '9780141395562', 'The Valley of Fear', 4, 184),
(245, 96, '9780008156312', 'Time Travelling with a Hamster', 1, 4),
(246, 96, '9781786037329', 'Stephen Hawking: Volume 21', 1, 58),
(247, 97, '9781612620244', 'Attack On Titan 1', 4, 336),
(248, 97, '9780786846795', 'Jojo\'s Circus: My Name is Jojo - Easy-to-Read 1', 2, 70),
(249, 97, '9781644710036', 'Angels Among Us', 3, 192),
(250, 98, '9780199672899', 'Ocean Worlds: The story of seas on Earth and other planets', 1, 67),
(251, 98, '9781452503806', 'Karma Sutra: Insights Into the Design of Life', 1, 56),
(252, 98, '9781400209538', 'CHOOSE TO WIN: Transform Your Life, One Simple Choice At A Time', 1, 64),
(253, 98, '9780140437683', 'Treasure Island', 1, 62),
(254, 99, '9781786037329', 'Stephen Hawking: Volume 21', 1, 58),
(255, 100, '9781524763169', 'A Promised Land (US)', 2, 388),
(256, 100, '9787119090573', 'Xi Jinping: The Governance of China', 2, 302),
(257, 101, '9781524763169', 'A Promised Land (US)', 1, 194),
(258, 101, '9789672464181', 'My Story: Justice in the Wilderness', 1, 73),
(259, 101, '9787119090573', 'Xi Jinping: The Governance of China', 1, 151),
(260, 102, '9781786894694', 'Vladimir Putin: Life Coach', 1, 58),
(261, 102, '9781786894724', 'The Beautiful Poetry of Donald Trump', 1, 58),
(262, 102, '9781786898647', 'Choose Your Own Apocalypse With Kim Jong-un ', 1, 58),
(263, 102, '9780007578795', 'Putin\'s People: How the KGB Took Back Russia and Then Took on the West', 1, 153),
(264, 102, '9781790752805', 'Quotations from Chairman Mao Tse-Tung: The Little Red Book', 1, 57),
(265, 102, '9787119090573', 'Xi Jinping: The Governance of China', 1, 151),
(266, 103, '9781400209538', 'CHOOSE TO WIN: Transform Your Life, One Simple Choice At A Time', 2, 128),
(267, 103, '9781529366839', 'KINTSUGI: Embrace Your Imperfections And Find Happiness The Japanese Way', 3, 171),
(268, 104, '9789672464181', 'My Story: Justice in the Wilderness', 1, 73),
(269, 104, '9780141186672', 'The Man in the High Castle', 1, 82),
(270, 105, '9780141186672', 'The Man in the High Castle', 1, 82),
(271, 105, '9781572842625', 'Mark Zuckerberg: In His Own Words', 1, 69),
(272, 105, '9780008207670', 'Time Travel', 1, 75),
(273, 106, '9781786894694', 'Vladimir Putin: Life Coach', 1, 58),
(274, 106, '9781786894724', 'The Beautiful Poetry of Donald Trump', 1, 58),
(275, 106, '9781786898647', 'Choose Your Own Apocalypse With Kim Jong-un ', 3, 174),
(276, 106, '9781790752805', 'Quotations from Chairman Mao Tse-Tung: The Little Red Book', 1, 57),
(277, 106, '9787119090573', 'Xi Jinping: The Governance of China', 1, 151),
(278, 107, '9780140437683', 'Treasure Island', 3, 186),
(279, 107, '9780141186672', 'The Man in the High Castle', 1, 82),
(280, 107, '9780008156312', 'Time Travelling with a Hamster', 1, 4),
(281, 108, '9781840220766', 'The Complete Stories of Sherlock Holmes', 1, 105),
(282, 108, '9780857501004', 'A Brief History Of Time: From Big Bang To Black Holes', 1, 85),
(283, 108, '9781786037329', 'Stephen Hawking: Volume 21', 4, 232),
(284, 108, '9781787734432', 'Snowpiercer 2: The Explorers', 10, 830);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `address_line` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `zip_code` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `username`, `password`, `address_line`, `city`, `state`, `zip_code`, `country`, `is_admin`) VALUES
(15, 'customer1@test.com', 'customer1', 'a4fd8e6fa9fbf9a6f2c99e7b70aa9ef2', NULL, NULL, NULL, NULL, NULL, 0),
(16, 'customer2@test.com', 'customer2', 'a4fd8e6fa9fbf9a6f2c99e7b70aa9ef2', NULL, NULL, NULL, NULL, NULL, 0),
(17, 'admin@test.com', 'admin', 'a4fd8e6fa9fbf9a6f2c99e7b70aa9ef2', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee', 'Gelugor', 'Pulau Pinang', '11700', 'Albania', 1),
(19, 'Junxian5407@gmail.com', 'Xian5407', '8d0e3cda8a846961ba6a81cc5bb34421', '5941,Jalan Boria\r\nTaman Ria Jaya', 'Sungai petani', 'Kedah', '08000', 'Malaysia', 0),
(20, 'jaysonneoh@gmail.com', 'Jayson', '1e873f677902e4ec7939538763421458', NULL, NULL, NULL, NULL, NULL, 0),
(23, 'vminhui@yahoo.com', 'vanessa', 'fefd6a83b6b8b702546c0303b6c7b9bf', '12345 Lorong Aman', 'Balik Pulau', 'Penang', '11000 ', 'Malaysia', 0),
(24, 'vin@gmail.com', 'Vincent', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, NULL, 0),
(25, 'helloworld@gmail.com', 'Hello', 'd41d8cd98f00b204e9800998ecf8427e', 'testing', NULL, NULL, NULL, NULL, 0),
(26, 'lukazlim@yahoo.com', 'etcmadmin', '71aa9f165ada6866b77ded5fd419ef52', NULL, NULL, NULL, NULL, NULL, 0),
(27, 'ricardotest@gmail.com', 'ricardo test', 'd984bb9f04994ceeddd8c78e7193872a', NULL, NULL, NULL, NULL, NULL, 0),
(28, 'test333@gmail.com', 'test333', '7fa91828add52618f292edf2a3a9f39c', NULL, NULL, NULL, NULL, NULL, 0),
(29, 'lukazholiao@yahoo.com', 'lukazio123', '70e78ce85f9e6616ea537e0e1230502a', 'A-6-9, 420 Condominium, Jalan Lmao Ecksdee', 'Gelugor', 'Pulau Pinang', '11700', 'Malaysia', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user.user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders.order_id` (`order_id`),
  ADD KEY `book.isbn` (`book_isbn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
