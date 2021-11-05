-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 02:29 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie_details`
--

CREATE TABLE `movie_details` (
  `movie_name` varchar(20) NOT NULL,
  `movie_short_descriptions` varchar(5000) NOT NULL,
  `movie_id` int(10) NOT NULL,
  `movie_full_descriptions` varchar(10000) NOT NULL,
  `movie_image` varchar(100) NOT NULL,
  `movie_rating` float NOT NULL DEFAULT 0,
  `Categorys` varchar(50) NOT NULL,
  `movie_length` varchar(10) NOT NULL,
  `artists_name` varchar(255) NOT NULL,
  `directors_name` varchar(255) NOT NULL,
  `writers_name` varchar(255) NOT NULL,
  `dateofrelease` date NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `trailerlink` varchar(100) NOT NULL,
  `movie_language` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_details`
--

INSERT INTO `movie_details` (`movie_name`, `movie_short_descriptions`, `movie_id`, `movie_full_descriptions`, `movie_image`, `movie_rating`, `Categorys`, `movie_length`, `artists_name`, `directors_name`, `writers_name`, `dateofrelease`, `artist_name`, `trailerlink`, `movie_language`) VALUES
('Van Helsing (2016- )', 'Vanessa Helsing, the distant relative of famous vampire hunter Abraham Van Helsing, is resurrected only to find that vampires have taken over the world. She is humanity’s last hope to lead an offensive to take back what has been lost.', 14, 'Van Helsing is a fantasy horror drama television series. Kelly Overton plays the titular character of the series, which was inspired by Zenescope Entertainments graphic novel series Helsing. A commercial-free advance preview of the pilot aired on July 31, 2016, on Syfy ahead of its September 23, 2016 premiere. In December 2019, Syfy renewed the series for a fifth and final season which premiered on April 16, 2021.', 'uploads/thumb-1.jpg', 0, 'fiction', '01:00', '', 'Michael Nankin', 'Neil LaBute', '2016-07-31', 'Kelly Overton, Jonathan Scarfe, Aleks Paunovic', '', 'English'),
('Amar Bondhu Rashed', 'Amar Bondhu Rashed is a 2011 Bangladeshi film directed by Morshedul Islam, known for making indie movies. The story is based on the novel Amar Bondhu Rashed by Muhammad Zafar Iqbal. and set during the Bangladesh Liberation war and Bangladesh Genocide.', 15, 'This a story of a boy named Ibu during the Bangladesh Liberation War in 1971. He lives in a small town. The main character Rashed suddenly appears at his school. Rashed, the name was given by the class teacher on the first day at school. In 1971, when other students are not conscious about the liberation movement Rashed could understand the matters. Rashed started to motivate others to make them understand those matters. One day, the Pakistani army attacks the town and Rashed observes the battle. He and his friends start to help the Mukti Bahini.', 'uploads/slide-3.jpg', 0, 'Fiction', '95', '', 'Morshedul Islam', 'Muhammad Zafar Iqbal', '2011-04-01', 'Chowdhury Zawata Afnan, Rayaan Ittesham Chowdhury, Rizvi Hasan, Refayat Zinnat, Faiyaz Bin Zia', 'https://www.youtube.com/watch?v=_2TG8Z-vtq0', 'Bangla'),
('3 Idiots', '3 Idiots is a 2009 Indian Hindi-language coming-of-age comedy-drama film directed by Rajkumar Hirani, and also co-written by him with Abhijat Joshi.', 16, 'In 1999, students Farhan Qureshi and Raju Rastogi are accepted into the prestigious Imperial College of Engineering at Delhi, but they struggle to compete within its cutthroat academic culture. Farhan is passionate about wildlife photography but reluctantly chose to join engineering in order to appease his father, while Raju is desperately in need of a career that will extricate his family from poverty. Their roommate, the eccentric and charismatic Ranchoddas Rancho Shamaldas Chanchad, who is genuinely passionate about engineering, gives unorthodox answers in class and frequently clashes with the ICE director, Viru Sahastrabuddhe Virus, since he believes that students should enjoy what they learn, despite their strict teaching model.', 'uploads/thumb-3.png', 0, 'Comedy, Drama', '02:49', '', 'Rajkumar Hirani', 'Abhijat Joshi, Rajkumar Hirani', '2009-12-25', 'Aamir Khan, R. Madhavan, Sharman Joshi, Kareena Kapoor, Omi Vaidya', 'https://www.youtube.com/watch?v=xvszmNXdM4w', 'Hindi'),
('The Pursuit of Happy', 'The Pursuit of Happyness is a 2006 American biographical drama film directed by Gabriele Muccino and starring Will Smith as Chris Gardner, a homeless salesman. Smiths son Jaden Smith co-stars, making his film debut as Gardner son, Christopher Jr.', 17, 'In 1981, San Francisco salesman Chris Gardner invests his entire life savings in portable bone-density scanners, which he demonstrates to doctors and pitches as a handy quantum leap over standard X-rays. The scanners play a vital role in Chris life. While he is able to sell most of them, the time lag between the sales and his growing financial demands enrage his already bitter and alienated wife Linda, who works as a hotel maid. The financial instability increasingly erodes their marriage, in spite of them caring for Christopher Jr., their soon-to-be five-year-old son.', 'uploads/slide-4.jpeg', 0, 'biographical drama', '01:57', '', 'Gabriele Muccino', 'Gardner, Quincy Troupe', '2006-12-15', 'Will Smith, Jaden Smith, Thandie Newton, Brian Howe', 'https://www.youtube.com/watch?v=DMOBlEcRuw8', 'English'),
('Alita: Battle Angel', 'Alita: Battle Angel is a 2019 American cyberpunk action film based on Japanese manga artist Yukito Kishiro 1990s series Battle Angel Alita and its 1993 original video animation adaptation, Battle Angel.', 18, 'In 2563, 300 years after Earth was devastated by a catastrophic war known as The Fall, scientist Dr. Dyson Ido discovers a disembodied female cyborg with an intact human brain while scavenging for parts in the massive scrapyard of Iron City. Ido attaches a new cyborg body to the brain and names her Alita after his deceased daughter. Alita awakens with no memory of her past and quickly befriends Hugo, a young man who dreams of moving to the wealthy sky city of Zalem. She also meets Dr. Chiren, Ido estranged ex-wife. Hugo later introduces Alita to Motorball, a Rollerball-like racing sport played by cyborg gladiators. Secretly, Hugo robs cyborgs of their parts for Vector, owner of the Motorball tournament and the de facto ruler of the Factory, Iron Citys governing authority.', 'uploads/slide-2.jpg', 0, 'Action', '02:02', '', 'Robert Rodriguez', 'Cameron and Laeta Kalogridis.', '2019-02-14', 'Rosa Salazar, Christoph Waltz, Jennifer Connelly, Keean Johnson', 'https://www.youtube.com/watch?v=UbguTftAOhQ', 'English'),
('Harry Potter and the', 'Harry Potter and the Philosopher Stone is a 2001 fantasy film directed by Chris Columbus and distributed by Warner Bros. Pictures, based on J. K. Rowling 1997 novel of the same name.', 19, 'Late one night, Albus Dumbledore and Minerva McGonagall, professors at Hogwarts School of Witchcraft and Wizardry, along with the school groundskeeper Rubeus Hagrid, deliver a recently orphaned infant named Harry Potter to his only remaining relatives, the Dursleys.\r\n\r\nTen years later, Harry is living a difficult life with the Dursleys. After inadvertently causing an accident during a family trip to London Zoo, Harry begins receiving unsolicited letters from owls. After he and the Dursleys escape to an island to avoid more letters, Hagrid re-appears and informs Harry that he is a wizard and has been accepted into Hogwarts against the Dursleys wishes. After taking Harry to Diagon Alley to buy his supplies for Hogwarts and a pet owl named Hedwig as a birthday present, Hagrid informs him of his past: Harry parents James and Lily Potter died due to a Killing Curse at the hands of the malevolent and all-powerful wizard: Lord Voldemort. Harry, the only survivor in the chaos, thus becomes well-known in the wizarding world as The Boy Who Lived.', 'uploads/slide-1.jpg', 0, ' Fantasy', '02:32', '', 'Chris Columbus', 'J. K. Rowling', '2001-11-04', 'Daniel Radcliffe, Rupert Grint, Emma Watson', 'https://www.youtube.com/watch?v=VyHV0BRtdxo', 'English'),
('Diriliş: Ertuğrul', 'Ertugrul, the son of the leader of the nomadic Kazi tribe, rescues three people. But their arrival creates trouble and finding a new place for them leads to the foundation of the Ottoman Empire.', 20, 'This series is about the Turkish warrior Ertugrul from the 13th century, one of the most famous warriors of his time and also the father of Osman (the founder of the Ottoman Empire). He is an ambitious man who wants to bring peace and justice to his people.', 'uploads/dirilis.png', 0, ' Historical fiction and adventure television serie', '105–165 mi', '', 'Metin Günay', 'Mehmet Bozdağ', '2014-12-10', 'Engin Altan Düzyatan, Esra Bilgiç, Cengiz Coşkun', 'https://www.youtube.com/watch?v=FfdXu9jZFKs', 'Turkish');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `review_text` varchar(255) NOT NULL,
  `review_date` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `gender` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `user_id`, `user_password`, `user_type`, `gender`) VALUES
('admin', 1, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie_details`
--
ALTER TABLE `movie_details`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie_details`
--
ALTER TABLE `movie_details`
  MODIFY `movie_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
