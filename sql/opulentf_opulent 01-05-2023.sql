-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2023 at 05:51 AM
-- Server version: 5.7.42-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opulentf_opulent`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `a_id` int(15) NOT NULL,
  `album_type_id` varchar(20) NOT NULL,
  `a_title` varchar(100) NOT NULL DEFAULT '',
  `a_year` year(4) NOT NULL,
  `a_description` text,
  `position` char(1) NOT NULL DEFAULT 'I',
  `username` varchar(50) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `sortorder` int(3) NOT NULL DEFAULT '1',
  `remote_ip` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`a_id`, `album_type_id`, `a_title`, `a_year`, `a_description`, `position`, `username`, `createdate`, `modifieddate`, `status`, `sortorder`, `remote_ip`) VALUES
(11, '8', 'Certificate', '0000', 'fdgdfg', 'I', 'Keyur', '2019-07-09', '0000-00-00', 'E', 1, '116.74.112.172');

-- --------------------------------------------------------

--
-- Table structure for table `album_type`
--

CREATE TABLE `album_type` (
  `type_id` int(11) NOT NULL,
  `album_title` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `sortorder` varchar(20) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `remote_ip` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album_type`
--

INSERT INTO `album_type` (`type_id`, `album_title`, `username`, `createdate`, `modifieddate`, `sortorder`, `status`, `remote_ip`) VALUES
(8, 'Album Type 1', 'Keyur', '2015-10-27', '0000-00-00', '1', 'E', '192.168.2.106');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_master`
--

CREATE TABLE `appointment_master` (
  `cid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cemail` varchar(100) NOT NULL,
  `csubject` varchar(100) NOT NULL,
  `cmessage` text NOT NULL,
  `ccontact` varchar(30) DEFAULT '0',
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `new` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_master`
--

INSERT INTO `appointment_master` (`cid`, `cname`, `cemail`, `csubject`, `cmessage`, `ccontact`, `cdate`, `new`) VALUES
(20, 'bhavini', 'bhavini@gmail.com', 'bhavini', 'bhavini', '0', '2017-05-05 06:57:15', 1),
(21, 'bgfh', 'gdfg432@vjcxv', '', 'vxcvx', '52563', '2017-05-24 10:33:21', 1),
(22, 'Bhavini Appointment', 'cxffc@gmail.com', '', 'Bhavini Appointment', '123456', '2017-05-24 10:34:09', 1),
(23, 'tet43', 'fvdsf@gdfgfd', '', 'csafds', '432453534534', '2017-06-29 12:39:37', 1),
(24, 'tet43', 'fvdsf@gdfgfd', '', 'csafds', '432453534534', '2017-06-29 12:39:37', 1),
(25, 'tet43', 'fvdsf@gdfgfd', '', 'csafds', '432453534534', '2017-06-29 12:39:37', 1),
(26, 'tet43', 'fvdsf@gdfgfd', '', 'csafds', '432453534534', '2017-06-29 12:39:37', 1),
(27, 'tet43', 'fvdsf@gdfgfd', '', 'csafds', '432453534534', '2017-06-29 12:39:37', 1),
(28, 'tet43', 'fvdsf@gdfgfd', '', 'csafds', '432453534534', '2017-06-29 12:39:37', 1),
(29, 'tet43', 'fvdsf@gdfgfd', '', 'csafds', '432453534534', '2017-06-29 12:39:37', 1),
(30, 'tet43', 'fvdsf@gdfgfd', '', 'csafds', '432453534534', '2017-06-29 12:39:37', 1),
(32, 'bunty', 'bldihbdf@jbdf.com', '', 'i want to book an appointment for therapy', '999999999999', '2018-09-21 10:00:20', 1),
(33, 'Dishant Mukeshbhai Mehta', 'dishant.1712@Gmail.com', '', 'asdfasdf asddfasdf asdf asdf asddf asdfd asdf asddf', '07600015802', '2018-09-21 10:00:20', 1),
(34, 'Dishant Mukeshbhai Mehta', 'dishant.1712@Gmail.com', '', 'asdfasd asdf asdf', '07600015802', '2018-09-21 10:00:20', 1),
(35, 'asdf asdf', 'sadf@asdf.com', '', 'again asdf  asdfsdd', '09879879877', '2018-09-21 10:00:20', 1),
(36, 'bunty', 'bksjhdbf@liusd.com', '', 'pls book my appointment ', '98766787578', '2018-09-21 10:00:20', 1),
(37, 'Bunty', 'hsisidjd@jdkd.com', '', 'I want to be a cool', '9476383973', '2018-09-21 10:00:20', 1),
(38, 'bunty', 'kjbsd@ashyjg.com', '', 'i want to be a cool', '94857498759', '2018-09-21 10:00:20', 1),
(39, 'bunty', 'kjbfd@hsd.com', '', 'i want to be a cool', '98745894569', '2018-09-21 10:00:20', 1),
(40, 'hemish Patel', 'hemish@yugeva.com', '', 'plz confirm it', '9879270092', '2018-09-21 10:00:20', 1),
(41, 'dsgsggs', 'ujhgasvfda@kugsd.com', '', 'sadkubgakuxdygsk', '64565476666666665', '2018-09-21 10:00:20', 1),
(42, 'Dishant Mehta ', 'dishant.1712@Gmail.com', '', 'appointment testing', '7600015802', '2018-09-21 10:00:20', 1),
(43, 'isaug', 'sjzhdvcdsvf@aosn.com', '', 'liqvgfleguyegwfweuyfg', '93560835688', '2018-09-21 10:00:20', 1),
(44, 'VINOD CHHAJER', 'vin32957@yahoo.com', '', 'i want to feel diffrent. ....', '9825132957', '2018-09-21 10:00:20', 1),
(45, 'Barvaliya nirav', 'nirav640@gmail.com', '', 'I want try ', '09033470868', '2018-09-21 10:00:20', 1),
(46, 'Barvaliya nirav', 'nirav640@gmail.com', '', 'I want ', '09033470868', '2018-09-21 10:00:20', 1),
(47, 'Mannish agarwaal', 'rainbow.surat@gmail.com', '', 'Plz let me know the time what time is ypur slot empty ', '9624144444', '2018-11-24 07:15:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner_image`
--

CREATE TABLE `banner_image` (
  `bannerID` int(11) NOT NULL,
  `bannerTitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `mobile_image` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `remote_ip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `benefit`
--

CREATE TABLE `benefit` (
  `benefitID` int(11) NOT NULL,
  `is_benefit` int(2) NOT NULL DEFAULT '1',
  `benefit_title` varchar(255) NOT NULL,
  `home_image` text,
  `detail_image` text,
  `short_desc` text,
  `detail_desc` text,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `sortorder` int(5) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `remote_ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefit`
--

INSERT INTO `benefit` (`benefitID`, `is_benefit`, `benefit_title`, `home_image`, `detail_image`, `short_desc`, `detail_desc`, `createdate`, `modifieddate`, `username`, `sortorder`, `status`, `remote_ip`) VALUES
(18, 1, 'Cryo Beauty', '18-benifits_beauty.jpg', '18-cryo_beauty_iner_1.jpg', '<p class=\"text-justify\">Cryotherapy is a safe and natural alternative to achieving best results in beauty &amp; anti-aging without expensive surgical procedures.</p>', '<p>Cryotherapy is a safe and natural alternative to achieving best results in beauty &amp; anti-aging without expensive surgical procedures.</p>\r\n<p>By applying hyper-cool temperatures nearly about -150&deg;C to -180&deg;C to the skin&rsquo;s surface, Whole Body Cryotherapy &ldquo;jumpstarts&rdquo; the body&rsquo;s natural healing and rejuvenation processes. This includes increased circulation, which provides a youthful complexion, and stimulation collagen production, which is the foundation of firm, healthy skin.</p>\r\n<p>Cryotherapy also provokes vasoconstriction followed by vasodilation as the body reheats. This process increases blood circulation and detoxification, enriches the blood with high oxygen, nutrients &amp; enzymes and reduces inflammation.</p>\r\n<p>Cryotherapy increases blood flow to the skin to help remove toxins and rejuvenate the skin, including the reducing of visible cellulite.</p>\r\n<p class=\"main-benefit-list\">Reported benefits of Whole Body Cryotherapy for beauty &amp; Anti-Aging include:</p>\r\n<ul class=\"circle-bullet benifit-list\">\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Rejuvenated &amp; Fully Oxygenated Skin</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">More youthful complexion</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Reduce sign of Aging</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Reduce Wrinkles, Fine Lines, Blemishes, Super facial Scars, Acne</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Improve Skin Tone &amp; Skin Tightening</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">More Firm, Smooth &amp; Elastic skin</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Stimulation of collagen production</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Detoxification</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Stronger, fuller hair &amp; Nails</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Cellulite reduction</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Helps to reduce Psoriasis, Eczema &amp; Dermatitis</li>\r\n</ul>\r\n<ul class=\"circle-bullet benifit-list thumb-icon\">\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Combination of Whole Body Cryotherapy &amp; Facial Cryo multiples the result.</li>\r\n</ul>\r\n<p>**Result may vary based on the individual.</p>', '2017-05-17', '0000-00-00', 'Keyur', 4, 'E', '123.201.2.173'),
(19, 1, 'Cryo Health & Wellness', '19-benifits_health_wellness.jpg', '19-cryo_health_iner_1.png', '<p class=\"text-justify\">Nowadays many people are looking for ways to boost their health naturally and maintain their overall Wellness.</p>', '<p>Health is Wealth !!!</p>\r\n<p>Health and Wellness go hand in hand, but taking care of one&rsquo;s body encompasses more than the food we consume and the lifestyle we lead. Nowadays people are looking for ways to boost their health naturally and maintain their overall Wellness, are turning to cryotherapy in many countries of the world.</p>\r\n<p>The ultra-cool air used in whole body cryotherapy boost own healing abilities of the body, circulation of highly oxygenated blood with nutrients &amp; enzymes to each cells of the body. It is also causes the brain to release higher-than normal level of endorphins and other &ldquo;feel-good&rdquo; hormones. Because of the increased endorphins and adrenaline levels after a WBC session, puts you in a feel good mood, Passionate, and helps you to cope with future challenges you may face with a far more positive attitude. If you are battling with stress, consider cryotherapy to boost your endorphin level and bring stress relief.</p>\r\n<p>WBC effectively treat a number of conditions and improve overall health and wellness.</p>\r\n<p class=\"main-benefit-list\">Chief Benefits:</p>\r\n<ul class=\"circle-bullet benifit-list\">\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Reduce Stress, Depression, Anxiety</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Mood Enhancement</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Boost Sleep, Heal Insomnia</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Youthful ness</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Heal hormonal imbalance</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Increase Passion &amp; Energy in routine life</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Significantly improves psychological competitive edge</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Increase libido &amp; greater testosterone level in men</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Migraine</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Reducing pharmaceutical drug intake</li>\r\n</ul>\r\n<p>**Result may vary based on the individual.</p>', '2017-05-17', '0000-00-00', 'Keyur', 1, 'E', '127.0.0.1'),
(47, 1, 'Cryo Weight Loss', '47-benifits_weight_loss.jpg', '47-cryo_weightloss_iner_1.jpg', '<p>Whole Body Cryotherapy affects the body in a unique way that has several safe and positive effects. Weight loss is one of them.</p>', '<p>Whole Body Cryotherapy affects the body in a unique way that has several safe and positive effects. Weight loss is one of them.</p>\r\n<p>The skin senses the extreme cold temperature about -180&deg; C during a whole body cryotherapy session and send signals to the brain to go into &ldquo;fight or flight&rdquo; mode. In effort to maintain core temperature, blood rushes very rapidly to the core and burn up to 800 calories in each 3 minutes session. Calories continues to burn post-treatment as the body re-heats.</p>\r\n<p>By this extremely high circulation of the blood, body released Adrenaline &amp; Endorphins to increase metabolism and energy. Repeated Cryotherapy sessions helps metabolic rate and naturally increase the body&rsquo;s metabolism can last 3 to 5 days and may become permanent.</p>\r\n<p>Although regular exercise and healthy eating are major factors in maintaining a healthy weight. When you accelerate that weight loss with Diet &amp; Exercise, numbers of calories burn increase and you can significantly enhance the results you get. When you add it up, a few minutes in a cryopod has the same effect on your body as 45 minutes of rigorous swimming &amp; cardiovascular exercise, and it is all perfectly safe.</p>\r\n<p class=\" main-benefit-list\">Reported benefits of Whole Body Cryotherapy for beauty &amp; Anti-Aging include:</p>\r\n<ul class=\"circle-bullet benifit-list\">\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Burn up to 800 calories in single session (Number increase if coupled with Diet &amp; Exercise)</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Boost Metabolism</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Reset body&rsquo;s natural metabolic level</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Convert white fat into brown fat</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Shed Fat &amp; Fat Loss</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Restore proper fat distribution</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Flush Toxin</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Improve blood circulation and increase muscles tone which resulting in passive weight loss</li>\r\n</ul>\r\n<p>**Result may vary based on the individual.</p>', '2017-05-19', '0000-00-00', 'Keyur', 3, 'E', '127.0.0.1'),
(46, 1, 'Cryo  Fitness', '46-benifits_sportfitness.jpg', '46-cryo_sports_iner_1.jpg', '<p>Many professional athletes worldwide swear by Cryotherapy as the ultimate way to speed up muscle recovery allowing them a more</p>', '<p>It has been significantly proved, that body which is exposed to an extremely low temperatures, perform faster recovery after an exhausting workout. Cold helps to recuperate and relieve muscle pain. Whether you are an athlete, Fitness Lover, bodybuilder, weekend warrior or regular exerciser, Cryo sessions help speed up muscle repair allowing you to achieve your peak performance and goals.</p>\r\n<p>Many professional athletes worldwide swear by Cryotherapy as the ultimate way to speed up muscle recovery allowing them a more sustained performance at an elite level. They know that a faster recovery allows you to have the consistent and frequent training schedule that is key to skill development and utmost performance, and that Whole Body Cryotherapy can significantly accelerate recovery. Athletes with poor recovery and frequent injuries are unable to practice with the proper frequency and therefore are prevented from reaching their optimum performance level.</p>\r\n<p>Whole Body Cryotherapy exposes your body to extremely cold temperatures for a short period to increase the rate at which filtered, oxygen-rich blood flows through the muscles. It provides a safe and natural way of decreasing inflammation while accelerating the healing of damaged soft tissue and sore joints and reduces recovery time after vigorous workout by delivering oxygen and nutrients to the muscles.</p>\r\n<p class=\"main-benefit-list\">Reported benefits of Whole Body Cryotherapy for Sports &amp; Fitness Includes:</p>\r\n<ul class=\"circle-bullet benifit-list\">\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Improved High &amp; Effective Performance</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">High on-field Performance</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Increase Stamina, Energy &amp; Tolerance level</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Increase Range of Motion, Flexibility &amp; Strength of Muscles</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Increase Passion, Focus &amp; Concentration</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Faster Recovery</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Relief Pain</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Accelerate Tissue Healing</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Reduce inflammation &amp; Swelling, Soreness</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Fatigue Resistance</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Significantly improves psychological competitive edge</li>\r\n</ul>\r\n<ul class=\"circle-bullet benifit-list thumb-icon\">\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Whole Body Cryotherapy gives dramatically results Before &amp; After workout or Sports event.</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Contact Yugeva Cryo for Pre Workout, Post Workout &amp; Recovery Protocols.</li>\r\n</ul>\r\n<p>**Result may vary based on the individual.</p>', '2017-05-19', '0000-00-00', 'Keyur', 2, 'E', '127.0.0.1'),
(45, 1, 'Cryo  Pain', '45-benifits_pain.jpg', '45-cryo_pain_iner_1.png', '<p>Whole Body Cryotherapy was originally design as a treatment of Rheumatoid Arthritis and Inflammatory Joint Diseases.</p>', '<p>Whole Body Cryotherapy was originally design as a treatment of Rheumatoid Arthritis and Inflammatory Joint Diseases.</p>\r\n<p>Over 4 decades, doctors have been using Cryotherapy as a proven natural healing treatment to combat inflammation and pain in many medical conditions including inflammatory disorders, anxiety, joint pain, back pain and chronic conditions, such as psoriatic arthritis, fibromyalgia and ankylosing spondylitis.</p>\r\n<p>Exposure to an extreme cold temperature stimulates an anti-inflammatory response and results in constriction of the blood vessels. This response leads to regeneration and repair of the tissue and reduction of the pain. The ability of cryotherapy to reduce inflammation and help inspire the production of pain-reducing chemicals makes it an ideal treatment. Cryotherapy also helping with many conditions, such as:</p>\r\n<ul class=\"circle-bullet benifit-list\">\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Relief Pain, Inflammation &amp; Swelling</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Chronic Pain (Back pain, Neck Pain, Knee Pain, Joint Pain etc.)</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Rheumatoid Arthritis &amp; Fibromyalgia</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Accelerate healing of Joint, Muscles &amp; Tendons</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Boost Recovery</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Multiple Sclerosis</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Degenerative disease of the joint &amp; Spine</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Post-surgery recovery increase by 40 %</li>\r\n</ul>\r\n<ul class=\"circle-bullet benifit-list thumb-icon\">\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Combination of Whole Body Cryotherapy and Targeted Cryo help you to recovery more speedy.</li>\r\n</ul>\r\n<p>**Result may vary based on the individual.</p>', '2017-05-19', '0000-00-00', 'Keyur', 5, 'E', '127.0.0.1'),
(48, 1, 'Cryo Slimming', '48-Slimming Banner.jpg', '48-Slimming 750x450.jpg', '<p>If you&rsquo;re looking to lose fat on your <strong>stomach, legs, thighs, arms, hips or back,</strong> here is the non- surgical, safe and painless solution, introducing 1st time in India.</p>', '<p>If you&rsquo;re looking to lose fat on your <strong>stomach, legs, thighs, arms, hips or back,</strong> here is the non- surgical, safe and painless solution, introducing 1st time in India.</p>\r\n<p><strong>CryoSlimming</strong> uses the phenomenon of thermal shock using combination of Cryotherapy and Thermotherapy on the skin through FDA Approved advance technology from Italy.</p>\r\n<p>The combination of <strong>Thermotherapy (Heat)</strong> and <strong>Cryotherapy (Cold)</strong>makes fat cells unstable and accelerates their natural cell death without damaging to the overlying skin. Now these destroyed fat cells drain through your body&rsquo;s lymphatic system and gives miracle results over the fat.</p>\r\n<p>Results can be seen after the first treatment with an impressive 0.5-1.0 inches lost. Optimal results are seen after 5 sessions over 10 weeks. With proper Diet, work-out &amp; healthy lifestyle, you can stimulate lymphatic circulation, elimination of dead fat cells &amp; Detoxification, which boost your results &amp; keep your body attractive.</p>\r\n<p class=\"main-benefit-list\"><strong>Benefits:</strong></p>\r\n<ul class=\"circle-bullet benifit-list\">\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Localised fat removal</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Body Sliming</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Inch loss</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Body shaping</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Body sculpting</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Cellulite reduction</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Skin tightening</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Fat distribution</li>\r\n</ul>\r\n<p class=\"main-benefit-list\"><strong>Area that can benefits:</strong></p>\r\n<ul class=\"circle-bullet benifit-list thumb-icon\">\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\"><strong>Stomach (Belly):</strong> reduce fat</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\"><strong>Back:</strong> stubborn spots , Bra line and love handle</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\"><strong>Thigh:</strong> reduce fat and cellulites</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\"><strong>Hips:</strong> reduce fat and cellulites</li>\r\n</ul>', '2018-08-22', '0000-00-00', 'Bhavini', 6, 'E', '116.74.112.172'),
(49, 1, 'Cryo Lifting', '', '49-51497-beauty-woman.jpg', '<p>It&rsquo;s time to freeze your Ageing, Cellulites, skin toning and other skin problems. We are introducing non- surgical, safe and unique solution in India for the very 1st Time.</p>', '<p>It&rsquo;s time to freeze your Ageing, Cellulites, skin toning and other skin problems. We are introducing non- surgical, safe and unique solution in India for the very 1st Time.</p>\r\n<p><strong>CryoLifting</strong> uses the phenomenon of thermal shock using combination of Cryotherapy and Thermotherapy on the skin through FDA Approved advance technology from Italy.</p>\r\n<p>CryoLifting is a treatment that uses <strong>Thermotherapy (Heat) &amp; Cryotherapy (Cold)</strong> to rejuvenate &amp; smoothing of skin by accelerating bio-chemical reaction, increasing micro blood circulation, oxygen and nutrients supply to the skin which helps to diminish the appearance of cellulites, fine lines and wrinkles. Also collagen production increase which eliminate body cellulite, tones the area, improve skin elasticity, and reduce pore size &amp; sign of aging.</p>\r\n<p>Result can be maximized with Whole body Cryo therapy &amp; Local cryo therapy.</p>\r\n<p class=\"main-benefit-list\"><strong>Area that can benefits:</strong></p>\r\n<ul class=\"circle-bullet benifit-list\">\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\"><strong>Face:</strong> reducing wrinkles, sign of ageing, fine lines, toning, double chin</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\"><strong>Thighs:</strong> removing cellulite and lifting</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\"><strong>Arms:</strong> Toning, Lifting</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\"><strong>Stomach:</strong> skin Lifting</li>\r\n</ul>\r\n<p class=\"main-benefit-list\"><strong>Benefits:</strong></p>\r\n<ul class=\"circle-bullet benifit-list thumb-icon\">\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Skin tightening and lifting</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Anti-ageing</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Skin toning</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Cellulite reduction</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Reduce wrinkles and fine lines</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Reduce Dark circles and Puffiness around the eyes</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Reduce Acne and scar</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Reduce Double chin</li>\r\n<li class=\"col-md-12 col-sm-12 col-xs-12\">Buffalo hump (Neckline fat)</li>\r\n</ul>', '2018-08-22', '0000-00-00', 'Bhavini', 7, 'E', '116.74.112.172');

-- --------------------------------------------------------

--
-- Table structure for table `contact_master`
--

CREATE TABLE `contact_master` (
  `cid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cemail` varchar(100) NOT NULL,
  `cmessage` text NOT NULL,
  `ccontact` varchar(30) DEFAULT '0',
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `new` int(1) NOT NULL DEFAULT '0',
  `ccompany` varchar(255) NOT NULL,
  `select_option` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_master`
--

INSERT INTO `contact_master` (`cid`, `cname`, `cemail`, `cmessage`, `ccontact`, `cdate`, `new`, `ccompany`, `select_option`) VALUES
(61, '', '', '', '', '2019-06-13 04:24:13', 1, '', ''),
(62, '', '', '', '', '2019-06-13 04:24:13', 1, '', ''),
(63, '', '', '', '', '2019-06-13 04:24:13', 1, '', ''),
(60, 'WWWWWWWWWW', 'ww@gmail.com', 'hdsgfklsajhdflkjhaslkjdHASLKJHAkjhdASD', '654654', '2019-06-11 12:55:53', 1, '', ''),
(64, 'easternts', 'rajath.easternts@gmail.com', 'hdfghfghfdghfdgh', '5454654564', '2019-06-13 05:01:24', 1, '', ''),
(65, 'asdf', 'asdf@asdf.com', 'asdf', 'asdf', '2019-06-13 11:25:53', 1, '', ''),
(66, 'dsfsadfsdf', 'rajath.easternts@gmail.com', 'sdasdasdfasdfasfasfd', '54565', '2019-06-13 11:25:53', 1, '', ''),
(67, 'easternts', 'rajath.easternts@gmail.com', 'sdfsadfsdfsd', '5454654564', '2019-06-13 11:25:53', 1, '', ''),
(68, '', '', '', '', '2019-07-09 09:56:33', 1, '', ''),
(69, 'Bhautik mehta', 'bhautik.easternts@gmail.com', 'sadfasdfsdfsdfsadfsdfdf', '0', '2019-07-27 13:16:23', 1, ';sdklfj;lkdsaj', ''),
(70, 'Bhautik mehta', 'bhautik.easternts@gmail.com', 'kdsjf;alksjdf;lkasjfd;lsakdjf;lksadjflsakdfj;lskadfj;lsakdfjs', '0', '2019-07-27 13:17:49', 0, 'jsaf;ldkjf;lkasjd', ''),
(71, 'Bhautik mehta', 'bhautik.easternts@gmail.com', 'l;kjdf;klajsdlkaSJD', '0', '2019-07-27 13:21:20', 0, 'jashd;kjsdflkasjd;flk', ''),
(72, 'Bhautik mehta', 'rajath.easternts@gmail.com', ';jldkjfa;lskdjflkasdjf;lks', '0', '2019-07-27 13:25:42', 0, 'kjdsa;flkjasdlkfj', ''),
(73, '', '', '', '0', '2019-07-29 06:05:42', 0, '', ''),
(74, '', '', '', '0', '2019-07-29 06:06:11', 0, '', ''),
(75, '', '', '', '0', '2019-07-29 06:16:24', 0, '', ''),
(76, 'dfgdgfs', 'rajath.easternts@gmail.com', 'vbnv', '0', '2019-07-29 07:05:09', 0, 'vb', ''),
(77, '', '', '', '0', '2019-07-29 07:05:44', 0, '', ''),
(78, 'Bhautik mehta', 'bhautik.easternts@gmail.com', 'kjadlksfjsa', '0', '2019-07-29 10:26:49', 0, 'kjfd;sk', ''),
(79, 'Bhautik mehta', 'bhautik.easternts@gmail.com', 'asdasdASDASD', '0', '2019-07-29 10:30:53', 0, ';sdklfj;lkdsaj', ''),
(80, 'Bhautik mehta', 'bhautik.easternts@gmail.com', 'DFGDFGDFG', '0', '2019-07-29 10:32:58', 0, ';sdklfj;lkdsaj', ''),
(81, 'Bhautik mehta', 'bhautik.easternts@gmail.com', 'dfgdfgdfg', '0', '2019-08-26 11:13:43', 0, 'ppp666666999', ''),
(82, 'hkhk', 'jigna.easternts@gmail.com', 'dfgdsgsdfgdfg', '0', '2019-08-26 12:06:19', 0, 'kdjf;aslk', ''),
(83, 'Rakesh mehta', 'jigna.easternts@gmail.com', 'sfdasdfsadf', '0', '2019-08-26 12:08:06', 0, 'sdfasdf', ''),
(84, 'Bhautik mehta', 'jigna.easternts@gmail.com', 'fasdfasdfasf', '0', '2019-08-26 12:15:33', 0, 'fdssad', ''),
(85, 'Rakesh mehta', 'jigna.easternts@gmail.com', 'adASD', '0', '2019-08-26 12:17:23', 0, 'dASD', ''),
(86, 'Bhautik mehta', 'jigna.easternts@gmail.com', 'SFGSDFG', '0', '2019-08-26 12:19:00', 0, 'SGDFGD', ''),
(87, 'Bhautik mehta', 'jigna.easternts@gmail.com', 'GSDGSD', '0', '2019-08-26 12:21:16', 0, 'DFGS', ''),
(88, 'Bhautik mehta', 'jigna.easternts@gmail.com', 'asdfasdf', '0', '2019-08-26 12:23:42', 0, 'sdad', ''),
(89, 'Bhautik mehta', 'jigna.easternts@gmail.com', 'sadfasdfs', '0', '2019-08-26 12:25:54', 0, 'asdfsadf', ''),
(90, 'Bhautik mehta', 'jigna.easternts@gmail.com', 'sdfgsdf', '0', '2019-08-26 12:26:51', 0, 'dgfgsf', ''),
(91, 'Bhautik mehta', 'jigna.easternts@gmail.com', 'fdhfd', '0', '2019-08-27 04:27:59', 0, 'fghdh', ''),
(92, 'Bhautik mehta', 'jigna.easternts@gmail.com', 'gfhjfgjh', '0', '2019-08-27 04:28:39', 0, 'ghjgfj', ''),
(93, 'Bhautik mehta', 'jigna.easternts@gmail.com', 'fdghfdghdfghf', '0', '2019-08-27 04:38:51', 0, 'fghfdgh', ''),
(94, 'Bhautik mehta', 'jigna.easternts@gmail.com', 'sfsadfsadfsafasf', '0', '2019-08-27 05:48:47', 0, 'sdfsdf', ''),
(95, 'ZILAR ALLEMDAR', 'jigna.easternts@gmail.com', 'ADadsA', '0', '2019-08-27 06:28:09', 0, 'dsaADSad', ''),
(96, 'OLOLOL', 'jigna.easternts@gmail.com', ';ALSKJFDA;SLKFDJA;LSDKF', '0', '2019-08-27 06:34:08', 0, ';LDSKJFA;SLDKJF', ''),
(97, 'PPPPPPPPPPPPP', 'jigna.easternts@gmail.com', ';LSDKFASJ;FD', '0', '2019-08-27 06:34:45', 0, ';SAFDLFDLKJ', ''),
(98, 'JIGNA DESAI VAYDI', 'jigna.easternts@gmail.com', 'SAFASFSDF', '0', '2019-08-27 06:35:56', 0, 'LKJLKASHFDJLASKJFD', ''),
(99, 'KK', 'jigna.easternts@gmail.com', 'SDFSADF', '0', '2019-08-27 06:37:14', 0, 'SDFASDF', ''),
(100, 'ets testing 123', 'jigna.easternts@gmail.com', 'kljfd;salkjas;dlkfj', '0', '2019-08-27 06:49:10', 0, 'ldsjhfsa', ''),
(101, 'donal trap', 'bmehta217@gmail.com', ';dfkjdakslfja;lkdjfas;lkfja;slkfjsaf', '0', '2019-08-27 08:12:46', 0, 'dlsadkj', ''),
(102, 'oo', 'bmehta217@gmail.com', 'safdsa', '0', '2019-08-27 08:14:21', 0, 'dsfasf', ''),
(103, 'lokesh rahul', 'rmehta217@gmail.com', 'dsfgdsfgdsfgdsfg', '0', '2019-08-27 08:31:07', 0, 'fgfdsg', ''),
(104, 'hardik', 'hardik.easternts@gmail.com', 'ljkahdflkajshdfkljashf', '0', '2019-08-27 08:37:41', 0, 'shflaskjhfdl', ''),
(105, 'Kavisa', 'kavisa.mehta@gmail.com', 'Hi', '0', '2019-08-31 08:45:23', 0, '', ''),
(106, 'Bhautik mehta', 'jigna.easternts@gmail.com', 'sadfkasdhjflkajsfdhalksdf', '0', '2019-08-31 11:39:14', 0, 'sdak;jflksdjf', ''),
(107, 'ets testing', 'hardik.easternts@gmail.com', 'khjdsagfkasjdhgfsdfasdf', '0', '2019-08-31 11:42:12', 0, 'dsakjhgf', ''),
(108, 'ets', 'hardik.easternts@gmail.com', 'ASDasdADSada', '0', '2019-08-31 11:42:37', 0, 'daSDad', ''),
(109, 'Hardik', 'komalgems12@gmail.com', 'Hell sir/mam\r\nWe are manufacturer of briolettes beads and all fancy shapes of diamonds ! Contact me for any size and colour of briolettes . ', '0', '2020-02-23 05:14:20', 0, 'Komal gems', ''),
(110, 'Herbert S', 'adi@ndmails.com', 'Just wanted to ask if you would be interested in getting external help with graphic design? We do all design work like banners, advertisements, photo edits, logos, flyers, etc. for a fixed monthly fee. \r\n\r\nWe don\'t charge for each task. What kind of work do you need on a regular basis? Let me know and I\'ll share my portfolio with you.\r\n', '0', '2020-03-04 11:02:05', 0, 'Herbert S', ''),
(111, 'Jayesh', 'luxury@shishjewels.com', 'Hii \r\nWe are manufacturers exclusive diamond jewellery  Rosecut and Briolette diamond \r\nIf you are interested pls reply us \r\nThank\r\nJayesh\r\nShish jewels\r\n+91 7698989656', '0', '2021-01-04 05:20:23', 0, 'Shish jewela', ''),
(112, 'Joe Miller', 'info@domainworld.com', 'Notice#: 491343\r\nDate: 2021-01-07  \r\n\r\nYOUR IMMEDIATE ATTENTION TO THIS MESSAGE IS ABSOLUTELY NECESSARY!\r\n\r\nYOUR DOMAIN opulentfinejewels.com WILL BE TERMINATED WITHIN 24 HOURS\r\n\r\nWe have not received your payment for the renewal of your domain opulentfinejewels.com\r\n\r\nWe have made several attempts to reach you by phone, to inform you regarding the TERMINATION of your domain opulentfinejewels.com\r\n\r\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domainsafeyet.com/?n=opulentfinejewels.com&r=a&t=1609995917&p=v1\r\n\r\nIF WE DO NOT RECEIVE YOUR PAYMENT WITHIN 24 HOURS, YOUR DOMAIN opulentfinejewels.com WILL BE TERMINATED\r\n\r\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://domainsafeyet.com/?n=opulentfinejewels.com&r=a&t=1609995917&p=v1\r\n\r\nACT IMMEDIATELY. \r\n\r\nThe submission notification opulentfinejewels.com will EXPIRE WITHIN 24 HOURS after reception of this email', '0', '2021-01-07 05:05:19', 0, 'VZFLPWEL', ''),
(113, 'Punam Tripathi', 'kitnakhayegayaar@gmail.com', 'Dear Sir / Madam \r\n\r\nI want to collaborate with you on Instagram, if you are interested then i will put 3-4 pic post and 2 pic on my insta story. And if you any video regarding your product i can also upload it on my insta profile.\r\n\r\nAs I am also growing myself so I am not gonna charge anything from you, you have to just send the products (as a gift hamper) so i can upload live product pic on my Insta profile.\r\n\r\n My Insta profile - https://www.instagram.com/kitna_khayega_yaar/\r\n\r\nYou can check my profile that I am already promoting another brand also.\r\n\r\nIf you are ok with my terms then we can proceed for further.\r\n\r\n--\r\n\r\n\r\nThanks & Regards\r\n\r\n\r\n\r\nkitna_khayega_yaar\r\n\r\nInstagram - https://www.instagram.com/kitna_khayega_yaar/\r\n\r\nYouTube- https://www.youtube.com/channel/UC_zuBsT3V032CvYpx9vNBtw/videos\r\n\r\nFacebook - https://www.facebook.com/KitnaKhayegaYaarOnFB/', '0', '2021-07-01 07:21:26', 0, 'kitna_khayega_yaar', ''),
(114, 'Lakshay Johari', 'lakshayjohari@gmail.com', 'I would like to do business with your company', '0', '2021-07-01 19:25:21', 0, 'J R Jewellers ', ''),
(115, 'Akash Patel', 'Akashpatel1008@gmail.com', 'I want your appominet we are rosecut mfg -12 to 1.50ct round rosecut shep', '0', '2021-07-07 15:35:49', 0, 'Neer Impex', ''),
(116, 'Nitin vishnawat ', 'nitinvishnawat@yahoo.com', 'We r manufacturer of open setting polki jewellery in silver 925\r\nHigh finishing ', '0', '2021-07-10 16:23:53', 0, 'SJR JEWELS ', ''),
(117, 'Ritika garg', 'ritikagupta0809@gmail.com', 'What is the base metal of your jewellery??\r\nHow to purchase??', '0', '2021-08-07 18:13:46', 0, 'Housewife', ''),
(118, 'paresh ', 'smexports2005@yahoo.com', 'Diamond jewellery manufacturer in India this is my mobile number working in WhatsApp plus 91 9840 678 577 any requirement Diamond Jewellery ask to me this number it is in WhatsApp thank you', '0', '2021-08-08 16:42:41', 0, 'SMEXPORTS ', ''),
(119, 'Talib khan', 'enterprisestalib@gmail.com', 'Sir do you need a jewellery packaging box ?', '0', '2021-08-15 08:33:35', 0, 'Talib Enterprises', '');

-- --------------------------------------------------------

--
-- Table structure for table `content_master`
--

CREATE TABLE `content_master` (
  `content_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `remote_ip` varchar(150) NOT NULL,
  `description` text,
  `image_id` int(11) NOT NULL,
  `image` text,
  `type` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'E'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_master`
--

INSERT INTO `content_master` (`content_id`, `username`, `createdate`, `modifieddate`, `remote_ip`, `description`, `image_id`, `image`, `type`, `status`) VALUES
(2, '', '2016-09-05', '2017-04-18', '::1', 'a:5:{s:4:\"type\";s:1:\"I\";s:3:\"url\";s:41:\"https://www.youtube.com/embed/OwF6jgpbGKM\";s:7:\"caption\";s:32:\"Group Website Under Construction\";s:11:\"description\";s:18:\"Under Construction\";s:12:\"redirect_url\";s:1:\"#\";}', 212, '1/212-Group-Website-.jpg', 'popup', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `download_brochure`
--

CREATE TABLE `download_brochure` (
  `b_id` int(11) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `bemail` varchar(100) NOT NULL,
  `bphone` varchar(20) NOT NULL,
  `bdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `epanel_aes`
--

CREATE TABLE `epanel_aes` (
  `content_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `modifieddate` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `epanel_master`
--

CREATE TABLE `epanel_master` (
  `id` int(11) NOT NULL,
  `home_content` text NOT NULL,
  `copyright` varchar(100) NOT NULL,
  `powered_by` varchar(255) NOT NULL,
  `ga_view_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `remote_ip` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `epanel_master`
--

INSERT INTO `epanel_master` (`id`, `home_content`, `copyright`, `powered_by`, `ga_view_id`, `username`, `create_date`, `modified_date`, `remote_ip`) VALUES
(1, '<p>Eastern Techno Solution (ETS) is headquartered in Surat, Gujarat. An IT Company established by ex- employees of COGNIZANT and INFOSYS.<br /><br />It principally focused on&nbsp;Customized Software Development, Web Applications&nbsp;(which includes Web Designing and Ecommerce Websites),&nbsp;Mobile Applications and Training Institute.&nbsp;Within 3 years from its inception, ETS has been able to make a mark in Gujarat.<br /><br />We are a company with leading specialized professionals whose striking experiences reveal a comprehensible indulgent that industries today are faced with the confrontation of harnessing the eternally changing landscape of a complicated and spirited business world.<br /><br />It\'s essential for businesses today to stay on the callous edge of technology to build and implement the tools necessary to compete and succeed taking care of innovation. ETS has showed that with apparent understanding of your business attached to our analytical proficiency; a policy can be forged heartening your company to a whole new plateau of triumph.<br /><br />Our all-embracing case of services includes Customized software&rsquo;s, Web&nbsp;application development and Mobile application development (Android development and iPhone development). ETS sets it a challenge to make finest use of the resources, and the precious business intelligence entrenched in a range of verticals - Insurance, Finance, Hotels &amp; Travel, Healthcare, Retail, Distribution, Government, and Manufacturing etc.<br /><br /><strong>We as Training Institute</strong><br />ETS also offers a wide range of training programs for school as well as college students and IT professionals. It provides high class principles and top priority to deliver best learning know-how by following best business practices projected to help the students to expand valuable newest knowledge and experience in grounding for an innovative, pleasing career in an ever-changing marketplace.</p>\r\n<p><br /><strong>We as Consultancy Firm</strong><br />ETS is also a consultancy firm that helps college students and IT professionals to be placed in the best IT companies. We have tie- ups with many companies. So the students/ IT Professionals, after attending the corporate training program, maximize their chances of getting placed in the best IT companies. Thus, we are helping the industry by providing IT technocrats.</p>', 'Eastern Techno Solutions', 'a:2:{s:5:\"title\";s:24:\"Eastern Techno Solutions\";s:4:\"link\";s:25:\"http://www.easternts.com/\";}', 32579886, 'Keyur', '2015-10-26', '2019-09-01', '116.72.16.131');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_Id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `review` text NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `modifieddate` date DEFAULT NULL,
  `sortorder` int(8) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `remote_ip` varchar(100) DEFAULT NULL,
  `faq_type` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_Id`, `name`, `image`, `review`, `username`, `createdate`, `modifieddate`, `sortorder`, `status`, `remote_ip`, `faq_type`) VALUES
(18, 'Protocols of the Therapy', NULL, '<p class=\"text-justify\">Customers Health, Safety, Privacy &amp; comfort are our priority. We have design all system and work protocols according to it. Our train staff will guide and inform you everything related therapy &amp; all safety instructions. All necessary steps will taken after your permissions only.</p>\r\n<p class=\"text-justify\">At the time of therapy, they will be with you for any assistant. We also have strict protocols for your changing room, bathrobe &amp; chamber door opening while you will be in minimum clothing in the chamber. Don&rsquo;t worry you will be comfortable.</p>', 'Keyur', '2017-05-15', NULL, 8, 'E', '127.0.0.1', '4'),
(19, 'What should I do in Emergency ?', NULL, '<p class=\"text-justify\">The door of the chamber will never locked, you can step out anytime if needed. Our cryotherapist will always by your side for your assistance.</p>', 'Keyur', '2017-05-15', NULL, 9, 'E', '127.0.0.1', '4'),
(20, 'Who should not do cryotherapy ? ', NULL, '<p class=\"text-justify\">In such type of medical condition, we do not recommend client to take cryotherapy. Please contact YUGEVA CRYO to check contradiction about cryotherapy.</p>', 'Keyur', '2017-05-15', '2017-07-08', 10, 'E', '127.0.0.1', '4'),
(15, 'Is nitrogen is safe for human beings ?', NULL, '<p class=\"text-justify\">Yes, Nitrogen is a non-toxic gas. The air that we breathe is made up of 16% Oxygen, 1% Hydrogen, 78% Nitrogen and 5% of other components.</p>', 'Keyur', '2017-05-15', NULL, 5, 'E', '127.0.0.1', '4'),
(16, 'Are there any age restrictions ?', NULL, '<p class=\"text-justify\">The minimum age for cryotherapy is 14 years old. Individuals under the age of 18 must be accompanied by a parent or guardian in order to receive cryotherapy with parental consent. There is no upper age limit.</p>', 'Keyur', '2017-05-15', NULL, 6, 'E', '127.0.0.1', '4'),
(17, 'What should I wear?', NULL, '<ul class=\"circle-bullet\">\r\n<li>Men remove all clothing except underwear.</li>\r\n<li>Women may wear a non-underwire bra, underwear or may remove all clothing.</li>\r\n<li>Less Clothing will maximize exposure.</li>\r\n<li>Clients must remove all jewelry or other metal on their body.</li>\r\n<li>Clients must be 100 percent dry: towels + hairdryers are provided.</li>\r\n<li>Put on a Robe &amp; Fur Shoe.</li>\r\n</ul>', 'Keyur', '2017-05-15', '2017-05-16', 7, 'E', '127.0.0.1', '4'),
(12, 'How Does Cryotherapy Works?', NULL, '<p class=\"text-justify\">The Cryosauna uses gas form nitrogen to lower the client&rsquo;s skin surface temperature by 30-50 degrees Fahrenheit over a period of two-three minutes. The Cryochamber is cooled using liquid nitrogen but clients are not in direct contact with the gas. The exposed skin reacts to the extreme temperatures by sending messages to the brain that stimulant natural regulatory functions of the body. In addition, the skins exposure to these subzero temperatures trigger the release of anti-inflammatory molecules, endorphins, toxins, and increases oxygen circulation within the bloodstream. Please click here to understand entire process.</p>', 'Keyur', '2017-05-15', '2017-05-15', 2, 'D', '127.0.0.1', '4'),
(13, 'Is Whole Body Cryotherapy a proven treatment for recovery and health?', NULL, '<p class=\"text-justify\">Yes. Whole Body Cryotherapy has been used in its modern form in Europe and Asia for over 30 years by health practitioners (including MDs). Countless studies have been done on the various health benefits of Whole Body Cryotherapy.</p>', 'Keyur', '2017-05-15', '2017-05-15', 3, 'E', '127.0.0.1', '4'),
(14, 'Is it Comfortable ?', NULL, '<p class=\"text-justify\">Yes, it is comfortable &amp; Tolerable a. Before entering cryo chamber, we provide all necessary stuffs for cryo therapy. The treatment is of short duration (1.5 - 3 minutes), and the cold is &lsquo;dry&rsquo;, so it is very tolerable. Towards the end of the treatment, you may get a &lsquo;pins and needles&rsquo; sensation, which disappears immediately after the treatment.</p>', 'Keyur', '2017-05-15', NULL, 4, 'E', '127.0.0.1', '4'),
(11, 'Is Whole Body Cryotherapy is safe?', NULL, '<p class=\"text-justify\">Yes, as Yugeva Cryo\'s highest priority is guest\'s health. WBC uses cold air, the cooling agents never actually come into contact with your skin. The air is chilled using liquid nitrogen, and nitrogen makes up 78% of the air we breathe. Because the temperature change to your body is only superficial, your internal body temperature remains constant throughout treatment. Your head is always kept outside of the low temperature area.</p>\r\n<p class=\"text-justify\">Before a session, we takes every guests&rsquo; blood pressure and asks several medical history questions. We also inform the guest about all information about safety like contradictions, Do\'s &amp; Dont\'s, Emergency etc.. Additionally, we provides all required stuffs to be used in cryotherapy.</p>\r\n<p class=\"text-justify\">The Cryosauna is equipped with a number of safety features. While the door closes, it never locks, so you are in full control of your environment. A trained cryotherapist is always present to ensure your maximum safety. In addition, the room is equipped with oxygen sensors and proper ventilation systems to ensure optimal air quality. Our staff is fully trained to make sure you experience both ultimate healing and ultimate safety.</p>', 'Keyur', '2017-05-15', NULL, 1, 'E', '127.0.0.1', '4'),
(21, 'I am claustrophobic. Can I use whole body cryotherapy ?', NULL, '<p class=\"text-justify\">Yes, you may. The chamber is open at the top and your head is raised above the level of the chamber allowing you to see in all direction &amp; breathe natural air in the room. Furthermore, the door will never locked. If needed, you can step out anytime. Our cryotherapist is always by your side for your comfort.</p>\r\n<p class=\"text-justify\">Clients who suffer from claustrophobia report that they are comfortable in the device.</p>', 'Keyur', '2017-05-15', NULL, 11, 'E', '127.0.0.1', '4'),
(22, 'How much time I need to spend for cryotherapy?', NULL, '<p class=\"text-justify\">Not&nbsp; Required</p>', 'Keyur', '2017-05-15', '2017-05-25', 12, 'D', '127.0.0.1', '4'),
(23, 'How often & How many treatments should I do?', NULL, '<p class=\"text-justify\">The optimal number of cryotherapy sessions is dependent on client&rsquo;s health, medical condition, concern &amp; objective. Our trained staff will guide for the same as per your condition &amp; requirement after the individual discussion.</p>', 'Keyur', '2017-05-15', '2017-07-08', 13, 'E', '127.0.0.1', '4'),
(24, 'How do I feel after the treatment?', NULL, '<p class=\"text-justify\">Most clients will feel great &amp; energetic right after their first treatment due to the release of endorphins. Depending on your physical condition, you may feel immediate relief from joint and muscle pain, improved energy, and increased flexibility for several hours or even days. Many clients have expressed that they have the best night of sleep after a cryotherapy session.</p>', 'Keyur', '2017-05-15', NULL, 14, 'E', '127.0.0.1', '4'),
(25, 'How soon I can expect the result?', NULL, '<p class=\"text-justify\">Depending on your physical condition, you may feel immediate relief from joint and muscle pain, improved energy, and increased flexibility that will last for several hours or even days. Changes in skin texture and reduction in cellulite and weight loss will take longer to see results and may require a series of treatments for maximum results.</p>', 'Keyur', '2017-05-15', '2017-05-25', 15, 'D', '127.0.0.1', '4'),
(26, 'Is it necessary to do exercise before or after treatment?', NULL, '<p class=\"text-justify\">Not Required</p>', 'Keyur', '2017-05-15', '2017-05-25', 16, 'D', '127.0.0.1', '4'),
(27, 'Do I take shower before or after the treatment?', NULL, '<p class=\"text-justify\">No, you don&rsquo;t. The treatment is completely dry and will not make your skin wet.</p>', 'Keyur', '2017-05-15', NULL, 17, 'D', '127.0.0.1', '4'),
(28, 'What happens if I am wet or have used moisturizer before my session?', NULL, '<p class=\"text-justify\">Any moisture on the skin can cause skin burns. (A towel will be provided to dry yourself before your session.)</p>', 'Keyur', '2017-05-15', NULL, 18, 'D', '127.0.0.1', '4'),
(29, 'Can I work out immediately before or after cryotherapy? ', NULL, '<p class=\"text-justify\">Yes. In fact, it is recommended.</p>\r\n<p class=\"text-justify\">If you workout before your exposure, you can expect greater recovery due to the inflammation reduction. If you work-out after your exposure, you can expect a higher pain tolerance, more energy and greater flexibility. 3 minutes of WBC session is highly recommended before race or an event for batter performance.</p>', 'Keyur', '2017-05-15', NULL, 19, 'E', '127.0.0.1', '4'),
(30, 'Is there anything I should avoid following a cryotherapy treatment?', NULL, '<p class=\"text-justify\">Yes. Do not enter a hot sauna or Jacuzzi for at least six hours. You should also minimize alcohol consumption for several hours following treatment.</p>', 'Keyur', '2017-05-15', NULL, 20, 'E', '127.0.0.1', '4'),
(31, 'I am pregnant; can I use whole body cryotherapy?', NULL, '<p class=\"text-justify\">Congratulations! However, you should not use whole body cryotherapy while pregnant. See you after the baby is born.</p>', 'Keyur', '2017-05-15', NULL, 21, 'E', '127.0.0.1', '4'),
(32, 'How Do I Warmup after the treatment ?', NULL, '<p class=\"text-justify\">Light cardio exercise recommended after the cryotherapy session to reheat your body. Exercise equipment are available in YUGEVA CRYO for your light cardio work out.</p>', 'Keyur', '2017-05-15', '2017-07-08', 22, 'E', '127.0.0.1', '4'),
(33, 'What is the Risk ?', NULL, '<p class=\"text-justify\">Whole body Cryotherapy is very well tolerated and has minimal risks: Fluctuations in blood pressure during the procedure by up to 10 points systolically (this effect reverses after the end of the procedure, as peripheral circulation returns to normal), allergic reaction to extreme cold (rare), claustrophobia, redness, and skin burns (only if exposed to low temperatures longer than recommended).</p>', 'Keyur', '2017-05-15', NULL, 23, 'E', '127.0.0.1', '4'),
(34, 'How long NormaTec been around?', NULL, '<p class=\"text-justify\">NormaTec was founded in 1998 by Laura F. Jacobs, MD, PhD, in response to a desperate need for new technology to rapidly and non-invasively treat circulation-related disorders. In 2002, the company introduced the NormaTec PCD (Pneumatic Compression Device), an FDA-cleared medical device that yields highly effective clinical results for patients with peripheral vascular diseases. After hearing reports from athletes that they were using their NormaTec Systems for workout and performance recovery (not just acute injuries), NormaTec started its Athlete Technologies division in 2007. Today, many of the world\'s best athletes regularly use their NormaTec Recovery Systems for maximum performance recovery.</p>', 'Bhavini', '2018-08-22', '2018-08-22', 24, 'D', '116.74.103.171', '5'),
(35, 'How does the NormaTec recovery system works?', NULL, '<p class=\"text-justify\">The most important element for effective compression is the massage pattern. NormaTec\'s founder, Laura F. Jacobs, MD, PhD, a physician bioengineer, realized this fundamental principle when she developed and patented the Sequential Pulse Pneumatic Waveform. Unlike more simplistic compression patterns, NormaTec Pulse Technology is based on normal physiology, and it synergistically combines three distinctive massage techniques to speed the body&rsquo;s normal recovery process: pulsing compression, gradients, and distal release. Through these mechanisms, the NormaTec Recovery System maximizes circulation throughout the body to help you train harder, recover faster, and perform better.</p>', 'Bhavini', '2018-08-22', '2018-08-22', 25, 'D', '116.74.103.171', '5'),
(36, 'WHAT CONDITIONS WOULD PREVENT ME FROM USING A NORMATEC?', NULL, '<p class=\"text-justify\">The NormaTec Recovery Systems are FDA cleared devices that are safe for home use. Please consult the product page for the PULSE and the PULSE PRO for each system\'s specific safety information.</p>', 'Bhavini', '2018-08-22', '2018-08-22', 26, 'D', '116.74.103.171', '5'),
(37, 'Why isn\'t there ice in the NormaTec Recovery System? ', NULL, '<p class=\"text-justify\">Ice is a vasoconstrictor; it constricts your vessels and decreases blood flow. While this is beneficial in the acute phase of an injury to reduce immediate inflammation, in the long run it actually impairs healing and recovery. On the other hand, the NormaTec Recovery System uses NormaTec Pulse Technology to increase circulation and blood flow.</p>', 'Bhavini', '2018-08-22', '2018-08-22', 27, 'D', '116.74.103.171', '5'),
(38, 'What makes NormaTec Recovery system the best?', NULL, '<p class=\"text-justify\">Compression technology has been around for decades in both static and simple dynamic forms. But the NormaTec Pulse Technology found in NormaTec Recovery Systems takes dynamic compression to a new level. This unique pneumatic waveform, which is exclusive to NormaTec products, is designed to externally compress the limbs in a way that mimics normal physiology, featuring a sophisticated pulsing, gradient, and distal release compression pattern. Initially developed for medical patients with severe circulatory and peripheral vascular disorders, the NormaTec Recovery System is now the most effective recovery tool for athletes who want maximum performance recovery.</p>', 'Bhavini', '2018-08-22', '2018-08-22', 28, 'D', '116.74.103.171', '5'),
(39, 'When and for how long should I use my NormaTec system? ', NULL, '<p class=\"text-justify\">The NormaTec Recovery System can be used both before and after exercise, whether it is routine training or high-level competition.</p>\r\n<p class=\"text-justify\">Before exercise, the NormaTec acts as a high-tech massage to warm up your muscles. Pre-workout sessions are generally 10 to 20 minutes long with a moderate intensity level.</p>\r\n<p class=\"text-justify\">Using the NormaTec Recovery System after intense exercise will significantly speed up your recovery process, allowing you to train harder and perform better. We recommend using your NormaTec within a few hours after exercise to expedite your recovery process. Post-workout recovery sessions are generally 20 to 60 minutes long with a moderate to high intensity level (it is safe to pump as long as you want). Sit back, relax, and enjoy the high-tech massage found only in a NormaTec Recovery System.</p>', 'Bhavini', '2018-08-22', '2018-08-22', 29, 'D', '116.74.103.171', '5');

-- --------------------------------------------------------

--
-- Table structure for table `faq_master`
--

CREATE TABLE `faq_master` (
  `faq_master_id` int(11) NOT NULL,
  `faq_type` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `sortorder` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `remote_ip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_master`
--

INSERT INTO `faq_master` (`faq_master_id`, `faq_type`, `username`, `createdate`, `modifieddate`, `sortorder`, `status`, `remote_ip`) VALUES
(4, 'Cryotherapy', 'Bhavini', '2017-05-05', '2018-08-22', 1, 'E', '60.254.22.150'),
(5, 'NormaTec', 'Bhavini', '2018-08-22', '0000-00-00', 2, 'E', '60.254.22.150');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_master`
--

CREATE TABLE `gallery_master` (
  `image_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT '',
  `createdate` date NOT NULL DEFAULT '0000-00-00',
  `modifieddate` date NOT NULL DEFAULT '0000-00-00',
  `a_id` int(8) NOT NULL DEFAULT '0',
  `image_title` varchar(255) NOT NULL DEFAULT '',
  `image_description` text NOT NULL,
  `gallery_image` text NOT NULL,
  `video_link` text,
  `gallery_type` char(4) DEFAULT NULL,
  `sortorder` int(5) NOT NULL DEFAULT '0',
  `isFront` varchar(100) NOT NULL DEFAULT '',
  `status` char(1) NOT NULL DEFAULT 'E',
  `remote_ip` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_master`
--

INSERT INTO `gallery_master` (`image_id`, `username`, `createdate`, `modifieddate`, `a_id`, `image_title`, `image_description`, `gallery_image`, `video_link`, `gallery_type`, `sortorder`, `isFront`, `status`, `remote_ip`) VALUES
(2, 'Keyur', '2019-07-09', '0000-00-00', 11, 'BIS Certificate', '', '', '', 'I', 1, 'D', 'E', '116.74.112.172'),
(3, 'Keyur', '2019-07-09', '0000-00-00', 11, 'July - 2019', '', '', '', 'I', 4, 'D', 'E', '116.74.112.172');

-- --------------------------------------------------------

--
-- Table structure for table `group_master`
--

CREATE TABLE `group_master` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL DEFAULT '',
  `group_status` char(1) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Dumping data for table `group_master`
--

INSERT INTO `group_master` (`group_id`, `group_name`, `group_status`) VALUES
(1, 'Administrator', 'E'),
(2, 'Developer', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `homecontent`
--

CREATE TABLE `homecontent` (
  `content_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `home_content` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homecontent`
--

INSERT INTO `homecontent` (`content_id`, `username`, `createdate`, `modifieddate`, `home_content`) VALUES
(1, 'Keyur', '2017-04-05', '2017-04-06', '<div class=\"col-md-10 col-sm-10 text-center center-col\"><span class=\"margin-three no-margin-top display-block letter-spacing-2\">EST. 1987</span>\n<h1>About Hindva Group</h1>\n<p class=\"text-med width-95 center-col margin-seven margin-custom\" style=\"text-align: center;\">Hindva International &ndash; a premium global organisation is a prosperous wing and commercial business journey of M.K Group which was established in the year 1987. M.K Group was founded and established by two influential families Kheni &amp; Patel, migrated to Surat from Saurashtra of Gujarat in India. Over the past decades, M.K Group has built its own empire and earned a reputation for being successful in Diamond Manufacturing based out at Surat Gujarat. In the year 2008, the group introduced its own brand Hindva, and put all group companies under one umbrella.</p>\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` text,
  `job_location` text,
  `job_role` text,
  `job_duties` text,
  `job_about` text,
  `job_applicants` text,
  `type` varchar(2) NOT NULL,
  `status` char(1) DEFAULT NULL,
  `sortorder` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `job_location`, `job_role`, `job_duties`, `job_about`, `job_applicants`, `type`, `status`, `sortorder`) VALUES
(34, 'No Current Opening available ', 'surat', '', '', '<p>No Current Opening available&nbsp;</p>', '', 'Y', 'E', 5);

-- --------------------------------------------------------

--
-- Table structure for table `job_master`
--

CREATE TABLE `job_master` (
  `job_id` int(11) NOT NULL,
  `description` text,
  `j_name` varchar(150) NOT NULL,
  `j_email` varchar(50) NOT NULL,
  `j_message` text,
  `j_resume` varchar(255) NOT NULL DEFAULT '',
  `j_contact` varchar(100) DEFAULT NULL,
  `j_date` datetime DEFAULT NULL,
  `j_area` varchar(256) NOT NULL DEFAULT '',
  `j_exp` varchar(256) NOT NULL DEFAULT '',
  `new` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_master`
--

INSERT INTO `job_master` (`job_id`, `description`, `j_name`, `j_email`, `j_message`, `j_resume`, `j_contact`, `j_date`, `j_area`, `j_exp`, `new`) VALUES
(113, NULL, 'Bhavin Mistry', 'bhavin9mistry@gmail.com', 'Dear Team,\r\nGood Evening.\r\n\r\nMyself Bhavin Mistry applying for Engineer. \r\nPlease find the updated CV of mine as per shared details.', '113-Bhavin Mistry.docx', '8460172088', '2019-06-13 14:43:03', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module_master`
--

CREATE TABLE `module_master` (
  `module_id` int(5) NOT NULL,
  `module_title` varchar(50) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `module_file` varchar(25) NOT NULL,
  `module_parent` varchar(20) NOT NULL DEFAULT '',
  `module_seo_slug` varchar(25) NOT NULL DEFAULT '',
  `sortorder` int(3) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'D',
  `username` varchar(30) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `remote_ip` varchar(50) NOT NULL,
  `module_controller` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_master`
--

INSERT INTO `module_master` (`module_id`, `module_title`, `module_name`, `module_file`, `module_parent`, `module_seo_slug`, `sortorder`, `status`, `username`, `createdate`, `modifieddate`, `remote_ip`, `module_controller`) VALUES
(1, 'Contact', 'Contact', 'contact', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'contact'),
(2, 'User Management', 'User', 'user', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'user'),
(3, 'User Group Management', 'User Group', 'usergroup', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'user'),
(4, 'Slider Management', 'Slider', 'slider', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'slider'),
(5, 'Permission Management', 'Permission', 'permission', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'permission'),
(6, 'Pages Management', 'Pages', 'pages', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'pages'),
(7, 'Page Image Management', 'Page Images', 'pageimages', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'pages'),
(8, 'Homecontent Management', 'Homecontent', 'homecontent', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'pages'),
(9, 'Subscription List', 'Subscription List', 'subscription', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'subscription'),
(10, 'Job Data', 'Job Data', 'job', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'job'),
(11, 'epanel', 'epanel', 'epanel', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'settings'),
(12, 'website', 'website', 'website', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'settings'),
(13, 'News', 'News', 'news', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'news'),
(14, 'News Type', 'News Type', 'newsmaster', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'news'),
(15, 'Testimonial', 'Testimonial', 'testimonial', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'testimonial'),
(16, 'Testimonial Type', 'Testimonial Type', 'testimonialtype', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'testimonial'),
(17, 'Album Type', 'Album Type', 'albumtype', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'gallery'),
(18, 'Album', 'Album', 'album', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'gallery'),
(19, 'Gallery', 'Gallery', 'gallery', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'gallery'),
(20, 'Project Type', 'Project Type', 'project_type', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'projects'),
(21, 'Projects', 'Projects', 'projects', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'projects'),
(22, 'Project Floor Plans', 'Project Floor Plans', 'projectfloors', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'projects'),
(23, 'Project Slider Images', 'Project Slider Images', 'projectslider', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'projects'),
(24, 'Project Images', 'Project Images', 'projectimages', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'projects'),
(25, 'Brochure Download', 'Brochure Download', 'downloads_list', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'downloads_list'),
(26, 'Our Team', 'Our Team', 'team', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'team'),
(27, 'Banners', 'Banners', 'banner', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'banner'),
(28, 'Company', 'Company', 'company', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'projects'),
(29, 'Brochure', 'Brochure', 'brochure', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'brochure'),
(30, 'Home Page Popup', 'Home Page Popup', 'popup', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'popup'),
(31, 'Faq', 'Faq', 'faq', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'faq'),
(32, 'Faq Type', 'Faq Type', 'faqtype', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'faq'),
(33, 'Benifit', 'Benifit', 'benifit', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'benifit'),
(34, 'Appointment', 'Appointment', 'appointment', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'appointment'),
(35, 'Research', 'Research', 'research', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'research'),
(37, 'Services', 'Services', 'services', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'services'),
(36, 'Product', 'Product', 'products', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'products'),
(38, 'Results', 'Results', 'results', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'results'),
(39, 'Brochure Downloads', 'Brochure Downloads', 'brochure', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'brochure'),
(40, 'Personality', 'Personality', 'personality', '', '', 0, 'E', '', '0000-00-00', '0000-00-00', '', 'personality'),
(41, 'Jobs', 'Jobs', 'jobs', '', '', 0, 'E', '', '2019-05-09', '2019-05-30', '', 'jobs'),
(43, 'Manage Type', 'Manage Type', 'producttype', '', '', 0, 'E', '', '2019-05-09', '2019-05-30', '', 'products'),
(44, 'Manage Project Options', 'Manage Project Options', 'productoptions', '', '', 0, 'E', '', '2019-05-09', '2019-05-30', '', 'products');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date DEFAULT NULL,
  `news_type` int(1) NOT NULL,
  `news_title` varchar(150) NOT NULL DEFAULT '',
  `news_desc` text NOT NULL,
  `image` text,
  `news_date` varchar(255) NOT NULL,
  `remote_ip` varchar(50) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `sortorder` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `username`, `createdate`, `modifieddate`, `news_type`, `news_title`, `news_desc`, `image`, `news_date`, `remote_ip`, `status`, `sortorder`) VALUES
(68, 'Keyur', '2019-06-06', '2019-06-21', 1, 'Trade Fair, Valsad 2019  ', '<p>Trade Fair,&nbsp;Valsad 2019&nbsp;&nbsp;</p>', '68--1news.jpg', '29th May - 3rd June 2019  ', '116.74.112.172', 'E', 3),
(69, 'Keyur', '2019-06-06', '2019-06-25', 1, 'LED Expo, Mumbai 2019  ', '<p>LED Expo, Mumbai&nbsp;2019&nbsp;&nbsp;</p>', '69-69-2news.jpg', '9-11th May 2019', '116.74.112.172', 'E', 2),
(67, 'Keyur', '2019-06-06', '2019-06-25', 1, 'Sthapatya January 2019', '<p>Sthapatya January 2019</p>', '67-67-3news.jpg', '4-7th January 2019', '116.74.112.172', 'E', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_type`
--

CREATE TABLE `news_type` (
  `news_type_id` int(11) NOT NULL,
  `news_type` varchar(50) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `sortorder` int(3) NOT NULL,
  `remote_ip` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_type`
--

INSERT INTO `news_type` (`news_type_id`, `news_type`, `createdate`, `modifieddate`, `username`, `status`, `sortorder`, `remote_ip`) VALUES
(1, 'News', '2014-07-21', '2015-10-27', 'Keyur', 'E', 1, '192.168.2.106');

-- --------------------------------------------------------

--
-- Table structure for table `page_master`
--

CREATE TABLE `page_master` (
  `page_id` bigint(11) NOT NULL,
  `parent_id` bigint(11) NOT NULL,
  `page_template` varchar(200) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `page_image` varchar(100) NOT NULL DEFAULT '',
  `meta_title` varchar(255) NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `sortorder` int(8) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'E-Enable D- Disable',
  `user_id` int(8) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `remote_ip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_master`
--

INSERT INTO `page_master` (`page_id`, `parent_id`, `page_template`, `page_slug`, `page_title`, `page_content`, `page_image`, `meta_title`, `meta_desc`, `meta_keyword`, `sortorder`, `status`, `user_id`, `createdate`, `modifieddate`, `remote_ip`) VALUES
(1, 0, 'inner_page.tpl.php', 'our-philosophy', 'our philosophy', '<p>The Mehta family has been in the Diamond industry since the 1950&rsquo;s. We are the third generation in the business. With our collective experience accumulated over the years we select only the finest and rarest of gems to create eye catching jewellery.</p>\r\n<p>Our team combines traditional Indian and classic Western motifs to create a collection of exclusive designs using Diamonds, Rubies, Emeralds and Pearls amongst many more.</p>\r\n<p>We believe jewellery expresses ones indivisual style, and keeping that in mind, utmost attention is given to every minute detail of the product.</p>', '1-philosophy.png', '', '', '', 1, 'E', 3, '2015-10-28 10:31:57', '2019-08-02 12:10:19', '::1'),
(13, 0, 'inner_page.tpl.php', '', 'company profile', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"1600\">Keeping in mind the present world scenario, our products increase energy efficiency and help people enjoy their life with a much lower energy consumption and zero carbon footprint. We manufacture lighting products like LED Tube Light, Industrial Lights &amp; Street Lights. Our firm is well equipped with all the latest machinery and sophisticated technology that include Extrusion Machine, Molding Machine, Auto Soldering Machine, SMT Machine that ensure the smooth production operation.</p>', '13-company_profile_slider3.jpg', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-06-21 08:49:25', '116.74.112.172'),
(11, 0, 'inner_page.tpl.php', '', 'company profile', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"1400\">With innumerable track record to its name since 1967, J KORIN, the multi divisional textile company which&nbsp;strongly believes&nbsp;that a company with ethics and values is the richest is now spreading out&nbsp;in&nbsp;the lighting industry with&nbsp;the Korin Optoelectronics LLP.As we step into the economic lighting solution industries, we are bringing special luminaire technology to India.</p>', '11-about_uspage2.jpg', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-06-21 08:50:52', '116.74.112.172'),
(14, 0, 'inner_page.tpl.php', '', 'company profile', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"1600\">To keep a check on quality, we have an Electrical Testing Devices such as integrating &amp; distribution spheres and along with it an independent EMI laboratory as well to ensure the performance of all our products and to make sure they adhere to the BIS standard. Our technical support and designs have been powered by Korea with the machines being brought in from reputed international lighting manufacturers.</p>', '14-company_profile_slider4.jpg', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-06-21 08:49:46', '116.74.112.172'),
(15, 0, 'inner_page.tpl.php', '', 'company profile', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"1600\">We work with experienced team of professionals, they worked with great coordination in order to provide client with premium quality products.</p>\r\n<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"1600\">At Korin Optoelectronics, we make your world brighter.</p>', '15-12-about_uspage1.jpg', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-06-21 08:50:20', '116.74.112.172'),
(16, 0, 'inner_page.tpl.php', 'vission', 'vission', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"1400\">To contribute to the idea of sustainability in the electronic market with innovative strategies and cutting-edge technology, while bringing more to the Indian electronics&rsquo; platform.</p>', '16-16-opto_vission.jpg', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-05-31 10:38:34', '::1'),
(6, 0, 'inner_page.tpl.php', '', 'Get In Touch', '<h2 class=\"font-weight-bold text-color-light text-11 mb-4 appear-animation hght  l-s\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"200\">Get in touch and learn how we can help</h2>', '', '', '', '', 2, 'E', 4, '2017-05-22 09:25:43', '2019-06-11 19:01:51', '::1'),
(17, 0, 'inner_page.tpl.php', 'mission', 'mission', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"1400\">To provide quality, economical and superior products that meet the customer&rsquo;s satisfaction to the fullest. We hope to innovate and create a positive environment along with a better tomorrow for both our customers and employees.</p>', '17-17-opto_mission.jpg', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-05-31 10:38:55', '::1'),
(18, 0, '', '', 'core value', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\"\r\n                               data-appear-animation-delay=\"1400\">We, at Korin Optoelectronics LLP, are dedicated to\r\n                                providing the best of services and products in the lighting industry without\r\n                                compromising on any aspect.</p>', '18-18-core_value.jpg', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(21, 0, '', '', 'core value', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\"\r\n                               data-appear-animation-delay=\"1400\">We aim to not only provide best-in-class services but to also make the lives of the customers easier and hassle-free.</p>', '', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(19, 0, '', '', 'core value', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\"\r\n                               data-appear-animation-delay=\"1400\">Keeping in mind our customer’s demands, our products are made to satisfy all of their needs and requirements.</p>', '', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(20, 0, '', '', 'core value', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\"\r\n                               data-appear-animation-delay=\"1400\">The concept of sustainability is central to our ideology and new-age methods are employed to carry it out effectively.</p>', '', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(23, 0, '', '', '', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"1400\">We plan to realize this idea by introducing new-age technology that will be first of its kind in the country. Aiming to use nothing but the best technology for manufacturing and creating an effective feedback system, will help us be in touch with the customers’ changing needs and requirements.</p>', '', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(24, 0, '', '', '', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"1400\">Our ulterior motto is to provide quality products at an affordable price point by focusing on customers’ satisfaction and provide reliable after-sales-services. We together with our employees are working towards realizing and bringing the company’s vision to life. Your unconditional support is essential for us to keep moving forward. We would love to serve you as you become a part of the J Korin family.</p>', '', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(2, 0, 'inner_page.tpl.php', 'what-s-happening', 'what\'s happening', '<p>We try to showcase our work as often as we can, in the past we have exhibited our designs at Design one, HITEC in Hyderabad and Gehna exhibitions. If you like our designs leave your email below so we can update you with our latest developments.</p>', '2-2-infra_home.jpg', '', '', '', 9, 'E', 4, '2017-06-06 11:03:29', '2019-08-23 16:26:24', '::1'),
(5, 0, 'inner_page.tpl.php', '', 'Our Prouducts', '', '', '', '', '', 3, 'E', 4, '2017-05-22 11:21:11', '2017-06-08 17:28:09', '127.0.0.1'),
(9, 0, 'inner_page.tpl.php', '', 'Our Products', '', '', '', '', '', 4, 'E', 4, '2017-05-22 12:01:41', '2017-06-08 17:03:12', '127.0.0.1'),
(10, 0, 'inner_page.tpl.php', '', 'Our Products', '', '', '', '', '', 10, 'E', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(22, 0, '', '', '', '<p class=\"text-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"1400\">On behalf of all of us at JKorin, I take this opportunity to extend our heartfelt gratitude to our customers who make us who we are. We will always aim to provide best-in-class products that are value for money in the textile industry, building industry and now in the lighting industry. Branching out in this new avenue as Korin Optoelectronics LLP, we seek your support and faith in us to provide you with the best of services and products. We have also directed our endeavour towards the concept of sustainability, a philosophy which should be given the utmost importance in this industrialized society.</p>', '', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(25, 0, '', '', 'client logo', '', '25-cli_1.png', '', '', '', 11, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(26, 0, '', '', 'client logo', '', '26-cli_1.png', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(27, 0, '', '', 'client logo', '', '27-cli_1.png', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(28, 0, '', '', 'client logo', '', '28-cli_1.png', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(29, 0, '', '', 'client logo', '', '29-cli_1.png', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(30, 0, '', '', 'client logo', '', '30-cli_1.png', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(31, 0, '', '', 'client logo', '', '31-cli_1.png', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(32, 0, '', '', 'client logo', '', '32-cli_1.png', '', '', '', 1, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(34, 0, 'inner_page.tpl.php', '', 'contact us ', '<p>We may put you on hold when you call, but we shall not ignore any of your query. Please feel free to get in touch with us anytime and we shall get back to you as soon as we can !</p>', '', '', '', '', 34, 'E', 4, '2015-10-28 10:31:57', '2019-06-11 19:06:04', '::1'),
(3, 0, 'inner_page.tpl.php', 'works', 'Works', '<p>OFJ\'s mission is to create original contemporary designs using rare gemstones. It embraces old world artisanship with modern technology to create spectacular pieces of \"art\"</p>\r\n<p>All our jewellery is hand-made and is certified by globally recognised institutions.</p>\r\n<p>We are constantly experimenting with new design ideas and updating our techniques so that we can continue offering high quality products.</p>', '', '', '', '', 5, 'E', 3, '2017-05-24 17:04:18', '2019-08-02 13:27:09', '::1'),
(8, 0, 'inner_page.tpl.php', '', 'Our Products', '', '', '', '', '', 6, 'E', 4, '2017-05-27 09:13:20', '2017-06-17 10:58:03', '127.0.0.1'),
(7, 0, 'inner_page.tpl.php', '', 'Get In Touch', '<p class=\"font-weight-light text-color-light line-height-9 text-4 opacity-7 mb-5 appear-animation\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"400\">We may put you on hold when you call, but we shall not ignore any of your query. Please feel free to get in touch with us anytime and we shall get back to you as soon as we can !</p>', '', '', '', '', 7, 'E', 4, '2017-05-27 09:13:47', '2019-06-11 19:04:37', '::1'),
(4, 0, 'inner_page.tpl.php', '', 'Infrastructure', '<p class=\"text-5 font-weight-normal text-color-dark line-height-7\">The manufacturing unit works\r\n                        at full capacity for maximum output. The manufacturing equipment is up-to-date to meet the\r\n                        demand for the latest products. The equipment used includes auto soldering, SMT machines and\r\n                        electrical testing devices such as integrating spheres and distribution photometers along\r\n                        with an independent EMI laboratory. </p>', '', '', '', '', 8, 'E', 4, '2017-05-27 09:14:02', '2017-06-17 10:58:52', '127.0.0.1'),
(35, 0, '', '', 'Infrastructure', 'Korin Optoelectronics LLP has a world-class lighting manufacturing unit located in Surat. It is among the very few fully integrated Indian lighting companies that use high-end luminaire technology from Korea.', '35-17-1-about.jpg', '', '', '', 35, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(36, 0, '', '', 'Infrastructure', 'The manufacturing unit works at full capacity for maximum output. The manufacturing equipment is up-to-date to meet the demand for the latest products. The equipment used includes auto soldering, SMT machines and electrical testing devices such as integrating spheres and distribution photometers along with an independent EMI laboratory. Other than the machinery, a dedicated QC Team assures the top-notch quality of the finished products in accordance with the BIS standard.\r\n', '36-19-about_company2.jpg', '', '', '', 36, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(37, 0, '', '', 'Infrastructure', 'The production unit is kept under a strict surveillance system to ensure maximum utilization of resources and an efficient production process. With the machinery and other processes in place, the unit’s production capability is _____. (Add output capability.)\n', '37-11-about_company.jpg', '', '', '', 36, 'E', 4, '2015-10-28 10:31:57', '2019-04-26 14:04:14', '::1'),
(39, 0, 'inner_page.tpl.php', 'footer-about', 'footer about', '<p class=\"text-5 font-weight-normal footer-color  line-height-7\">With innumerable track records to its name since 1967, J Korin, the multi-divisional textile company is now spreading out into the lighting industry with Korin Optoelectronics LLP. As we step into the economic lighting solution industries, we are bringing special luminaire technology to India.</p>', '', '', '', '', 37, 'E', 6, '2019-05-20 10:50:41', '2019-05-20 10:54:50', '192.168.0.17'),
(40, 0, 'inner_page.tpl.php', 'about-us-home', 'about us home', '<p class=\"text-5 font-weight-normal text-color-dark line-height-7\">To keep a check on quality, we have an Electrical Testing Devices such as integrating &amp; distribution spheres and along with it an independent EMI laboratory as well to ensure the performance of all our products and to make sure they adhere to the BIS standard. Our technical support and designs have been powered by Korea with the machines being brought in from reputed international lighting manufacturers.</p>\r\n<p class=\"text-5 font-weight-normal text-color-dark line-height-7\">We work with experienced team of professionals, they worked with great coordination in order to provide client with premium quality products.</p>\r\n<p class=\"text-5 font-weight-normal text-color-dark line-height-7\">At Korin Optoelectronics LLP, we make your world brighter.</p>', '', '', '', '', 38, 'E', 6, '2019-05-20 10:50:41', '2019-05-20 10:54:50', '192.168.0.17');

-- --------------------------------------------------------

--
-- Table structure for table `permission_master`
--

CREATE TABLE `permission_master` (
  `permission_id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `group_id` varchar(20) NOT NULL,
  `module` varchar(20) NOT NULL,
  `permissions` varchar(7) NOT NULL DEFAULT 'a,e,d,v',
  `module_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_master`
--

INSERT INTO `permission_master` (`permission_id`, `username`, `createdate`, `modifieddate`, `group_id`, `module`, `permissions`, `module_id`) VALUES
(778, 'Keyur', '2017-11-13', '2017-11-13', '1', 'benifit', 'a,d,e,v', 33),
(777, 'Keyur', '2017-11-13', '2017-11-13', '1', 'faqtype', 'a,d,e,v', 32),
(776, 'Keyur', '2017-11-13', '2017-11-13', '1', 'faq', 'a,d,e,v', 31),
(775, 'Keyur', '2017-11-13', '2017-11-13', '1', 'popup', 'a,d,e,v', 30),
(774, 'Keyur', '2017-11-13', '2017-11-13', '1', 'brochure', 'a,d,e,v', 29),
(773, 'Keyur', '2017-11-13', '2017-11-13', '1', 'company', 'a,d,e,v', 28),
(772, 'Keyur', '2017-11-13', '2017-11-13', '1', 'banner', 'a,d,e,v', 27),
(771, 'Keyur', '2017-11-13', '2017-11-13', '1', 'team', 'a,d,e,v', 26),
(770, 'Keyur', '2017-11-13', '2017-11-13', '1', 'downloads_list', 'a,d,e,v', 25),
(769, 'Keyur', '2017-11-13', '2017-11-13', '1', 'projectimages', 'a,d,e,v', 24),
(768, 'Keyur', '2017-11-13', '2017-11-13', '1', 'projectslider', 'a,d,e,v', 23),
(767, 'Keyur', '2017-11-13', '2017-11-13', '1', 'projectfloors', 'a,d,e,v', 22),
(766, 'Keyur', '2017-11-13', '2017-11-13', '1', 'projects', 'a,d,e,v', 21),
(765, 'Keyur', '2017-11-13', '2017-11-13', '1', 'project_type', 'a,d,e,v', 20),
(764, 'Keyur', '2017-11-13', '2017-11-13', '1', 'gallery', 'a,d,e,v', 19),
(763, 'Keyur', '2017-11-13', '2017-11-13', '1', 'album', 'a,d,e,v', 18),
(762, 'Keyur', '2017-11-13', '2017-11-13', '1', 'albumtype', 'a,d,e,v', 17),
(761, 'Keyur', '2017-11-13', '2017-11-13', '1', 'testimonialtype', 'a,d,e,v', 16),
(760, 'Keyur', '2017-11-13', '2017-11-13', '1', 'testimonial', 'a,d,e,v', 15),
(759, 'Keyur', '2017-11-13', '2017-11-13', '1', 'newsmaster', 'a,d,e,v', 14),
(758, 'Keyur', '2017-11-13', '2017-11-13', '1', 'news', 'a,d,e,v', 13),
(757, 'Keyur', '2017-11-13', '2017-11-13', '1', 'website', 'a,d,e,v', 12),
(756, 'Keyur', '2017-11-13', '2017-11-13', '1', 'epanel', 'a,d,e,v', 11),
(755, 'Keyur', '2017-11-13', '2017-11-13', '1', 'job', 'a,d,e,v', 10),
(754, 'Keyur', '2017-11-13', '2017-11-13', '1', 'subscription', 'a,d,e,v', 9),
(753, 'Keyur', '2017-11-13', '2017-11-13', '1', 'homecontent', 'a,d,e,v', 8),
(752, 'Keyur', '2017-11-13', '2017-11-13', '1', 'pageimages', 'a,d,e,v', 7),
(751, 'Keyur', '2017-11-13', '2017-11-13', '1', 'pages', 'a,d,e,v', 6),
(750, 'Keyur', '2017-11-13', '2017-11-13', '1', 'permission', 'a,d,e,v', 5),
(749, 'Keyur', '2017-11-13', '2017-11-13', '1', 'slider', 'a,d,e,v', 4),
(748, 'Keyur', '2017-11-13', '2017-11-13', '1', 'usergroup', 'a,d,e,v', 3),
(747, 'Keyur', '2017-11-13', '2017-11-13', '1', 'user', 'a,d,e,v', 2),
(746, 'Keyur', '2017-11-13', '2017-11-13', '1', 'contact', 'a,d,e,v', 1),
(779, 'Keyur', '2017-11-13', '2017-11-13', '1', 'appointment', 'a,d,e,v', 34),
(780, 'Keyur', '2017-11-13', '2017-11-13', '1', 'research', 'a,d,e,v', 35),
(781, 'Keyur', '2017-11-13', '2017-11-13', '1', 'services', 'a,d,e,v', 37),
(782, 'Keyur', '2017-11-13', '2017-11-13', '1', 'products', 'a,d,e,v', 36),
(783, 'Keyur', '2017-11-13', '2017-11-13', '1', 'results', 'a,d,e,v', 38),
(784, 'Keyur', '2017-11-13', '2017-11-13', '1', 'brochure', 'a,d,e,v', 39),
(785, 'Keyur', '2017-11-13', '2017-11-13', '1', 'personality', 'a,d,e,v', 40),
(786, 'Keyur', '2017-11-13', '2017-11-13', '1', 'jobs', 'a,d,e,v', 41),
(787, 'Keyur', '2018-06-27', '2018-06-27', '1', 'producttype', 'a,d,e,v', 43),
(788, 'Keyur', '2018-06-27', '2018-06-27', '1', 'productoptions', 'a,d,e,v', 44);

-- --------------------------------------------------------

--
-- Table structure for table `personality`
--

CREATE TABLE `personality` (
  `personalityID` int(11) NOT NULL,
  `personalityTitle` varchar(255) DEFAULT NULL,
  `personalitySubTitle` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `sortorder` int(8) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `remote_ip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personality`
--

INSERT INTO `personality` (`personalityID`, `personalityTitle`, `personalitySubTitle`, `image`, `username`, `status`, `sortorder`, `createdate`, `modifieddate`, `remote_ip`) VALUES
(1, 'Cristiano Ronaldo', 'Professional Footballer', '1-ronaldo.jpg', 'Keyur', 'E', 1, '2017-11-13', '2017-11-14', '175.100.148.240'),
(2, 'Jessica Alba', 'Actress', '2-jessica-alba-red-lips.jpg', 'Keyur', 'E', 2, '2017-11-13', '2017-11-14', '175.100.148.240'),
(3, 'Derek Hough', 'Professional Dancer', '3-derek_hough_judge.jpg', 'Keyur', 'E', 3, '2017-11-13', '2017-11-14', '175.100.148.240'),
(4, 'Kobe Bryant', 'NBA player', '4-kobe-bryant.jpg', 'Keyur', 'E', 4, '2017-11-13', '2017-11-14', '175.100.148.240'),
(5, 'Mandy Moore', 'Singer-songwriter  Actress', '5-mandy moore.jpg', 'Keyur', 'E', 5, '2017-11-13', '2017-11-14', '175.100.148.240'),
(6, 'Daniel Craig', 'Actor', '6-daniel_craig-1381.jpg', 'Keyur', 'E', 6, '2017-11-14', '0000-00-00', '175.100.148.240'),
(7, 'Floyd Mayweather', 'World Champion Boxer', '7-Floyd Mayweather.jpg', 'Keyur', 'E', 7, '2017-11-14', '0000-00-00', '175.100.148.240'),
(8, 'Usian Bolt', 'Olympic Athlete', '8-Usain-Bolt-200.jpg', 'Keyur', 'E', 8, '2017-11-14', '0000-00-00', '175.100.148.240'),
(9, 'Mark Webber', 'F1 Racing Driver', '9-mark webber.jpg', 'Keyur', 'E', 9, '2017-11-14', '0000-00-00', '175.100.148.240'),
(10, 'LeBron James ', 'NBA Player', '10-Lebrown james.jpeg', 'Keyur', 'E', 10, '2017-11-14', '0000-00-00', '175.100.148.240'),
(11, 'Demi Moore', 'Actress', '11-Demi moore.jpg', 'Keyur', 'E', 11, '2017-11-14', '0000-00-00', '175.100.148.240'),
(12, 'Tony Ribbons', 'Motivational Speaker', '12-tony.png', 'Keyur', 'E', 12, '2017-11-14', '0000-00-00', '175.100.148.240');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `pTypeID` int(11) NOT NULL,
  `productTitle` varchar(100) NOT NULL,
  `productTypeTitle` varchar(50) NOT NULL,
  `productSubTitle` varchar(50) NOT NULL,
  `productDescr` text NOT NULL,
  `productStatus` varchar(25) NOT NULL,
  `siteaddress` varchar(255) NOT NULL,
  `googlePin` varchar(200) DEFAULT NULL,
  `rera` varchar(500) DEFAULT NULL,
  `productArea` varchar(100) NOT NULL,
  `productAbout` text,
  `productPlans` text,
  `productBrochure` varchar(200) DEFAULT NULL,
  `productLocation` varchar(200) DEFAULT NULL,
  `productThumbnail` varchar(100) DEFAULT NULL,
  `productShareImage` varchar(100) NOT NULL,
  `productSpeciality` text,
  `productVideo` text,
  `productVideoUrl` text NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `sortorder` int(5) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `remote_ip` varchar(20) NOT NULL,
  `hasForm` varchar(6) DEFAULT 'No',
  `hasmasterplan` varchar(6) DEFAULT 'No',
  `hasBrochure` varchar(6) NOT NULL,
  `productSpec` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `pTypeID`, `productTitle`, `productTypeTitle`, `productSubTitle`, `productDescr`, `productStatus`, `siteaddress`, `googlePin`, `rera`, `productArea`, `productAbout`, `productPlans`, `productBrochure`, `productLocation`, `productThumbnail`, `productShareImage`, `productSpeciality`, `productVideo`, `productVideoUrl`, `createdate`, `modifieddate`, `username`, `sortorder`, `status`, `remote_ip`, `hasForm`, `hasmasterplan`, `hasBrochure`, `productSpec`) VALUES
(37, 25, 'T5 US UNIBODY SQUARE BATTEN', 'T5 US UNIBODY SQUARE BATTEN', 'T5 ', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1136mm/1173mm</td>\r\n</tr>\r\n<tr>\r\n<td>WEIGHT</td>\r\n<td>120+/-5gm</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US UNIBODY SQUARE HOUSING.pdf', '37-T5-angluer-js_location.jpg', '37-T5-US-UNBODY-SQUARE-BATTEN_thumb.jpg', '37-T5-US-UNBODY-SQUARE-BATTEN_share.jpg', NULL, '', '', '2019-06-22', '2019-06-01', '', 10, 'E', '116.74.112.172', 'Yes', '', 'Yes', '<p>T5 US UNBODY SQUARE BATTEN</p>'),
(39, 25, 'T5 US UNIBODY MUSHROOM BATTEN', 'T5 US UNIBODY MUSHROOM BATTEN', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>WATTAGE</td>\r\n<td>5W/10W/18W/20W/22W/24W</td>\r\n</tr>\r\n<tr>\r\n<td>CCT</td>\r\n<td>3000K/4000K/6500K/3CCT/RGB</td>\r\n</tr>\r\n<tr>\r\n<td>LUMENS/WATT</td>\r\n<td>100LM/120LM</td>\r\n</tr>\r\n<tr>\r\n<td>PF</td>\r\n<td>&gt;0.9</td>\r\n</tr>\r\n<tr>\r\n<td>CRI</td>\r\n<td>&gt;80</td>\r\n</tr>\r\n<tr>\r\n<td>SURGE</td>\r\n<td>2.5KV</td>\r\n</tr>\r\n<tr>\r\n<td>INPUT VOLTAGE</td>\r\n<td>150-270V</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC</td>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1ft/2ft/4ft</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US UNIBODY MUSHROOM BATTEN.pdf', '39-T5-US-UNBODY-MUSHROOM-BATTEN_location.jpg', '39-T5-US-UNBODY-MUSHROOM-BATTEN_thumb.jpg', '39-T5-US-UNBODY-MUSHROOM-BATTEN_share.jpg', NULL, '', '', '2019-06-22', '2019-06-03', '', 15, 'E', '116.74.112.172', 'Yes', '', 'Yes', ''),
(40, 25, 'T5 US SPLIT SQUARE BATTEN', 'T5 US SPLIT SQUARE BATTEN', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>WATTAGE</td>\r\n<td>5W/10W/18W/20W/22W/24W/36W</td>\r\n</tr>\r\n<tr>\r\n<td>CCT</td>\r\n<td>3000K/4000K/6500K/3CCT/RGB</td>\r\n</tr>\r\n<tr>\r\n<td>LUMENS/WATT</td>\r\n<td>100LM/120LM</td>\r\n</tr>\r\n<tr>\r\n<td>PF</td>\r\n<td>&gt;0.9</td>\r\n</tr>\r\n<tr>\r\n<td>CRI</td>\r\n<td>&gt;80</td>\r\n</tr>\r\n<tr>\r\n<td>SURGE</td>\r\n<td>2.5KV</td>\r\n</tr>\r\n<tr>\r\n<td>INPUT VOLTAGE</td>\r\n<td>150-270V</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC / AL</td>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1ft/2ft/4ft</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US SPLIT SQUARE BATTEN.pdf', '40-T5-US-SPLIT-SQUARE-BATTEN_location.jpg', '40-T5-US-SPLIT-SQUARE-BATTEN_thumb.jpg', '40-T5-US-SPLIT-SQUARE-BATTEN_share.jpg', NULL, '', '', '2019-06-04', '2019-06-04', '', 13, 'E', '::1', 'Yes', '', 'Yes', ''),
(41, 25, 'T5 US SLIM SQUARE BATTEN', 'T5 US SLIM SQUARE BATTEN', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>WATTAGE</td>\r\n<td>5W/10W/18W/20W/22W/24W</td>\r\n</tr>\r\n<tr>\r\n<td>CCT</td>\r\n<td>3000K/4000K/6500K/RGB</td>\r\n</tr>\r\n<tr>\r\n<td>LUMENS/WATT</td>\r\n<td>100LM/120LM</td>\r\n</tr>\r\n<tr>\r\n<td>PF</td>\r\n<td>&gt;0.9</td>\r\n</tr>\r\n<tr>\r\n<td>CRI</td>\r\n<td>&gt;80</td>\r\n</tr>\r\n<tr>\r\n<td>SURGE</td>\r\n<td>2.5KV</td>\r\n</tr>\r\n<tr>\r\n<td>INPUT VOLTAGE</td>\r\n<td>150-270V</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC</td>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1ft/2ft/4ft</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US SLIM SQUARE BATTEN.pdf', '41-T5-US-SLIM-SQUARE-BATTEN_location.jpg', '41-T5-US-SLIM-SQUARE-BATTEN_thumb.jpg', '41-T5-US-SLIM-SQUARE-BATTEN_share.jpg', NULL, '', '', '2019-06-04', '2019-06-04', '', 14, 'E', '::1', 'Yes', '', 'Yes', ''),
(42, 25, 'T5 US SLIM ROUND BATTEN', 'T5 US SLIM ROUND BATTEN', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>WATTAGE</td>\r\n<td>5W/10W/18W/20W/22W/24W</td>\r\n</tr>\r\n<tr>\r\n<td>CCT</td>\r\n<td>3000K/4000K/6500K/RGB</td>\r\n</tr>\r\n<tr>\r\n<td>LUMENS/WATT</td>\r\n<td>100LM/120LM</td>\r\n</tr>\r\n<tr>\r\n<td>PF</td>\r\n<td>&gt;0.9</td>\r\n</tr>\r\n<tr>\r\n<td>CRI</td>\r\n<td>&gt;80</td>\r\n</tr>\r\n<tr>\r\n<td>SURGE</td>\r\n<td>2.5KV</td>\r\n</tr>\r\n<tr>\r\n<td>INPUT VOLTAGE</td>\r\n<td>150-270V</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC</td>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1ft/2ft/4ft</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US SLIM ROUND BATTEN.pdf', '42-T5-US-SLIM-ROUND-BATTEN_location.jpg', '42-T5-US-SLIM-ROUND-BATTEN_thumb.jpg', '42-T5-US-SLIM-ROUND-BATTEN_share.jpg', NULL, '', '', '2019-06-04', '2019-06-04', '', 8, 'E', '::1', 'Yes', '', 'Yes', ''),
(43, 25, 'T5 US MUSHROOM BATTEN', 'T5 US MUSHROOM BATTEN', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>WATTAGE</td>\r\n<td>5W/10W/18W/20W/22W/24/36W</td>\r\n</tr>\r\n<tr>\r\n<td>CCT</td>\r\n<td>3000K/4000K/6500K/3CCT/RGB</td>\r\n</tr>\r\n<tr>\r\n<td>LUMENS/WATT</td>\r\n<td>100LM/120LM</td>\r\n</tr>\r\n<tr>\r\n<td>PF</td>\r\n<td>&gt;0.9</td>\r\n</tr>\r\n<tr>\r\n<td>CRI</td>\r\n<td>&gt;80</td>\r\n</tr>\r\n<tr>\r\n<td>SURGE</td>\r\n<td>2.5KV</td>\r\n</tr>\r\n<tr>\r\n<td>INPUT VOLTAGE</td>\r\n<td>150-270V</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC/AL</td>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1ft/2ft/4ft</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US MUSHROOM BATTEN.pdf', '43-T5-US-MUSHROOM-BATTEN_location.jpg', '43-T5-US-MUSHROOM-BATTEN_thumb.jpg', '43-T5-US-MUSHROOM-BATTEN_share.jpg', NULL, '', '', '2019-06-04', '2019-06-04', '', 9, 'E', '::1', 'Yes', '', 'Yes', ''),
(44, 25, 'T5 US ANGULAR MUSHROOM BATTEN', 'T5 US ANGULAR MUSHROOM BATTEN', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>WATTAGE</td>\r\n<td>5W/10W/18W/20W/22W/24W</td>\r\n</tr>\r\n<tr>\r\n<td>CCT</td>\r\n<td>3000K/4000K/6500K/RGB</td>\r\n</tr>\r\n<tr>\r\n<td>LUMENS/WATT</td>\r\n<td>100LM/120LM</td>\r\n</tr>\r\n<tr>\r\n<td>PF</td>\r\n<td>&gt;0.9</td>\r\n</tr>\r\n<tr>\r\n<td>CRI</td>\r\n<td>&gt;80</td>\r\n</tr>\r\n<tr>\r\n<td>SURGE</td>\r\n<td>2.5KV</td>\r\n</tr>\r\n<tr>\r\n<td>INPUT VOLTAGE</td>\r\n<td>150-270V</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC</td>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1ft/2ft/4ft</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US ANGULAR MUSHROOM BATTEN.pdf', '44-T5-US-ANGULAR-MUSHROOM-BATTEN_location.jpg', '44-T5-US-ANGULAR-MUSHROOM-BATTEN_thumb.jpg', '44-T5-US-ANGULAR-MUSHROOM-BATTEN_share.jpg', NULL, '', '', '2019-06-04', '2019-06-04', '', 11, 'E', '::1', 'Yes', '', 'Yes', ''),
(46, 25, 'T8 RETROFIT', 'T8 RETROFIT', 'T8', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>WATTAGE</td>\r\n<td>18W/20W/22W</td>\r\n</tr>\r\n<tr>\r\n<td>CCT</td>\r\n<td>6500K</td>\r\n</tr>\r\n<tr>\r\n<td>LUMENS/WATT</td>\r\n<td>100LM</td>\r\n</tr>\r\n<tr>\r\n<td>PF</td>\r\n<td>&gt;0.9</td>\r\n</tr>\r\n<tr>\r\n<td>CRI</td>\r\n<td>&gt;80</td>\r\n</tr>\r\n<tr>\r\n<td>SURGE</td>\r\n<td>2.5KV</td>\r\n</tr>\r\n<tr>\r\n<td>INPUT VOLTAGE</td>\r\n<td>150-270V</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>AL</td>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>4ft</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T8 RETROFIT.pdf', '46-T8-RETROFIT_location.jpg', '46-T8-RETROFIT_thumb.jpg', '46-T8-RETROFIT_share.jpg', NULL, '', '', '2019-06-04', '2019-06-04', '', 12, 'E', '::1', 'Yes', '', 'Yes', ''),
(47, 26, 'sdfcs', 'dfsa', 'dsfdvd', '<p>dsfsafsdf</p>', 'Batten', '-', '', NULL, '', '', 'Yes', '', '47-sdfcs_location.jpg', '47-sdfcs_thumb.jpg', '47-sdfcs_share.jpg', NULL, '', '', '2019-06-06', '2019-06-06', '', 13, 'E', '::1', 'Yes', '', 'No', '<p>dssfs</p>'),
(52, 28, 'LED PCB', 'LED PCB', 'LED', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>LENGTH</td>\r\n<td>1126mm/1173mm</td>\r\n</tr>\r\n<tr>\r\n<td>WIDTH</td>\r\n<td>6mm/9.5mm</td>\r\n</tr>\r\n<tr>\r\n<td>No. OF LED</td>\r\n<td>90 /96 /104 /112 /120</td>\r\n</tr>\r\n<tr>\r\n<td>LED</td>\r\n<td>Changfang / Everlight</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>MC PCB/FR4</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'LED PCB.pdf', '52-LED-PCB_location.jpg', '52-LED-PCB_thumb.jpg', '52-LED-PCB_share.jpg', NULL, '', '', '2019-06-25', '2019-06-06', '', 2, 'E', '116.74.112.172', 'Yes', '', 'Yes', '<p>LED PCB</p>'),
(51, 28, 'LED DRIVER', 'LED DRIVER', 'LED', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>WATTAGE</td>\r\n<td>5W TO 24W</td>\r\n</tr>\r\n<tr>\r\n<td>PF</td>\r\n<td>&gt;0.9</td>\r\n</tr>\r\n<tr>\r\n<td>SURGE</td>\r\n<td>2.5KV</td>\r\n</tr>\r\n<tr>\r\n<td>INPUT VOLTAGE</td>\r\n<td>150-270V</td>\r\n</tr>\r\n<tr>\r\n<td>THD</td>\r\n<td>&lt;15</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'LED DRIVER.pdf', '51-LED-DRIVER_location.jpg', '51-LED-DRIVER_thumb.jpg', '51-LED-DRIVER_share.jpg', NULL, '', '', '2019-06-06', '2019-06-06', '', 1, 'E', '123.201.2.173', 'Yes', '', 'Yes', '<p>LED DRIVER</p>'),
(53, 28, 'T5 US ANGULAR MUSHROOM HOUSING', 'T5 US ANGULAR MUSHROOM HOUSING', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1136mm/1173mm</td>\r\n</tr>\r\n<tr>\r\n<td>WEIGHT</td>\r\n<td>120+/-5gm</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US ANGULAR MUSHROOM HOUSING.pdf', '53-T5-US-ANGULAR-MUSHROOM-HOUSING_location.jpg', '53-T5-US-ANGULAR-MUSHROOM-HOUSING_thumb.jpg', '53-T5-US-ANGULAR-MUSHROOM-HOUSING_share.jpg', NULL, '', '', '2019-06-06', '2019-06-06', '', 3, 'E', '123.201.2.173', 'Yes', '', 'Yes', '<p>T5 US ANGULAR MUSHROOM HOUSING</p>'),
(59, 28, 'T5 US SQUARE AL HOUSING', 'T5 US SQUARE AL HOUSING', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1136mm/1173mm</td>\r\n</tr>\r\n<tr>\r\n<td>WEIGHT</td>\r\n<td>170+/-5gm</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>AL</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US SQUARE AL HOUSING.pdf', '59-T5-US-SQUARE-AL-HOUSING_location.jpg', '59-T5-US-SQUARE-AL-HOUSING_thumb.jpg', '59-T5-US-SQUARE-AL-HOUSING_share.jpg', NULL, '', '', '2019-06-06', '2019-06-06', '', 6, 'E', '123.201.2.173', 'Yes', '', 'Yes', ''),
(58, 28, 'T5 US MUSHROOM AL HOUSING', 'T5 US MUSHROOM AL HOUSING', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1136mm/1173mm</td>\r\n</tr>\r\n<tr>\r\n<td>WEIGHT</td>\r\n<td>170+/-5gm</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>AL</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US MUSHROOM AL HOUSING.pdf', '58-T5-US-MASHROOM-AL-HOUSING_location.jpg', '58-T5-US-MASHROOM-AL-HOUSING_thumb.jpg', '58-T5-US-MASHROOM-AL-HOUSING_share.jpg', NULL, '', '', '2019-06-22', '2019-06-06', '', 5, 'E', '116.74.112.172', 'Yes', '', 'Yes', ''),
(57, 28, 'T5 US MUSHROOM PC HOUSING', 'T5 US MUSHROOM PC HOUSING', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1136mm/1173mm</td>\r\n</tr>\r\n<tr>\r\n<td>WEIGHT</td>\r\n<td>120+/-5gm</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US MUSHROOM PC HOUSING.pdf', '57-T5-US-MASHROOM-PC-HOUSING_location.jpg', '57-T5-US-MASHROOM-PC-HOUSING_thumb.jpg', '57-T5-US-MASHROOM-PC-HOUSING_share.jpg', NULL, '', '', '2019-06-22', '2019-06-06', '', 4, 'E', '116.74.112.172', 'Yes', '', 'Yes', ''),
(60, 28, 'T5 US SQUARE PC HOUSING', 'T5 US SQUARE PC HOUSING', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1136mm/1173mm</td>\r\n</tr>\r\n<tr>\r\n<td>WEIGHT</td>\r\n<td>120+/-5gm</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US SQUARE PC HOUSING.pdf', '60-T5-US-SQUARE-PC-HOUSING_location.jpg', '60-T5-US-SQUARE-PC-HOUSING_thumb.jpg', '60-T5-US-SQUARE-PC-HOUSING_share.jpg', NULL, '', '', '2019-06-06', '2019-06-06', '', 7, 'E', '123.201.2.173', 'Yes', '', 'Yes', ''),
(61, 28, 'T5 US SLIM ROUND HOUSING', 'T5 US SLIM ROUND HOUSING', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1136mm/1173mm</td>\r\n</tr>\r\n<tr>\r\n<td>WEIGHT</td>\r\n<td>120+/-5gm</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US SLIM ROUND HOUSING.pdf', '61-T5-US-SLIM-ROUND-HOUSING_location.jpg', '61-T5-US-SLIM-ROUND-HOUSING_thumb.jpg', '61-T5-US-SLIM-ROUND-HOUSING_share.jpg', NULL, '', '', '2019-06-21', '2019-06-21', '', 16, 'E', '116.74.112.172', 'Yes', '', 'Yes', ''),
(62, 28, 'T5 US SLIM SQUARE HOUSING', 'T5 US SLIM SQUARE HOUSING', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1136mm/1173mm</td>\r\n</tr>\r\n<tr>\r\n<td>WEIGHT</td>\r\n<td>120+/-5gm</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US SLIM SQUARE HOUSING.pdf', '62-T5-US-SLIM-SQUARE-HOUSING_location.jpg', '62-T5-US-SLIM-SQUARE-HOUSING_thumb.jpg', '62-T5-US-SLIM-SQUARE-HOUSING_share.jpg', NULL, '', '', '2019-06-21', '2019-06-21', '', 17, 'E', '116.74.112.172', 'Yes', '', 'Yes', ''),
(63, 28, 'T5 US UNIBODY SQUARE HOUSING', 'T5 US UNIBODY SQUARE HOUSING', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1136mm/1173mm</td>\r\n</tr>\r\n<tr>\r\n<td>WEIGHT</td>\r\n<td>120+/-5gm</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>PC</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US UNIBODY SQUARE HOUSING.pdf', '63-T5-US-UNIBODY-SQUARE-HOUSING_location.jpg', '63-T5-US-UNIBODY-SQUARE-HOUSING_thumb.jpg', '63-T5-US-UNIBODY-SQUARE-HOUSING_share.jpg', NULL, '', '', '2019-06-21', '2019-06-21', '', 18, 'E', '116.74.112.172', 'Yes', '', 'Yes', ''),
(64, 25, 'T5 US SPLIT SQUARE AL BATTEN', 'T5 US SPLIT SQUARE AL BATTEN', 'T5', '<table style=\"height: 297px;\" width=\"664\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n</tr>\r\n<tr>\r\n<td>WATTAGE</td>\r\n<td>5W/10W/18W/20W/22W/24W/36W</td>\r\n</tr>\r\n<tr>\r\n<td>CCT</td>\r\n<td>3000K/4000K/6500K/3CCT/RGB</td>\r\n</tr>\r\n<tr>\r\n<td>LUMENS/WATT</td>\r\n<td>100LM/120LM</td>\r\n</tr>\r\n<tr>\r\n<td>PF</td>\r\n<td>&gt;0.9</td>\r\n</tr>\r\n<tr>\r\n<td>CRI</td>\r\n<td>&gt;80</td>\r\n</tr>\r\n<tr>\r\n<td>SURGE</td>\r\n<td>2.5KV</td>\r\n</tr>\r\n<tr>\r\n<td>INPUT VOLTAGE</td>\r\n<td>150-270V</td>\r\n</tr>\r\n<tr>\r\n<td>MATERIAL</td>\r\n<td>AL</td>\r\n</tr>\r\n<tr>\r\n<td>SIZE</td>\r\n<td>1ft/2ft/4ft</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Batten', '-', '', NULL, '', '', 'Yes', 'T5 US SPLIT SQUARE AL BATTEN.pdf', '64-T5-US-SPLIT-SQUARE-AL-BATTEN_location.jpg', '64-T5-US-SPLIT-SQUARE-AL-BATTEN_thumb.jpg', '64-T5-US-SPLIT-SQUARE-AL-BATTEN_share.jpg', NULL, '', '', '2019-06-21', '2019-06-21', '', 19, 'E', '116.74.112.172', 'Yes', '', 'Yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `pTypeID` int(11) NOT NULL,
  `pTypeTitle` varchar(50) NOT NULL,
  `projectFile` varchar(100) DEFAULT NULL,
  `pTypeDescr` text,
  `pTypeParent` int(11) NOT NULL DEFAULT '0',
  `createdate` date NOT NULL DEFAULT '1970-01-01',
  `modifieddate` date DEFAULT '1970-01-01',
  `username` varchar(20) NOT NULL,
  `sortorder` int(5) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `HasProject` char(1) NOT NULL DEFAULT 'N',
  `remote_ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`pTypeID`, `pTypeTitle`, `projectFile`, `pTypeDescr`, `pTypeParent`, `createdate`, `modifieddate`, `username`, `sortorder`, `status`, `HasProject`, `remote_ip`) VALUES
(22, 'Batten', '', '<p>Batten</p>', 0, '2019-06-01', '1970-01-01', 'Keyur', 1, 'E', 'N', '::1'),
(25, 'T5 batten', '', '<p>T5 batten</p>', 22, '2019-06-01', '1970-01-01', 'Keyur', 3, 'E', 'Y', '::1'),
(27, 'Accessories', 'lark-belt-printer.png', '<p>dgfhgfghj</p>', 0, '2019-06-06', '1970-01-01', 'Keyur', 5, 'E', 'N', '::1'),
(28, 'T8 ACCESSORIES', 'lark-belt-printer.png', '<p>T8 ACCESSORIES</p>', 27, '0000-00-00', '1970-01-01', 'Keyur', 6, 'E', 'Y', '123.201.2.173');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `pTypeID` int(11) NOT NULL,
  `projectTitle` varchar(100) NOT NULL,
  `projectTypeTitle` varchar(50) NOT NULL,
  `projectDescr` text NOT NULL,
  `projectStatus` varchar(25) NOT NULL,
  `projectBS` varchar(10) NOT NULL,
  `projectArea` varchar(200) DEFAULT NULL,
  `projectUnits` varchar(100) NOT NULL,
  `projectAbout` text,
  `projectPlans` text,
  `projectBrochure` varchar(200) DEFAULT NULL,
  `conceptPresentation` varchar(200) DEFAULT NULL,
  `projectLocation` varchar(200) DEFAULT NULL,
  `projectThumbnail` varchar(100) DEFAULT NULL,
  `projectSpeciality` text,
  `projectVideo` text,
  `projectVideoUrl` varchar(200) DEFAULT NULL,
  `projectsUrl` varchar(200) DEFAULT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `sortorder` int(5) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `remote_ip` varchar(20) NOT NULL,
  `hasForm` varchar(6) DEFAULT 'No',
  `hasmasterplan` varchar(6) DEFAULT 'No',
  `hasWhy` varchar(6) DEFAULT 'Yes',
  `hasmainFeatures` varchar(6) DEFAULT 'No',
  `hasexclusiveServices` varchar(6) DEFAULT 'No',
  `projectWhy` text,
  `mainFeatures` text,
  `mobilemainfeatures` text,
  `exclusiveServices` text,
  `mobileexclusiveservices` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `pTypeID`, `projectTitle`, `projectTypeTitle`, `projectDescr`, `projectStatus`, `projectBS`, `projectArea`, `projectUnits`, `projectAbout`, `projectPlans`, `projectBrochure`, `conceptPresentation`, `projectLocation`, `projectThumbnail`, `projectSpeciality`, `projectVideo`, `projectVideoUrl`, `projectsUrl`, `createdate`, `modifieddate`, `username`, `sortorder`, `status`, `remote_ip`, `hasForm`, `hasmasterplan`, `hasWhy`, `hasmainFeatures`, `hasexclusiveServices`, `projectWhy`, `mainFeatures`, `mobilemainfeatures`, `exclusiveServices`, `mobileexclusiveservices`) VALUES
(5, 9, 'demo project', '', '', 'Ongoing', '', '', '', NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2015-10-29', '0000-00-00', '', 1, 'E', '192.168.2.105', 'Yes', 'No', 'No', 'No', 'No', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `project_gallery`
--

CREATE TABLE `project_gallery` (
  `galleryID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL DEFAULT '0',
  `galleryTitle` varchar(100) NOT NULL DEFAULT '',
  `galleryImage` varchar(100) NOT NULL,
  `type` char(1) NOT NULL DEFAULT 'G',
  `sortorder` int(3) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `username` varchar(50) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `remote_ip` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_gallery`
--

INSERT INTO `project_gallery` (`galleryID`, `projectID`, `galleryTitle`, `galleryImage`, `type`, `sortorder`, `status`, `username`, `createdate`, `modifieddate`, `remote_ip`) VALUES
(22, 5, 'demo image', '22-Tulips.jpg', 'G', 6, 'E', '', '0000-00-00', '0000-00-00', '192.168.2.136'),
(21, 5, 'Image 4', '21-Chrysanthemum.jpg', 'G', 4, 'E', 'Keyur', '0000-00-00', '2016-01-09', '192.168.2.136'),
(18, 0, 'Image 1', 'Koala.jpg', 'G', 1, 'E', 'Keyur', '0000-00-00', '2016-01-09', '192.168.2.136'),
(19, 0, 'Image 2', 'Koala.jpg', 'G', 2, 'E', 'Keyur', '0000-00-00', '2016-01-09', '192.168.2.136'),
(23, 5, 'title1', '23-Lighthouse.jpg', 'G', 1, 'E', '', '0000-00-00', '0000-00-00', '192.168.2.133'),
(24, 5, 'title2', '24-Penguins.jpg', 'G', 2, 'E', '', '0000-00-00', '0000-00-00', '192.168.2.133'),
(25, 5, 'title3', '25-Tulips.jpg', 'G', 3, 'E', '', '0000-00-00', '0000-00-00', '192.168.2.133');

-- --------------------------------------------------------

--
-- Table structure for table `project_slider`
--

CREATE TABLE `project_slider` (
  `sliderID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL DEFAULT '0',
  `sliderTitle` varchar(100) NOT NULL DEFAULT '',
  `sliderImage` text NOT NULL,
  `isFront` char(1) NOT NULL DEFAULT 'E',
  `sortorder` int(3) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `username` varchar(50) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `remote_ip` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `researchID` int(11) NOT NULL,
  `researchTitle` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `file` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `sortorder` int(8) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `remote_ip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`researchID`, `researchTitle`, `type`, `file`, `username`, `createdate`, `modifieddate`, `sortorder`, `status`, `remote_ip`) VALUES
(1, 'Biomedical Engeneering', 'General', '1-Biomedical Engeneering-2.pdf', 'Keyur', '2017-11-13', '2017-11-13', 1, 'E', '127.0.0.1'),
(2, 'Cryotherapy for Beauty', 'Beauty', '2-Beauty.docx', 'Keyur', '2017-11-13', '2017-11-23', 2, 'E', '123.201.249.64'),
(3, 'Athletic Recovery', 'Fitness', '3-Athletic-Recovery.docx', 'Keyur', '2017-11-13', '2017-11-22', 3, 'E', '207.244.89.90'),
(5, 'Delayed onset muscle soreness', 'Pain', '5-Delayed onset muscle soreness.pdf', 'Keyur', '2017-11-13', '2017-11-13', 5, 'E', '127.0.0.1'),
(7, 'Aerobic and Anaerobic capacity and on selected blood count parameters', 'Fitness', '7-Impact of 10 sessions on aerobic and anaerobic capacity and on selected blood count parameters.pdf', 'Keyur', '2017-11-21', '0000-00-00', 7, 'E', '123.201.241.248'),
(8, 'WBC in Athlets', 'Fitness', '8-Whole-Body-Cryotherapy-in-Athletes.pdf', 'Keyur', '2017-11-21', '0000-00-00', 8, 'E', '123.201.241.248'),
(9, 'Serum mediators of inflammation and serum muscle enzymes in athletes', 'Fitness', '9-Serum mediators of inflammation and serum muscle enzymes in athletes.pdf', 'Keyur', '2017-11-21', '0000-00-00', 9, 'E', '123.201.241.248'),
(10, 'Body Performance', 'Fitness', '10-Body-performance.pdf', 'Keyur', '2017-11-21', '0000-00-00', 10, 'E', '123.201.241.248'),
(11, 'Hormonal changes in soccer players', 'Fitness', '11-Hormones in professional soccer players.pdf', 'Keyur', '2017-11-21', '0000-00-00', 11, 'E', '123.201.241.248'),
(12, 'Hormonal Response ', 'Health & Wellness', '12-Hormones in professional soccer players.pdf', 'Keyur', '2017-11-21', '0000-00-00', 12, 'E', '123.201.241.248'),
(13, 'Benifits on Sport Haemolysis', 'Fitness', '13-Sport Haemolysis.pdf', 'Keyur', '2017-11-21', '2017-11-22', 13, 'E', '207.244.89.90'),
(14, 'cryotherapy for Yoga Lovers', 'Fitness', '14-Yoga-Lovers.pdf', 'Keyur', '2017-11-21', '2017-11-23', 14, 'E', '123.201.249.64'),
(16, 'Thermal responses during and After Therapy', 'General', '16-Thermal responses during and after.pdf', 'Keyur', '2017-11-21', '0000-00-00', 16, 'E', '123.201.241.248'),
(17, 'Three Levels of Influence ', 'General', '17-Whole-Body-Cryotherapy-an-overview-of-benefits.pdf', 'Keyur', '2017-11-21', '2017-11-21', 17, 'E', '123.201.241.248'),
(18, 'Antioxidant Capacity ', 'Health & Wellness', '18-Improving Antioxidant Capacity in Healthy Men.pdf', 'Keyur', '2017-11-21', '0000-00-00', 18, 'E', '123.201.241.248'),
(19, 'Depressive and Anxiety disorders', 'Health & Wellness', '19-Depression-and-Anxiety.pdf', 'Keyur', '2017-11-21', '0000-00-00', 19, 'E', '123.201.241.248'),
(20, 'Primary Insomnia', 'Health & Wellness', '20-Primary Insomnia.pdf', 'Keyur', '2017-11-21', '0000-00-00', 20, 'E', '123.201.241.248'),
(21, 'Secondary Insomnia', 'Health & Wellness', '21-Secondary Insomnia.pdf', 'Keyur', '2017-11-21', '0000-00-00', 21, 'E', '123.201.241.248'),
(22, 'Mental Health ', 'Health & Wellness', '22-Mental-Health.pdf', 'Keyur', '2017-11-21', '0000-00-00', 22, 'E', '123.201.241.248'),
(23, 'Preventive Medicine', 'Health & Wellness', '23-Mental-Health.pdf', 'Keyur', '2017-11-21', '0000-00-00', 23, 'E', '123.201.241.248'),
(24, 'Pain-dependent Sleep disorders', 'Health & Wellness', '24-sleep disorder.pdf', 'Keyur', '2017-11-21', '0000-00-00', 24, 'E', '123.201.241.248'),
(25, 'Alzheimer\'s disease', 'Health & Wellness', '25-The prevention of Alzheimerâ€™s disease.pdf', 'Keyur', '2017-11-21', '0000-00-00', 25, 'E', '123.201.241.248'),
(26, 'Fibromylgia', 'Pain', '26-FIBROMYALGIA-SYNDROMES.pdf', 'Keyur', '2017-11-21', '0000-00-00', 26, 'E', '123.201.241.248'),
(27, 'Frozen Shoulder ', 'Pain', '27-Treating frozen shoulder.pdf', 'Keyur', '2017-11-21', '0000-00-00', 27, 'E', '123.201.241.248'),
(28, 'Inflammation', 'Pain', '28-Different amounts of sessions on chosen pro- and anti-inflammatory cytokines levels in healthy men.pdf', 'Keyur', '2017-11-21', '0000-00-00', 28, 'E', '123.201.241.248'),
(29, 'Lower Back Pain', 'Pain', '29-Low-Back-Pain-2.pdf', 'Keyur', '2017-11-21', '0000-00-00', 29, 'E', '123.201.241.248'),
(30, 'Multiple Sclerosis', 'Pain', '30-Multiple-Sclerosis-2.pdf', 'Keyur', '2017-11-21', '0000-00-00', 30, 'E', '123.201.241.248'),
(31, 'Muscle Damage', 'Pain', '31-Proprioception and Muscle Damage.pdf', 'Keyur', '2017-11-21', '0000-00-00', 31, 'E', '123.201.241.248'),
(32, 'Pain and Spasticity', 'Pain', '32-Pain and Spasticity.pdf', 'Keyur', '2017-11-21', '0000-00-00', 32, 'E', '123.201.241.248'),
(33, 'Osteoarthritis', 'Pain', '33-Thermotherapy for treatment of osteoarthritis.pdf', 'Keyur', '2017-11-21', '0000-00-00', 33, 'E', '123.201.241.248'),
(34, 'Cryotherapy for Psoriasis', 'Beauty', '34-psoriasis.pdf', 'Keyur', '2017-11-21', '2017-11-22', 34, 'E', '207.244.89.90'),
(35, 'Rheumatic Diseases', 'Pain', '35-Rheumatic-Diseases.pdf', 'Keyur', '2017-11-21', '0000-00-00', 35, 'E', '123.201.241.248'),
(36, 'Spinal Syndromes', 'Pain', '36-Spinal syndrome.pdf', 'Keyur', '2017-11-21', '0000-00-00', 36, 'E', '123.201.241.248'),
(37, 'Cryotherapy for Weight Loss', 'Weight loss', '37-weightloss (brown adipose tissue oxidative metabolism).pdf', 'Keyur', '2017-11-21', '2017-11-23', 37, 'E', '123.201.249.64'),
(38, 'Weight Management', 'Weight loss', '38-Weight-Management-Option.pdf', 'Keyur', '2017-11-21', '2017-11-23', 38, 'E', '123.201.249.64'),
(39, 'Cryotherapy for Radiant Skin', 'Beauty', '39-Cryo Facial-2.pdf', 'Keyur', '2017-11-21', '2017-11-23', 39, 'E', '123.201.249.64'),
(40, 'Cryotherapy for Anti-ageing', 'Beauty', '40-Defy-the-Ageing-Process.pdf', 'Keyur', '2017-11-21', '2017-11-22', 40, 'E', '207.244.89.90');

-- --------------------------------------------------------

--
-- Table structure for table `seo_link_master`
--

CREATE TABLE `seo_link_master` (
  `seo_link_id` int(8) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `module_id` int(8) NOT NULL,
  `seo_slug` varchar(255) NOT NULL,
  `user_id` int(8) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `remote_ip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seo_link_master`
--

INSERT INTO `seo_link_master` (`seo_link_id`, `module_name`, `module_id`, `seo_slug`, `user_id`, `createdate`, `modifieddate`, `remote_ip`) VALUES
(164, 'pages', 17, 'mission', 4, '2017-06-06 11:03:29', '2019-05-31 10:38:55', '::1'),
(163, 'pages', 16, 'vission', 4, '2017-05-27 09:14:02', '2019-05-31 10:38:34', '::1'),
(162, 'pages', 15, '', 4, '2017-05-27 09:13:47', '2019-06-21 08:50:20', '116.74.112.172'),
(161, 'pages', 14, '', 4, '2017-05-27 09:13:20', '2019-06-21 08:49:46', '116.74.112.172'),
(146, 'benefit', 45, 'cryo-pain', 4, '2017-05-19 18:20:24', '2017-07-29 17:20:48', '127.0.0.1'),
(138, 'benefit', 19, 'cryo-health-amp-wellness', 4, '2017-05-17 11:05:16', '2017-07-29 16:46:45', '127.0.0.1'),
(137, 'benefit', 18, 'cryo-beauty', 4, '2017-05-17 11:01:43', '2017-09-26 11:09:46', '123.201.2.173'),
(147, 'benefit', 46, 'cryo-fitness', 4, '2017-05-19 18:24:03', '2017-07-29 17:16:17', '127.0.0.1'),
(148, 'benefit', 47, 'cryo-weight-loss', 4, '2017-05-19 18:27:23', '2017-07-29 16:49:50', '127.0.0.1'),
(149, 'pages', 10, 'how-cryo-therapy-works', 4, '2017-05-22 09:25:43', '2017-06-06 11:10:57', '127.0.0.1'),
(150, 'pages', 11, '', 4, '2017-05-22 11:21:11', '2019-06-21 08:50:52', '116.74.112.172'),
(270, 'projects/accessories/t8-accessories', 61, 't5-us-slim-round-housing', 4, '2019-06-21 14:44:38', '2019-06-21 14:44:38', '116.74.112.172'),
(152, 'services', 9, 'service1', 4, '2017-05-22 16:49:13', '2017-05-22 16:49:13', '127.0.0.1'),
(160, 'pages', 13, '', 4, '2017-05-24 17:04:18', '2019-06-21 08:49:25', '116.74.112.172'),
(154, 'services', 8, 'valuation', 4, '2017-05-22 16:57:50', '2017-05-22 16:57:50', '127.0.0.1'),
(155, 'services', 11, 'ts-us-unbody-square-batten', 4, '2017-05-22 17:13:25', '2019-05-30 15:41:09', '::1'),
(159, 'services', 15, 'facial-cryo', 4, '2017-05-22 17:21:44', '2017-07-08 13:59:18', '123.201.2.173'),
(157, 'services', 13, 'targeted-cryo', 4, '2017-05-22 17:16:28', '2017-06-05 17:10:51', '127.0.0.1'),
(158, 'services', 14, 'mir', 4, '2017-05-22 17:16:58', '2017-05-22 17:36:35', '127.0.0.1'),
(116, 'FAQ', 3, 'faq', 4, '2017-05-05 09:42:23', '2017-05-05 09:42:23', '127.0.0.1'),
(117, 'faq', 4, 'cryotherapy', 6, '2017-05-05 09:43:08', '2018-08-22 06:35:36', '60.254.22.150'),
(118, 'faq', 4, 'cryotherapy', 6, '2017-05-05 10:17:26', '2018-08-22 06:35:36', '60.254.22.150'),
(165, 'personality', 16, 'p1', 4, '2017-11-13 14:48:03', '2017-11-13 14:48:03', '127.0.0.1'),
(166, 'personality', 17, 'p2', 4, '2017-11-13 14:49:00', '2017-11-13 14:49:00', '127.0.0.1'),
(167, 'personality', 18, 'p3', 4, '2017-11-13 14:52:21', '2017-11-13 14:52:21', '127.0.0.1'),
(168, 'personality', 1, 'cristiano-ronaldo', 4, '2017-11-13 15:12:36', '2017-11-14 08:00:57', '175.100.148.240'),
(169, 'personality', 2, 'jessica-alba', 4, '2017-11-13 15:13:36', '2017-11-14 10:55:35', '175.100.148.240'),
(170, 'personality', 3, 'derek-hough', 4, '2017-11-13 15:15:00', '2017-11-14 10:53:33', '175.100.148.240'),
(171, 'personality', 4, 'kobe-bryant', 4, '2017-11-13 15:16:22', '2017-11-14 08:10:24', '175.100.148.240'),
(172, 'personality', 5, 'mandy-moore', 4, '2017-11-13 15:17:08', '2017-11-14 08:07:07', '175.100.148.240'),
(173, 'personality', 6, 'daniel-craig', 4, '2017-11-14 08:05:29', '2017-11-14 08:05:29', '175.100.148.240'),
(174, 'personality', 7, 'floyd-mayweather', 4, '2017-11-14 11:00:59', '2017-11-14 11:00:59', '175.100.148.240'),
(175, 'personality', 8, 'usian-bolt', 4, '2017-11-14 11:03:34', '2017-11-14 11:03:34', '175.100.148.240'),
(176, 'personality', 9, 'mark-webber', 4, '2017-11-14 11:07:01', '2017-11-14 11:07:01', '175.100.148.240'),
(177, 'personality', 10, 'lebron-james', 4, '2017-11-14 11:09:31', '2017-11-14 11:09:31', '175.100.148.240'),
(178, 'personality', 11, 'demi-moore', 4, '2017-11-14 11:14:08', '2017-11-14 11:14:08', '175.100.148.240'),
(179, 'personality', 12, 'tony-ribbons', 4, '2017-11-14 11:50:14', '2017-11-14 11:50:14', '175.100.148.240'),
(180, 'Testimonial', 1, 'cosmetic', 4, '2017-12-29 12:44:51', '2017-12-29 12:44:51', '123.201.225.120'),
(181, 'Testimonial', 3, 'imaging', 4, '2017-12-29 12:44:57', '2017-12-29 12:44:57', '123.201.225.120'),
(182, 'faq', 5, 'normatec', 6, '2018-08-22 06:35:14', '2018-08-22 06:35:14', '60.254.22.150'),
(183, 'benefit', 48, 'cryo-slimming', 6, '2018-08-22 07:11:06', '2018-11-02 05:42:24', '116.74.112.172'),
(184, 'benefit', 49, 'cryo-lifting', 6, '2018-08-22 07:28:05', '2018-10-02 09:12:37', '116.74.112.172'),
(185, 'services', 16, 'normatec', 6, '2018-08-22 08:05:21', '2018-09-10 08:17:52', '123.201.2.173'),
(186, 'services', 17, 'cryo-t-shock', 6, '2018-11-02 05:58:33', '2018-11-02 07:24:45', '123.201.2.173'),
(187, 'pages', 1, 'our-philosophy', 3, '2019-04-26 14:03:20', '2019-08-02 12:10:19', '::1'),
(188, 'pages', 3, 'works', 3, '2019-04-26 14:03:28', '2019-08-02 13:27:09', '::1'),
(189, 'services', 19, 'ts-us-split-square-batten', 4, '2019-05-04 18:55:59', '2019-05-30 13:06:13', '::1'),
(190, 'services', 18, 'ts-us-unbody-mushroom-batten', 4, '2019-05-04 18:56:08', '2019-05-30 13:05:22', '::1'),
(191, 'services', 20, 'ts-us-slim-square-batten', 4, '2019-05-04 19:13:35', '2019-05-30 14:11:21', '::1'),
(192, 'services', 21, 'ts-us-slim-round-batten', 4, '2019-05-06 16:45:37', '2019-05-30 14:11:40', '::1'),
(193, 'pages', 39, 'footer-about', 6, '2019-05-20 10:50:41', '2019-05-20 10:54:50', '192.168.0.17'),
(194, 'services', 22, 'ts-us-mushroom-batten', 4, '2019-05-20 11:26:11', '2019-05-30 14:11:49', '::1'),
(195, 'services', 23, 'ts-us-angular-mushroom-batten', 4, '2019-05-20 11:29:59', '2019-05-30 14:11:17', '::1'),
(196, 'services', 24, 'ts-mushroom-hosuing', 4, '2019-05-20 11:32:00', '2019-05-30 14:07:52', '::1'),
(197, 'pages', 6, '', 4, '2019-05-28 16:15:22', '2019-06-11 19:01:51', '::1'),
(198, 'services', 25, 't8-retrofit', 4, '2019-05-30 14:08:58', '2019-05-30 14:09:40', '::1'),
(199, 'services', 26, 'led-driver', 4, '2019-05-30 14:15:28', '2019-05-30 14:15:39', '::1'),
(200, 'services', 27, 'led-pcb', 4, '2019-05-30 14:16:37', '2019-05-30 14:16:37', '::1'),
(201, 'services', 28, 'ts-us-angular-mushroom-housing', 4, '2019-05-30 14:17:11', '2019-05-30 14:17:11', '::1'),
(202, 'services', 29, 'ts-us-mashroom-pc-al-housing', 4, '2019-05-30 14:18:05', '2019-05-30 14:18:05', '::1'),
(203, 'services', 30, 'ts-us-square-pc-al-housing', 4, '2019-05-30 14:18:37', '2019-05-30 14:18:37', '::1'),
(226, 'projects', 22, 'batten', 4, '2019-06-01 16:53:48', '2019-06-01 16:53:48', '::1'),
(229, 'projects/batten', 25, 't5-batten', 4, '2019-06-01 16:55:57', '2019-06-01 16:55:57', '::1'),
(230, 'projects/batten/t5-batten', 37, 't5-us-unibody-square-batten', 4, '2019-06-01 16:57:20', '2019-06-22 14:31:13', '116.74.112.172'),
(231, 'projects/batten', 38, 't5-us-unbody-mushroom-batten', 6, '2019-06-03 18:38:23', '2019-06-03 18:38:23', '::1'),
(232, 'projects/batten/t5-batten', 39, 't5-us-unibody-mushroom-batten', 4, '2019-06-03 18:43:36', '2019-06-22 14:30:56', '116.74.112.172'),
(233, 'projects/batten/t5-batten', 40, 't5-us-split-square-batten', 6, '2019-06-04 10:44:15', '2019-06-04 10:45:03', '::1'),
(234, 'projects/batten/t5-batten', 41, 't5-us-slim-square-batten', 6, '2019-06-04 10:49:52', '2019-06-04 10:49:52', '::1'),
(235, 'projects/batten/t5-batten', 42, 't5-us-slim-round-batten', 6, '2019-06-04 11:02:06', '2019-06-04 11:02:06', '::1'),
(236, 'projects/batten/t5-batten', 43, 't5-us-mushroom-batten', 6, '2019-06-04 11:06:29', '2019-06-04 11:06:29', '::1'),
(237, 'projects/batten/t5-batten', 44, 't5-us-angular-mushroom-batten', 6, '2019-06-04 11:08:48', '2019-06-04 11:08:48', '::1'),
(238, 'projects/batten/t5-batten', 45, 't5-mashroom-housing', 4, '2019-06-04 11:11:06', '2019-06-06 14:47:00', '123.201.2.173'),
(239, 'projects/batten/t5-batten', 46, 't8-retrofit', 6, '2019-06-04 11:17:05', '2019-06-04 11:17:05', '::1'),
(241, '/t8-batten', 47, 'sdfcs', 4, '2019-06-06 14:12:35', '2019-06-06 14:33:05', '::1'),
(242, 'projects', 27, 'accessories', 4, '2019-06-06 14:30:40', '2019-06-06 14:39:55', '::1'),
(243, 'projects/ac', 28, '1233', 4, '2019-06-06 14:31:07', '2019-06-06 14:31:07', '::1'),
(244, 'projects/ac/1233', 48, 'eryrtt', 4, '2019-06-06 14:32:23', '2019-06-06 14:32:23', '::1'),
(245, '/t8-accessories', 48, 'led-driver', 4, '2019-06-06 14:22:14', '2019-06-06 14:29:19', '116.74.112.172'),
(246, 'projects/accessories/t8-accessories', 49, 'wsfsdfg', 4, '2019-06-06 14:30:45', '2019-06-06 14:30:45', '116.74.112.172'),
(247, 'projects/accessories/t8-accessories', 50, 'szrhgdsg', 4, '2019-06-06 14:31:36', '2019-06-06 14:31:36', '116.74.112.172'),
(248, 'projects/accessories/t8-accessories', 51, 'led-driver', 4, '2019-06-06 14:35:16', '2019-06-06 14:35:16', '123.201.2.173'),
(249, '/t8-accessories', 51, 'led-driver', 4, '2019-06-06 14:35:46', '2019-06-06 14:35:46', '123.201.2.173'),
(250, 'projects/accessories/t8-accessories', 52, 'led-pcb', 4, '2019-06-06 14:38:55', '2019-06-06 14:38:55', '123.201.2.173'),
(251, 'projects/accessories/t8-accessories', 53, 't5-us-angular-mushroom-housing', 4, '2019-06-06 14:41:19', '2019-06-06 14:41:19', '123.201.2.173'),
(252, 'projects/accessories/t8-accessories', 54, 't5-us-mashroom-ac-pl-body', 4, '2019-06-06 14:43:30', '2019-06-06 14:43:30', '123.201.2.173'),
(253, 'projects/accessories/t8-accessories', 55, 't5-us-square-ac-pl-hosuing', 4, '2019-06-06 14:44:32', '2019-06-06 14:44:32', '123.201.2.173'),
(254, '/t8-accessories', 54, 't5-us-mashroom-al-housing', 4, '2019-06-06 14:56:04', '2019-06-06 15:14:58', '123.201.2.173'),
(255, 'projects/accessories/t8-accessories', 56, 't5-us-mashroom-pl-housing', 4, '2019-06-06 14:57:13', '2019-06-06 14:57:13', '123.201.2.173'),
(256, '/t8-accessories', 56, 't5-us-mashroom-pc-housing', 4, '2019-06-06 15:15:53', '2019-06-06 15:16:53', '123.201.2.173'),
(257, 'projects/accessories/t8-accessories', 57, 't5-us-mashroom-pc-housing', 4, '2019-06-06 15:18:31', '2019-06-06 15:18:31', '123.201.2.173'),
(258, '/t8-accessories', 57, 't5-us-mushroom-pc-housing', 4, '2019-06-06 15:18:55', '2019-06-22 14:29:24', '116.74.112.172'),
(259, 'projects/accessories/t8-accessories', 58, 't5-us-mashroom-al-housing', 4, '2019-06-06 15:21:20', '2019-06-06 15:21:20', '123.201.2.173'),
(260, 'projects/accessories/t8-accessories', 59, 't5-us-square-al-housing', 4, '2019-06-06 15:26:28', '2019-06-06 15:26:28', '123.201.2.173'),
(261, '/t8-accessories', 59, 't5-us-square-al-housing', 4, '2019-06-06 15:26:55', '2019-06-06 15:26:55', '123.201.2.173'),
(262, 'projects/accessories/t8-accessories', 60, 't5-us-square-pc-housing', 4, '2019-06-06 15:29:04', '2019-06-06 15:29:04', '123.201.2.173'),
(263, 'pages', 7, '', 4, '2019-06-11 19:02:01', '2019-06-11 19:04:37', '::1'),
(264, 'pages', 34, '', 4, '2019-06-11 19:06:04', '2019-06-11 19:06:04', '::1'),
(266, '/t8-accessories', 52, 'led-pcb', 4, '2019-06-12 11:06:18', '2019-06-25 07:46:00', '116.74.112.172'),
(271, 'projects/accessories/t8-accessories', 62, 't5-us-slim-square-housing', 4, '2019-06-21 14:45:51', '2019-06-21 14:45:51', '116.74.112.172'),
(272, 'projects/accessories/t8-accessories', 63, 't5-us-unibody-square-housing', 4, '2019-06-21 14:46:49', '2019-06-21 14:46:49', '116.74.112.172'),
(273, 'projects/batten/t5-batten', 64, 't5-us-split-square-al-batten', 4, '2019-06-21 14:47:42', '2019-06-21 14:47:42', '116.74.112.172'),
(274, '/t8-accessories', 58, 't5-us-mushroom-al-housing', 4, '2019-06-22 14:29:35', '2019-06-22 14:29:35', '116.74.112.172'),
(275, 'gallery', 11, 'certificate', 4, '2019-07-09 11:51:28', '2019-07-09 11:51:28', '116.74.112.172'),
(276, 'pages', 2, 'what-s-happening', 4, '2019-07-27 17:33:04', '2019-08-23 16:26:24', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceID` int(11) NOT NULL,
  `serviceTitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `shortdescription` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `sortorder` int(8) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date DEFAULT NULL,
  `remote_ip` varchar(100) NOT NULL,
  `downloadbrochure` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `serviceTitle`, `image`, `description`, `shortdescription`, `username`, `status`, `sortorder`, `createdate`, `modifieddate`, `remote_ip`, `downloadbrochure`) VALUES
(11, 'TS US UNBODY SQUARE BATTEN', '11-ts_us_unbody_sqaure_batten.jpg', '<p>The ideal choice for your everyday lighting requirements, the T5 Batten gives a linear uniform light. The T5 does not need maintenance, while also helping you manage and save electricity more effectively. Efficient in all areas of usage, these tube lights are just what you need to light up your spaces. These tube lights are light in weight and are slimmer making the installation hassle-free. The long life and power saving feature make it a must-have for you.</p>', '<p>TS</p>', 'Keyur', 'E', 1, '2017-05-22', '2019-05-30', '::1', ''),
(18, 'TS US UNBODY MUSHROOM BATTEN', '18-ts_us_unbody_mashroom_batten.jpg', '<p>Efficient and energy-saving, the T8 Batten is perfect for home and office use. The light-weight body along with strong fixtures makes it easy for installation. The T8 Batten promises a longer run time with limited power consumption. Available in different sizes, this tube light is maintenance-free and is value for money.</p>', '<p>US&nbsp;</p>', 'Keyur', 'E', 2, '2019-05-04', '2019-05-30', '::1', ''),
(19, 'TS US SPLIT SQUARE BATTEN', '19-ts_us_split_square_batten.jpg', '<p>conomical and efficient, the bulb is a clever choice for installation for your spaces. The cutting-edge plastic-aluminium thermal management prevents the bulb from over-heating. It takes up less power, making it energy-efficient. A versatile product in every way, the bulb can be used to brighten up various places. Economical, environmentally friendly and a power saver, this bulb has it all.</p>', '<p>US</p>', 'Keyur', 'E', 2, '2019-05-04', '2019-05-30', '::1', ''),
(21, 'TS US SLIM ROUND BATTEN', '21-ts_us_slim_round_batten.jpg', '<p>Powerful and maintenance free, the street lights by J Korin Optoelectronics stand out in every way. Walk and drive with confidence with these street lights. Made to light up larger areas, the street lights provide with optimum visibility. They can also be used to light up parks or large campuses with the</p>', '<p>TS</p>', 'Keyur', 'E', 11, '2019-05-06', '2019-05-30', '::1', ''),
(20, 'TS US SLIM SQUARE BATTEN', '20-ts_us_slim_square_batten.jpg', '<p>A smart choice for offices, factories and workshops the Industrial lights are compact yet strong enough to light up your workplaces. The lights are made in such a manner that they can endure harshest of industrial conditions. Perfect for installation for outdoors as well as indoors, the lights are long-lasting and energy saving. The lights maximise the visibility, giving you a trouble-free and efficient result.</p>', '<p>TS&nbsp;</p>', 'Keyur', 'E', 10, '2019-05-04', '2019-05-30', '::1', ''),
(22, 'TS US MUSHROOM BATTEN', '22-ts_us_mashroom_batten.jpg', '<p>The ideal choice for your everyday lighting requirements, the T5 Batten gives a linear uniform light. The T5 does not need maintenance, while also helping you manage and save electricity more effectively. Efficient in all areas of usage, these tube lights are just what you need to light up your spaces. These tube lights are light in weight and are slimmer making the installation hassle-free. The long life and power saving feature make it a must-have for you.</p>', '<p>TS</p>', 'Keyur', 'E', 12, '2019-05-20', '2019-05-30', '::1', ''),
(23, 'TS US ANGULAR MUSHROOM BATTEN', '23-ts_us_anglular_mashroom_batten.jpg', '<p>The ideal choice for your everyday lighting requirements, the T5 Batten gives a linear uniform light. The T5 does not need maintenance, while also helping you manage and save electricity more effectively. Efficient in all areas of usage, these tube lights are just what you need to light up your spaces. These tube lights are light in weight and are slimmer making the installation hassle-free. The long life and power saving feature make it a must-have for you.</p>', '<p>TS</p>', 'Keyur', 'E', 13, '2019-05-20', '2019-05-30', '::1', ''),
(24, 'TS MUSHROOM HOSUING', '24-ts_mashroom_housing.jpg', '<p>The ideal choice for your everyday lighting requirements, the T5 Batten gives a linear uniform light. The T5 does not need maintenance, while also helping you manage and save electricity more effectively. Efficient in all areas of usage, these tube lights are just what you need to light up your spaces. These tube lights are light in weight and are slimmer making the installation hassle-free. The long life and power saving feature make it a must-have for you.</p>', '<p>TS</p>', 'Keyur', 'E', 14, '2019-05-20', '2019-05-30', '::1', ''),
(25, 'T8 RETROFIT', '25-t8_retrofit.jpg', '<p>The ideal choice for your everyday lighting requirements, the T5 Batten gives a linear uniform light. The T5 does not need maintenance, while also helping you manage and save electricity more effectively. Efficient in all areas of usage, these tube lights are just what you need to light up your spaces. These tube lights are light in weight and are slimmer making the installation hassle-free. The long life and power saving feature make it a must-have for you.</p>', '<p>T8</p>', 'Keyur', 'E', 15, '2019-05-30', '2019-05-30', '::1', ''),
(26, 'LED DRIVER', '26-led.jpg', '<p>The ideal choice for your everyday lighting requirements, the T5 Batten gives a linear uniform light. The T5 does not need maintenance, while also helping you manage and save electricity more effectively. Efficient in all areas of usage, these tube lights are just what you need to light up your spaces. These tube lights are light in weight and are slimmer making the installation hassle-free. The long life and power saving feature make it a must-have for you.</p>', '<p>LED</p>', 'Keyur', 'E', 16, '2019-05-30', '2019-05-30', '::1', ''),
(27, 'LED PCB', '27-led_pcb.jpg', '<p>&lt;p&gt;The ideal choice for your everyday lighting requirements, the T5 Batten gives a linear uniform light. The T5 does not need maintenance, while also helping you manage and save electricity more effectively. Efficient in all areas of usage, these tube lights are just what you need to light up your spaces. These tube lights are light in weight and are slimmer making the installation hassle-free. The long life and power saving feature make it a must-have for you.&lt;/p&gt;</p>', '<p>LED</p>', 'Keyur', 'E', 17, '2019-05-30', NULL, '::1', ''),
(28, 'TS US ANGULAR MUSHROOM HOUSING', '28-ts_us_angular_mashroom_housing.jpg', '<p>&lt;p&gt;The ideal choice for your everyday lighting requirements, the T5 Batten gives a linear uniform light. The T5 does not need maintenance, while also helping you manage and save electricity more effectively. Efficient in all areas of usage, these tube lights are just what you need to light up your spaces. These tube lights are light in weight and are slimmer making the installation hassle-free. The long life and power saving feature make it a must-have for you.&lt;/p&gt;</p>', '<p>TS</p>', 'Keyur', 'E', 18, '2019-05-30', NULL, '::1', ''),
(29, 'TS US MASHROOM PC/AL HOUSING', '29-ts_us_mashroom_ac_pl_body.jpg', '<p>&lt;p&gt;The ideal choice for your everyday lighting requirements, the T5 Batten gives a linear uniform light. The T5 does not need maintenance, while also helping you manage and save electricity more effectively. Efficient in all areas of usage, these tube lights are just what you need to light up your spaces. These tube lights are light in weight and are slimmer making the installation hassle-free. The long life and power saving feature make it a must-have for you.&lt;/p&gt;</p>', '<p>TS</p>', 'Keyur', 'E', 19, '2019-05-30', NULL, '::1', ''),
(30, 'TS US SQUARE PC/AL HOUSING', '30-ts_us_square_ac_pl_housing.jpg', '<p>&lt;p&gt;The ideal choice for your everyday lighting requirements, the T5 Batten gives a linear uniform light. The T5 does not need maintenance, while also helping you manage and save electricity more effectively. Efficient in all areas of usage, these tube lights are just what you need to light up your spaces. These tube lights are light in weight and are slimmer making the installation hassle-free. The long life and power saving feature make it a must-have for you.&lt;/p&gt;</p>', '<p>TS</p>', 'Keyur', 'E', 20, '2019-05-30', NULL, '::1', '');

-- --------------------------------------------------------

--
-- Table structure for table `session_log_master`
--

CREATE TABLE `session_log_master` (
  `session_log_id` bigint(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `loginID` varchar(100) NOT NULL,
  `remote_ip` varchar(100) NOT NULL,
  `last_access` datetime NOT NULL,
  `status` char(1) NOT NULL COMMENT 'LogiIn(I) / Logout (O)'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_log_master`
--

INSERT INTO `session_log_master` (`session_log_id`, `user_id`, `loginID`, `remote_ip`, `last_access`, `status`) VALUES
(1, 3, 'admin-jainglass', '192.168.0.109', '2014-11-26 11:30:33', 'I'),
(2, 3, 'admin-jainglass', '192.168.0.11', '2014-11-26 13:00:10', 'I'),
(3, 3, 'admin-jainglass', '192.168.0.101', '2014-11-26 13:38:42', 'I'),
(4, 3, 'admin-jainglass', '192.168.0.11', '2014-11-26 13:45:52', 'O'),
(5, 3, 'admin-jainglass', '192.168.0.101', '2014-11-26 14:19:57', 'O'),
(6, 3, 'admin-jainglass', '192.168.0.101', '2014-11-26 14:20:34', 'I'),
(7, 3, 'admin-jainglass', '192.168.0.109', '2014-11-26 14:22:19', 'O'),
(8, 3, 'admin-jainglass', '192.168.0.109', '2014-11-26 14:22:29', 'I'),
(9, 3, 'admin-jainglass', '192.168.0.101', '2014-11-26 14:24:08', 'O'),
(10, 3, 'admin-jainglass', '192.168.0.109', '2014-11-26 14:24:14', 'O'),
(11, 3, 'admin-jainglass', '192.168.0.101', '2014-11-26 14:24:17', 'I'),
(12, 3, 'admin-jainglass', '192.168.0.109', '2014-11-26 14:24:24', 'I'),
(13, 3, 'admin-jainglass', '192.168.0.101', '2014-11-26 14:27:26', 'O'),
(14, 3, 'admin-jainglass', '192.168.0.101', '2014-11-26 14:27:46', 'I'),
(15, 3, 'admin-jainglass', '192.168.0.25', '2014-11-26 16:03:53', 'I'),
(16, 3, 'Adm-hindva', '192.168.0.14', '2014-11-26 17:00:10', 'O'),
(17, 3, 'admin-jainglass', '192.168.0.14', '2014-11-26 17:00:23', 'I'),
(18, 0, '', '192.168.0.25', '2014-11-26 17:30:22', 'O'),
(19, 3, 'admin-jainglass', '192.168.0.25', '2014-11-26 18:42:48', 'I'),
(20, 3, 'admin-jainglass', '192.168.0.25', '2014-11-26 19:25:01', 'O'),
(21, 3, 'admin-jainglass', '192.168.0.109', '2014-11-27 10:36:29', 'I'),
(22, 3, 'admin-jainglass', '192.168.0.25', '2014-11-27 11:05:57', 'I'),
(23, 3, 'admin-jainglass', '192.168.0.25', '2014-11-27 11:33:55', 'I'),
(24, 1, 'adm-trnl', '192.168.0.14', '2014-11-27 17:18:18', 'O'),
(25, 3, 'admin-jainglass', '192.168.0.14', '2014-11-27 17:18:56', 'I'),
(26, 3, 'admin-jainglass', '202.47.116.138', '2014-11-27 06:50:21', 'I'),
(27, 3, 'admin-jainglass', '202.47.116.138', '2014-11-27 06:50:46', 'I'),
(28, 3, 'admin-jainglass', '202.47.116.138', '2014-11-27 06:52:02', 'O'),
(29, 3, 'admin-jainglass', '202.47.116.138', '2014-11-27 06:52:06', 'I'),
(30, 3, 'admin-jainglass', '202.47.116.138', '2014-11-27 06:53:06', 'O'),
(31, 3, 'admin-jainglass', '202.47.116.138', '2014-11-29 02:00:08', 'I'),
(32, 3, 'admin-jainglass', '202.47.116.138', '2014-11-29 03:33:47', 'I'),
(33, 3, 'admin-jainglass', '202.47.116.138', '2014-11-29 03:33:53', 'I'),
(34, 3, 'admin-jainglass', '202.47.116.138', '2014-11-29 03:58:07', 'I'),
(35, 3, 'admin-jainglass', '202.47.116.138', '2014-11-29 04:11:22', 'I'),
(36, 3, 'admin-jainglass', '175.100.157.142', '2014-11-30 22:16:24', 'I'),
(37, 3, 'admin-jainglass', '175.100.157.142', '2014-11-30 22:16:42', 'I'),
(38, 3, 'admin-jainglass', '202.47.116.138', '2014-11-30 23:55:26', 'I'),
(39, 3, 'admin-jainglass', '202.47.116.138', '2014-12-01 00:03:34', 'I'),
(40, 3, 'admin-jainglass', '202.47.116.138', '2014-12-01 00:07:10', 'I'),
(41, 3, 'admin-jainglass', '202.47.116.138', '2014-12-01 00:33:12', 'O'),
(42, 3, 'admin-jainglass', '202.47.116.138', '2014-12-18 07:17:22', 'I'),
(43, 3, 'admin-jainglass', '202.47.116.138', '2014-12-18 07:37:56', 'I'),
(44, 3, 'admin-jainglass', '202.47.116.138', '2014-12-18 07:38:39', 'I'),
(45, 3, 'admin-jainglass', '202.47.116.138', '2014-12-18 22:53:13', 'I'),
(46, 3, 'admin-jainglass', '202.47.116.138', '2014-12-18 23:00:12', 'O'),
(47, 3, 'admin-jainglass', '202.47.116.138', '2014-12-19 00:10:50', 'I'),
(48, 3, 'admin-jainglass', '202.47.116.138', '2014-12-19 02:42:30', 'O'),
(49, 3, 'admin-jainglass', '202.47.116.138', '2014-12-20 02:05:52', 'I'),
(50, 3, 'admin-jainglass', '202.47.116.138', '2014-12-22 07:44:13', 'I'),
(51, 3, 'admin-jainglass', '202.47.116.138', '2014-12-22 07:57:00', 'O'),
(52, 3, 'admin-jainglass', '202.47.116.138', '2014-12-22 07:58:16', 'I'),
(53, 3, 'admin-jainglass', '202.47.116.138', '2014-12-22 07:58:32', 'O'),
(54, 3, 'admin-jainglass', '202.47.116.138', '2014-12-22 23:26:50', 'I'),
(55, 3, 'admin-jainglass', '202.47.116.138', '2014-12-24 00:54:03', 'I'),
(56, 3, 'admin-jainglass', '202.47.116.138', '2014-12-27 05:51:20', 'I'),
(57, 3, 'admin-jainglass', '202.47.116.138', '2014-12-27 05:57:28', 'I'),
(58, 3, 'admin-jainglass', '202.47.116.138', '2014-12-27 06:02:05', 'O'),
(59, 3, 'admin-jainglass', '116.74.113.206', '2015-01-05 12:37:26', 'I'),
(60, 3, 'admin-jainglass', '202.47.116.138', '2015-01-13 05:36:13', 'I'),
(61, 3, 'admin-jainglass', '202.47.116.138', '2015-01-13 05:44:53', 'I'),
(62, 3, 'admin-jainglass', '202.47.116.138', '2015-01-13 05:48:52', 'O'),
(63, 3, 'admin-jainglass', '202.47.116.138', '2015-01-13 07:39:15', 'I'),
(64, 3, 'admin-jainglass', '202.47.116.138', '2015-01-13 07:49:48', 'O'),
(65, 3, 'admin-jainglass', '123.201.80.119', '2015-01-17 05:20:04', 'I'),
(66, 3, 'admin-jainglass', '123.201.80.119', '2015-01-17 05:37:57', 'O'),
(67, 3, 'admin-jainglass', '123.201.80.119', '2015-01-17 05:40:05', 'I'),
(68, 3, 'admin-jainglass', '202.47.116.138', '2015-01-17 08:05:07', 'I'),
(69, 3, 'admin-jainglass', '122.170.31.159', '2015-01-17 10:30:04', 'I'),
(70, 3, 'admin-jainglass', '122.170.31.159', '2015-01-17 10:30:47', 'I'),
(71, 3, 'admin-jainglass', '203.109.75.214', '2015-02-04 16:19:25', 'I'),
(72, 3, 'admin-jainglass', '203.109.75.214', '2015-02-04 16:20:04', 'O'),
(73, 3, 'admin-jainglass', '202.47.116.138', '2015-02-26 17:10:14', 'I'),
(74, 3, 'admin-jainglass', '202.47.116.138', '2015-02-26 17:10:44', 'I'),
(75, 3, 'admin-jainglass', '123.201.80.41', '2015-03-20 11:07:14', 'I'),
(76, 3, 'admin-jainglass', '123.201.80.41', '2015-03-20 11:07:56', 'I'),
(77, 0, 'admin-jainglass', '123.201.80.41', '2015-03-20 11:09:35', 'O'),
(78, 3, 'admin-jainglass', '123.201.80.41', '2015-03-20 11:09:46', 'I'),
(79, 3, 'admin-jainglass', '123.201.80.41', '2015-03-20 11:13:34', 'O'),
(80, 3, 'admin-jainglass', '123.201.1.220', '2015-03-23 17:12:28', 'I'),
(81, 3, 'admin-jainglass', '123.201.1.220', '2015-03-23 17:12:42', 'I'),
(82, 3, 'admin-jainglass', '123.201.1.220', '2015-03-23 17:18:02', 'O'),
(83, 3, 'admin-jainglass', '202.47.116.138', '2015-05-11 11:11:23', 'I'),
(84, 3, 'admin-jainglass', '202.47.116.138', '2015-05-11 11:11:33', 'O'),
(85, 3, 'admin-jainglass', '202.47.116.138', '2015-05-11 11:12:05', 'I'),
(86, 3, 'admin-jainglass', '202.47.116.138', '2015-05-11 11:12:55', 'I'),
(87, 3, 'admin-jainglass', '203.109.74.60', '2015-05-11 12:00:28', 'I'),
(88, 3, 'admin-jainglass', '175.100.149.13', '2015-07-27 07:08:14', 'I'),
(89, 3, 'admin-jainglass', '123.201.83.126', '2015-07-28 07:48:10', 'I'),
(90, 3, 'admin-jainglass', '123.201.83.126', '2015-07-28 07:48:57', 'O'),
(91, 3, 'admin-jainglass', '123.201.83.126', '2015-07-28 07:49:25', 'I'),
(92, 3, 'admin-jainglass', '123.201.83.126', '2015-07-28 07:49:37', 'O'),
(93, 3, 'admin-jainglass', '123.201.83.65', '2015-07-31 09:48:48', 'I'),
(94, 3, 'admin-jainglass', '123.201.83.65', '2015-07-31 09:55:25', 'O'),
(95, 3, 'admin-jainglass', '175.100.149.75', '2015-08-12 09:50:00', 'I'),
(96, 3, 'admin-jainglass', '175.100.149.75', '2015-08-12 09:52:28', 'O'),
(97, 3, 'admin-jainglass', '175.100.149.5', '2015-08-15 09:19:10', 'I'),
(98, 3, 'admin-jainglass', '175.100.149.5', '2015-08-15 09:21:05', 'O'),
(99, 4, 'admin-glass', '192.168.2.104', '2015-10-26 11:08:55', 'I'),
(100, 4, 'admin-glass', '192.168.2.104', '2015-10-26 11:54:20', 'I'),
(101, 4, 'admin-glass', '192.168.2.104', '2015-10-26 15:59:16', 'O'),
(102, 1, 'admin-epanel', '192.168.2.104', '2015-10-26 15:59:34', 'I'),
(103, 1, 'admin-epanel', '192.168.2.104', '2015-10-26 18:33:21', 'I'),
(104, 1, 'admin-epanel', '192.168.2.106', '2015-10-27 10:09:00', 'I'),
(105, 1, 'admin-epanel', '192.168.2.106', '2015-10-27 11:34:53', 'I'),
(106, 1, 'admin-epanel', '192.168.2.106', '2015-10-27 16:30:33', 'I'),
(107, 1, 'admin-epanel', '192.168.2.106', '2015-10-28 10:07:54', 'I'),
(108, 1, 'admin-epanel', '192.168.2.106', '2015-10-28 12:44:56', 'I'),
(109, 1, 'admin-epanel', '192.168.2.106', '2015-10-28 13:50:13', 'I'),
(110, 1, 'admin-epanel', '192.168.2.105', '2015-10-29 16:36:43', 'I'),
(111, 1, 'admin-epanel', '192.168.2.105', '2015-10-30 10:05:25', 'I'),
(112, 1, 'admin-epanel', '192.168.2.106', '2015-11-03 11:05:02', 'I'),
(113, 1, 'admin-epanel', '192.168.2.109', '2015-11-03 14:04:20', 'I'),
(114, 1, 'admin-epanel', '192.168.2.102', '2015-11-16 15:35:47', 'I'),
(115, 1, 'admin-epanel', '192.168.2.102', '2015-12-01 16:01:19', 'I'),
(116, 1, 'admin-epanel', '192.168.2.103', '2015-12-18 18:51:10', 'I'),
(117, 1, 'admin-epanel', '192.168.2.142', '2016-01-07 13:14:48', 'I'),
(118, 1, 'admin-epanel', '192.168.2.129', '2016-01-08 12:49:26', 'I'),
(119, 1, 'admin-epanel', '192.168.2.136', '2016-01-09 10:04:23', 'I'),
(120, 1, 'admin-epanel', '192.168.2.136', '2016-01-09 10:35:56', 'I'),
(121, 1, 'admin-epanel', '192.168.2.136', '2016-01-09 16:32:17', 'I'),
(122, 1, 'admin-epanel', '192.168.2.136', '2016-01-09 16:40:16', 'I'),
(123, 1, 'admin-epanel', '192.168.2.126', '2016-01-11 10:05:19', 'I'),
(124, 1, 'admin-epanel', '192.168.2.133', '2016-01-21 12:29:37', 'I'),
(125, 1, 'admin-epanel', '192.168.2.131', '2016-02-03 11:58:47', 'I'),
(126, 1, 'admin-epanel', '192.168.2.105', '2016-02-10 16:58:54', 'I'),
(127, 1, 'admin-epanel', '192.168.2.115', '2016-03-28 17:57:29', 'I'),
(128, 3, 'adm-hindvagroup', '::1', '2017-04-05 13:11:15', 'I'),
(129, 3, 'adm-hindvagroup', '::1', '2017-04-06 09:45:24', 'I'),
(130, 3, 'adm-hindvagroup', '::1', '2017-04-06 22:23:43', 'I'),
(131, 3, 'adm-hindvagroup', '::1', '2017-04-08 09:34:34', 'I'),
(132, 3, 'adm-hindvagroup', '::1', '2017-04-09 18:53:44', 'I'),
(133, 3, 'adm-hindvagroup', '::1', '2017-04-10 13:18:27', 'I'),
(134, 3, 'adm-hindvagroup', '::1', '2017-04-13 10:48:45', 'I'),
(135, 3, 'adm-hindvagroup', '::1', '2017-04-14 12:43:16', 'I'),
(136, 3, 'adm-hindvagroup', '::1', '2017-04-15 10:36:09', 'I'),
(137, 3, 'adm-hindvagroup', '::1', '2017-04-16 11:59:19', 'I'),
(138, 3, 'adm-hindvagroup', '::1', '2017-04-17 15:57:16', 'I'),
(139, 3, 'adm-hindvagroup', '::1', '2017-04-17 16:14:12', 'I'),
(140, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-19 17:12:29', 'I'),
(141, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-20 11:02:08', 'I'),
(142, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-20 14:21:58', 'I'),
(143, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-20 16:55:35', 'I'),
(144, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-20 17:45:12', 'O'),
(145, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-21 11:44:50', 'I'),
(146, 5, 'bhavini', '127.0.0.1', '2017-04-21 12:04:44', 'I'),
(147, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-21 12:05:35', 'I'),
(148, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-21 14:32:09', 'I'),
(149, 5, 'bhavini', '127.0.0.1', '2017-04-21 15:27:22', 'I'),
(150, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-21 17:11:14', 'I'),
(151, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-21 17:11:55', 'O'),
(152, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-21 17:12:07', 'I'),
(153, 5, 'bhavini', '127.0.0.1', '2017-04-21 17:13:14', 'I'),
(154, 5, 'bhavini', '127.0.0.1', '2017-04-21 17:36:14', 'O'),
(155, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-21 17:37:27', 'O'),
(156, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-22 09:07:54', 'I'),
(157, 5, 'bhavini', '127.0.0.1', '2017-04-22 09:57:34', 'I'),
(158, 2, 'admin-bankimdave', '127.0.0.1', '2017-04-22 10:22:01', 'O'),
(159, 4, 'admin-yugeva', '127.0.0.1', '2017-04-27 11:38:47', 'I'),
(160, 4, 'admin-yugeva', '127.0.0.1', '2017-04-29 17:56:43', 'I'),
(161, 4, 'admin-yugeva', '127.0.0.1', '2017-04-29 18:17:19', 'I'),
(162, 4, 'admin-yugeva', '127.0.0.1', '2017-05-01 09:18:31', 'I'),
(163, 4, 'admin-yugeva', '127.0.0.1', '2017-05-03 15:55:52', 'I'),
(164, 4, 'admin-yugeva', '127.0.0.1', '2017-05-05 09:34:00', 'I'),
(165, 4, 'admin-yugeva', '127.0.0.1', '2017-05-15 14:36:08', 'I'),
(166, 4, 'admin-yugeva', '127.0.0.1', '2017-05-16 12:29:39', 'I'),
(167, 4, 'admin-yugeva', '127.0.0.1', '2017-05-16 13:49:20', 'I'),
(168, 4, 'admin-yugeva', '127.0.0.1', '2017-05-16 17:40:49', 'I'),
(169, 4, 'admin-yugeva', '127.0.0.1', '2017-05-17 09:06:51', 'I'),
(170, 4, 'admin-yugeva', '127.0.0.1', '2017-05-17 11:46:23', 'I'),
(171, 4, 'admin-yugeva', '127.0.0.1', '2017-05-17 13:40:51', 'I'),
(172, 4, 'admin-yugeva', '127.0.0.1', '2017-05-17 16:27:55', 'I'),
(173, 4, 'admin-yugeva', '127.0.0.1', '2017-05-18 08:44:43', 'I'),
(174, 4, 'admin-yugeva', '127.0.0.1', '2017-05-19 18:14:55', 'I'),
(175, 4, 'admin-yugeva', '192.168.0.7', '2017-05-20 10:32:26', 'I'),
(176, 4, 'admin-yugeva', '127.0.0.1', '2017-05-20 10:32:50', 'I'),
(177, 4, 'admin-yugeva', '127.0.0.1', '2017-05-22 09:24:31', 'I'),
(178, 4, 'admin-yugeva', '127.0.0.1', '2017-05-22 10:11:29', 'I'),
(179, 4, 'admin-yugeva', '127.0.0.1', '2017-05-22 13:30:50', 'I'),
(180, 4, 'admin-yugeva', '127.0.0.1', '2017-05-22 14:09:19', 'I'),
(181, 4, 'admin-yugeva', '127.0.0.1', '2017-05-22 15:51:04', 'I'),
(182, 4, 'admin-yugeva', '127.0.0.1', '2017-05-23 17:03:06', 'I'),
(183, 4, 'admin-yugeva', '127.0.0.1', '2017-05-24 11:46:01', 'I'),
(184, 4, 'admin-yugeva', '127.0.0.1', '2017-05-24 15:46:46', 'I'),
(185, 4, 'admin-yugeva', '127.0.0.1', '2017-05-25 12:23:39', 'I'),
(186, 4, 'admin-yugeva', '127.0.0.1', '2017-05-25 14:57:39', 'I'),
(187, 4, 'admin-yugeva', '127.0.0.1', '2017-05-27 09:12:40', 'I'),
(188, 4, 'admin-yugeva', '127.0.0.1', '2017-05-27 11:57:56', 'I'),
(189, 4, 'admin-yugeva', '127.0.0.1', '2017-05-27 16:31:25', 'I'),
(190, 4, 'admin-yugeva', '127.0.0.1', '2017-05-29 11:06:25', 'I'),
(191, 4, 'admin-yugeva', '127.0.0.1', '2017-05-30 10:17:53', 'I'),
(192, 4, 'admin-yugeva', '127.0.0.1', '2017-05-30 11:52:02', 'I'),
(193, 4, 'admin-yugeva', '127.0.0.1', '2017-06-05 16:58:12', 'I'),
(194, 4, 'admin-yugeva', '127.0.0.1', '2017-06-06 09:01:51', 'I'),
(195, 4, 'admin-yugeva', '127.0.0.1', '2017-06-06 10:37:27', 'I'),
(196, 4, 'admin-yugeva', '127.0.0.1', '2017-06-06 13:10:13', 'I'),
(197, 4, 'admin-yugeva', '127.0.0.1', '2017-06-06 14:43:05', 'I'),
(198, 4, 'admin-yugeva', '127.0.0.1', '2017-06-06 15:56:51', 'I'),
(199, 4, 'admin-yugeva', '127.0.0.1', '2017-06-08 12:46:26', 'I'),
(200, 4, 'admin-yugeva', '127.0.0.1', '2017-06-08 17:01:24', 'I'),
(201, 4, 'admin-yugeva', '127.0.0.1', '2017-06-09 09:17:41', 'I'),
(202, 4, 'admin-yugeva', '127.0.0.1', '2017-06-09 11:37:24', 'I'),
(203, 4, 'admin-yugeva', '127.0.0.1', '2017-06-09 13:20:13', 'I'),
(204, 4, 'admin-yugeva', '127.0.0.1', '2017-06-09 17:57:46', 'I'),
(205, 4, 'admin-yugeva', '127.0.0.1', '2017-06-10 09:28:03', 'I'),
(206, 4, 'admin-yugeva', '127.0.0.1', '2017-06-10 11:29:22', 'I'),
(207, 4, 'admin-yugeva', '127.0.0.1', '2017-06-10 15:22:10', 'I'),
(208, 4, 'admin-yugeva', '127.0.0.1', '2017-06-10 17:02:41', 'I'),
(209, 4, 'admin-yugeva', '127.0.0.1', '2017-06-15 14:12:14', 'I'),
(210, 4, 'admin-yugeva', '127.0.0.1', '2017-06-15 17:30:33', 'I'),
(211, 4, 'admin-yugeva', '127.0.0.1', '2017-06-16 12:45:32', 'I'),
(212, 4, 'admin-yugeva', '127.0.0.1', '2017-06-17 10:57:26', 'I'),
(213, 4, 'admin-yugeva', '127.0.0.1', '2017-06-17 11:40:50', 'I'),
(214, 4, 'admin-yugeva', '127.0.0.1', '2017-06-17 15:00:48', 'I'),
(215, 4, 'admin-yugeva', '127.0.0.1', '2017-06-23 10:12:33', 'I'),
(216, 4, 'admin-yugeva', '127.0.0.1', '2017-06-23 11:39:47', 'I'),
(217, 4, 'admin-yugeva', '127.0.0.1', '2017-06-27 16:57:09', 'I'),
(218, 4, 'admin-yugeva', '127.0.0.1', '2017-07-07 17:53:19', 'I'),
(219, 4, 'admin-yugeva', '127.0.0.1', '2017-07-08 08:55:38', 'I'),
(220, 4, 'admin-yugeva', '127.0.0.1', '2017-07-08 11:10:12', 'I'),
(221, 4, 'admin-yugeva', '123.201.2.173', '2017-07-08 11:39:46', 'I'),
(222, 4, 'admin-yugeva', '123.201.2.173', '2017-07-08 14:37:42', 'I'),
(223, 4, 'admin-yugeva', '123.201.2.173', '2017-07-08 14:47:32', 'I'),
(224, 4, 'admin-yugeva', '123.201.2.173', '2017-07-10 13:29:50', 'I'),
(225, 4, 'admin-yugeva', '116.74.88.189', '2017-07-10 13:43:20', 'I'),
(226, 4, 'admin-yugeva', '116.74.88.189', '2017-07-10 14:36:01', 'O'),
(227, 4, 'admin-yugeva', '123.201.2.173', '2017-07-11 08:09:02', 'I'),
(228, 4, 'admin-yugeva', '123.201.2.173', '2017-07-17 06:11:46', 'I'),
(229, 4, 'admin-yugeva', '116.72.28.80', '2017-07-19 05:40:16', 'I'),
(230, 4, 'admin-yugeva', '116.74.64.204', '2017-07-28 12:11:53', 'I'),
(231, 4, 'admin-yugeva', '127.0.0.1', '2017-07-29 16:34:50', 'I'),
(232, 4, 'admin-yugeva', '116.74.88.19', '2017-08-29 08:46:31', 'I'),
(233, 4, 'admin-yugeva', '116.72.9.166', '2017-09-26 10:25:10', 'I'),
(234, 4, 'admin-yugeva', '123.201.2.173', '2017-09-26 11:04:14', 'I'),
(235, 4, 'admin-yugeva', '123.201.2.173', '2017-09-26 11:04:33', 'I'),
(236, 4, 'admin-yugeva', '116.72.9.166', '2017-09-26 11:19:13', 'I'),
(237, 4, 'admin-yugeva', '123.201.2.173', '2017-09-26 11:25:33', 'O'),
(238, 4, 'admin-yugeva', '219.91.138.120', '2017-09-26 12:27:56', 'I'),
(239, 4, 'admin-yugeva', '116.72.9.166', '2017-09-26 12:41:24', 'I'),
(240, 4, 'admin-yugeva', '116.72.9.166', '2017-09-26 13:59:10', 'I'),
(241, 4, 'admin-yugeva', '116.74.70.118', '2017-09-30 14:40:33', 'I'),
(242, 4, 'admin-yugeva', '116.72.36.138', '2017-10-02 07:16:54', 'I'),
(243, 4, 'admin-yugeva', '123.201.2.173', '2017-10-02 09:01:52', 'I'),
(244, 4, 'admin-yugeva', '116.73.208.182', '2017-10-02 09:16:21', 'I'),
(245, 4, 'admin-yugeva', '116.72.9.166', '2017-10-02 10:56:20', 'I'),
(246, 4, 'admin-yugeva', '175.100.148.120', '2017-10-05 08:23:32', 'I'),
(247, 4, 'admin-yugeva', '175.100.148.120', '2017-10-05 08:23:55', 'I'),
(248, 4, 'admin-yugeva', '127.0.0.1', '2017-11-13 10:52:08', 'I'),
(249, 4, 'admin-yugeva', '127.0.0.1', '2017-11-13 11:45:56', 'I'),
(250, 4, 'admin-yugeva', '127.0.0.1', '2017-11-13 13:51:26', 'I'),
(251, 4, 'admin-yugeva', '123.201.2.173', '2017-11-13 11:10:26', 'I'),
(252, 4, 'admin-yugeva', '175.100.148.240', '2017-11-14 07:37:49', 'I'),
(253, 4, 'admin-yugeva', '175.100.148.240', '2017-11-14 10:23:58', 'I'),
(254, 4, 'admin-yugeva', '175.100.148.240', '2017-11-14 11:49:27', 'I'),
(255, 4, 'admin-yugeva', '123.201.241.248', '2017-11-21 07:46:56', 'I'),
(256, 4, 'admin-yugeva', '123.201.241.248', '2017-11-21 10:17:29', 'I'),
(257, 4, 'admin-yugeva', '116.73.213.147', '2017-11-22 07:41:11', 'I'),
(258, 4, 'admin-yugeva', '207.244.89.90', '2017-11-22 08:38:52', 'I'),
(259, 4, 'admin-yugeva', '207.244.89.108', '2017-11-22 12:10:50', 'I'),
(260, 4, 'admin-yugeva', '123.201.249.64', '2017-11-23 08:43:12', 'I'),
(261, 4, 'admin-yugeva', '116.74.98.152', '2017-12-04 16:16:59', 'I'),
(262, 4, 'admin-yugeva', '219.91.236.242', '2017-12-16 07:38:59', 'I'),
(263, 4, 'admin-yugeva', '219.91.236.242', '2017-12-16 07:41:19', 'O'),
(264, 4, 'admin-yugeva', '123.201.228.124', '2017-12-29 07:14:34', 'I'),
(265, 4, 'admin-yugeva', '123.201.228.124', '2017-12-29 07:59:39', 'I'),
(266, 4, 'admin-yugeva', '123.201.225.120', '2017-12-29 12:43:26', 'I'),
(267, 4, 'admin-yugeva', '116.74.126.60', '2018-01-02 06:35:17', 'I'),
(268, 4, 'admin-yugeva', '116.74.126.60', '2018-01-02 07:06:44', 'I'),
(269, 4, 'admin-yugeva', '123.201.227.118', '2018-01-02 07:33:12', 'I'),
(270, 4, 'admin-yugeva', '116.74.110.132', '2018-06-19 16:23:20', 'I'),
(271, 4, 'admin-yugeva', '123.201.228.32', '2018-07-07 12:41:16', 'I'),
(272, 4, 'admin-yugeva', '123.201.228.32', '2018-07-07 12:42:52', 'I'),
(273, 4, 'admin-yugeva', '219.91.236.246', '2018-08-02 07:57:19', 'I'),
(274, 6, 'bhavini-admin', '116.72.12.180', '2018-08-02 07:59:08', 'I'),
(275, 6, 'bhavini-admin', '116.72.12.180', '2018-08-02 07:59:29', 'O'),
(276, 6, 'bhavini-admin', '116.72.12.180', '2018-08-02 07:59:32', 'I'),
(277, 4, 'admin-yugeva', '123.201.226.189', '2018-08-07 09:03:01', 'I'),
(278, 4, 'admin-yugeva', '219.91.236.248', '2018-08-13 14:35:24', 'I'),
(279, 6, 'bhavini-admin', '60.254.52.34', '2018-08-18 06:34:51', 'I'),
(280, 4, 'admin-yugeva', '123.201.228.1', '2018-08-20 08:52:29', 'I'),
(281, 6, 'bhavini-admin', '60.254.22.150', '2018-08-22 06:34:21', 'I'),
(282, 6, 'bhavini-admin', '123.201.2.173', '2018-08-22 06:39:53', 'I'),
(283, 4, 'admin-yugeva', '123.201.227.174', '2018-08-23 11:41:35', 'I'),
(284, 6, 'bhavini-admin', '123.201.2.173', '2018-08-29 09:11:21', 'I'),
(285, 6, 'bhavini-admin', '116.74.112.172', '2018-08-31 10:49:08', 'I'),
(286, 6, 'bhavini-admin', '123.201.2.173', '2018-09-10 07:27:35', 'I'),
(287, 4, 'admin-yugeva', '116.74.88.64', '2018-09-21 11:58:58', 'I'),
(288, 4, 'admin-yugeva', '116.74.112.240', '2018-09-28 09:05:17', 'I'),
(289, 4, 'admin-yugeva', '116.74.112.240', '2018-09-28 10:05:49', 'I'),
(290, 6, 'bhavini-admin', '116.74.112.172', '2018-10-02 09:11:48', 'I'),
(291, 6, 'bhavini-admin', '116.74.112.172', '2018-10-02 09:11:48', 'I'),
(292, 6, 'bhavini-admin', '116.74.112.172', '2018-11-02 05:36:15', 'I'),
(293, 6, 'bhavini-admin', '123.201.2.173', '2018-11-02 07:00:48', 'I'),
(294, 6, 'bhavini-admin', '116.74.112.172', '2018-11-24 08:13:58', 'I'),
(295, 6, 'bhavini-admin', '123.201.2.173', '2018-11-27 11:24:59', 'I'),
(296, 4, 'admin-opto', '::1', '2019-04-25 17:52:19', 'I'),
(297, 4, 'admin-opto', '::1', '2019-04-26 09:49:54', 'I'),
(298, 4, 'admin-opto', '::1', '2019-04-26 13:46:42', 'I'),
(299, 4, 'admin-opto', '::1', '2019-04-29 09:32:54', 'I'),
(300, 4, 'admin-opto', '::1', '2019-04-30 10:49:39', 'I'),
(301, 4, 'admin-opto', '::1', '2019-05-02 11:00:08', 'I'),
(302, 4, 'admin-opto', '::1', '2019-05-03 11:15:17', 'I'),
(303, 4, 'admin-opto', '::1', '2019-05-03 11:26:36', 'I'),
(304, 4, 'admin-opto', '::1', '2019-05-04 09:30:14', 'I'),
(305, 4, 'admin-opto', '::1', '2019-05-04 14:26:07', 'I'),
(306, 4, 'admin-opto', '::1', '2019-05-06 16:02:44', 'I'),
(307, 6, 'bhavini-admin', '::1', '2019-05-20 10:47:45', 'I'),
(308, 6, 'bhavini-admin', '192.168.0.17', '2019-05-20 10:48:17', 'I'),
(309, 4, 'admin-opto', '::1', '2019-05-20 12:20:02', 'I'),
(310, 4, 'admin-opto', '::1', '2019-05-20 18:26:13', 'I'),
(311, 4, 'admin-opto', '::1', '2019-05-21 10:09:26', 'I'),
(312, 4, 'admin-opto', '::1', '2019-05-21 14:32:26', 'I'),
(313, 4, 'admin-opto', '::1', '2019-05-25 09:46:48', 'I'),
(314, 4, 'admin-opto', '::1', '2019-05-28 10:40:50', 'I'),
(315, 4, 'admin-opto', '::1', '2019-05-28 12:38:06', 'I'),
(316, 4, 'admin-opto', '::1', '2019-05-28 16:14:49', 'I'),
(317, 4, 'admin-opto', '::1', '2019-05-30 10:11:34', 'I'),
(318, 4, 'admin-opto', '::1', '2019-05-30 13:00:10', 'I'),
(319, 4, 'admin-opto', '::1', '2019-05-31 09:33:56', 'I'),
(320, 4, 'admin-opto', '::1', '2019-06-01 09:27:34', 'I'),
(321, 4, 'admin-opto', '::1', '2019-06-03 09:17:06', 'I'),
(322, 6, 'bhavini-admin', '::1', '2019-06-03 18:27:20', 'I'),
(323, 6, 'bhavini-admin', '::1', '2019-06-04 09:55:03', 'I'),
(324, 4, 'admin-opto', '::1', '2019-06-06 14:04:26', 'I'),
(325, 4, 'admin-opto', '123.201.2.173', '2019-06-06 12:44:32', 'I'),
(326, 4, 'admin-opto', '116.74.112.172', '2019-06-06 12:49:59', 'I'),
(327, 4, 'admin-opto', '123.201.2.173', '2019-06-06 14:14:13', 'I'),
(328, 4, 'admin-opto', '::1', '2019-06-07 10:14:46', 'I'),
(329, 4, 'admin-opto', '::1', '2019-06-08 09:39:12', 'I'),
(330, 4, 'admin-opto', '::1', '2019-06-10 15:35:38', 'I'),
(331, 4, 'admin-opto', '::1', '2019-06-10 19:06:41', 'I'),
(332, 4, 'admin-opto', '::1', '2019-06-11 11:16:40', 'I'),
(333, 4, 'admin-opto', '::1', '2019-06-12 10:30:15', 'I'),
(334, 4, 'admin-opto', '116.74.112.172', '2019-06-13 06:24:02', 'I'),
(335, 4, 'admin-opto', '116.74.112.172', '2019-06-13 12:04:32', 'I'),
(336, 4, 'admin-opto', '116.74.112.172', '2019-06-13 13:25:43', 'I'),
(337, 4, 'admin-opto', '116.74.112.172', '2019-06-19 07:55:17', 'I'),
(338, 4, 'admin-opto', '::1', '2019-06-19 12:05:28', 'I'),
(339, 4, 'admin-opto', '116.74.112.172', '2019-06-20 06:02:42', 'I'),
(340, 4, 'admin-opto', '116.74.112.172', '2019-06-21 06:54:56', 'I'),
(341, 4, 'admin-opto', '116.74.112.172', '2019-06-21 10:58:34', 'I'),
(342, 4, 'admin-opto', '116.74.112.172', '2019-06-21 14:28:13', 'I'),
(343, 4, 'admin-opto', '116.74.112.172', '2019-06-22 11:49:05', 'I'),
(344, 4, 'admin-opto', '116.74.112.172', '2019-06-22 13:56:41', 'I'),
(345, 4, 'admin-opto', '116.74.112.172', '2019-06-25 07:38:24', 'I'),
(346, 4, 'admin-opto', '116.74.112.172', '2019-06-25 08:12:24', 'I'),
(347, 4, 'admin-opto', '116.74.112.172', '2019-07-09 11:35:52', 'I'),
(348, 4, 'admin-opto', '116.74.112.172', '2019-07-09 13:07:10', 'I'),
(349, 4, 'admin-ofj', '::1', '2019-07-27 17:22:29', 'I'),
(350, 4, 'admin-ofj', '::1', '2019-07-29 09:10:35', 'I'),
(351, 4, 'admin-ofj', '::1', '2019-08-23 16:02:15', 'I'),
(352, 4, 'admin-ofj', '116.74.112.172', '2019-08-26 09:31:11', 'I'),
(353, 4, 'admin-ofj', '116.74.112.172', '2019-08-26 09:31:27', 'I'),
(354, 4, 'admin-ofj', '116.74.112.172', '2019-08-28 10:08:27', 'I'),
(355, 4, 'admin-ofj', '116.74.112.172', '2019-08-28 10:08:54', 'I'),
(356, 4, 'admin-ofj', '116.72.16.131', '2019-09-01 08:29:55', 'I'),
(357, 4, 'admin-ofj', '150.107.188.82', '2021-07-21 12:50:12', 'I'),
(358, 6, 'bhavini-admin', '150.107.188.82', '2021-07-21 12:54:40', 'I'),
(359, 6, 'bhavini-admin', '150.107.188.82', '2021-07-21 13:34:55', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `sliderimage`
--

CREATE TABLE `sliderimage` (
  `sliderID` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `mobile_image` text,
  `sliderTitle` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL DEFAULT '1970-01-01',
  `sortorder` int(8) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `sliderPosition` char(1) NOT NULL DEFAULT 'H',
  `remote_ip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliderimage`
--

INSERT INTO `sliderimage` (`sliderID`, `image`, `mobile_image`, `sliderTitle`, `username`, `createdate`, `modifieddate`, `sortorder`, `status`, `sliderPosition`, `remote_ip`) VALUES
(9, '9-w_3.png', 'slider9_mobile.jpg', 'img1', 'Keyur', '2015-10-27', '2019-07-27', 3, 'E', 'H', '::1'),
(18, '18-w_1.png', 'slider18_mobile.jpg', 'slider2', 'Keyur', '2019-05-31', '2019-07-27', 1, 'E', 'H', '::1'),
(19, '19-w_4.png', 'slider19_mobile.jpg', 'slider3', 'Keyur', '2019-06-21', '2019-07-27', 4, 'E', 'H', '::1'),
(21, '21-w_2.png', 'slider21_mobile.jpg', 'slider5', 'Keyur', '2019-06-21', '2019-07-27', 2, 'E', 'H', '::1'),
(22, '22-22-w_5.png', 'slider22_mobile.jpg', 'slider6', 'Keyur', '2019-06-21', '2019-08-28', 5, 'E', 'H', '116.74.112.172');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_master`
--

CREATE TABLE `subscription_master` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(100) DEFAULT NULL,
  `s_email` varchar(200) DEFAULT NULL,
  `s_mobile` varchar(20) DEFAULT NULL,
  `s_date` date NOT NULL DEFAULT '1970-01-01',
  `new` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription_master`
--

INSERT INTO `subscription_master` (`s_id`, `s_name`, `s_email`, `s_mobile`, `s_date`, `new`) VALUES
(21, NULL, 'bhautik.easternts@gmail.com', NULL, '1970-01-01', 0),
(22, NULL, 'bhautik.easternts@gmail.com', NULL, '1970-01-01', 0),
(23, NULL, 'bhautik.easternts@gmail.com', NULL, '1970-01-01', 0),
(24, NULL, 'jigna.easternts@gmail.com', NULL, '1970-01-01', 0),
(25, NULL, 'jigna.easternts@gmail.com', NULL, '1970-01-01', 0),
(26, NULL, 'jigna.easternts@gmail.com', NULL, '1970-01-01', 0),
(27, NULL, 'kavisa.mehta@gmail.com', NULL, '1970-01-01', 0),
(28, NULL, 'bhautik.easternts@gmail.com', NULL, '1970-01-01', 0),
(29, NULL, 'jigna.easternts@gmail.com', NULL, '1970-01-01', 0),
(30, NULL, 'pratimohite22@gmail.com', NULL, '1970-01-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table 38`
--

CREATE TABLE `table 38` (
  `COL 1` int(2) DEFAULT NULL,
  `COL 2` int(1) DEFAULT NULL,
  `COL 3` varchar(24) DEFAULT NULL,
  `COL 4` varchar(12) DEFAULT NULL,
  `COL 5` varchar(23) DEFAULT NULL,
  `COL 6` varchar(1660) DEFAULT NULL,
  `COL 7` varchar(9) DEFAULT NULL,
  `COL 8` varchar(1) DEFAULT NULL,
  `COL 9` varchar(33) DEFAULT NULL,
  `COL 10` varchar(48) DEFAULT NULL,
  `COL 11` varchar(71) DEFAULT NULL,
  `COL 12` varchar(6033) DEFAULT NULL,
  `COL 13` varchar(3) DEFAULT NULL,
  `COL 14` varchar(19) DEFAULT NULL,
  `COL 15` varchar(35) DEFAULT NULL,
  `COL 16` varchar(34) DEFAULT NULL,
  `COL 17` varchar(10) DEFAULT NULL,
  `COL 18` varchar(10) DEFAULT NULL,
  `COL 19` varchar(41) DEFAULT NULL,
  `COL 20` varchar(10) DEFAULT NULL,
  `COL 21` varchar(10) DEFAULT NULL,
  `COL 22` varchar(10) DEFAULT NULL,
  `COL 23` varchar(10) DEFAULT NULL,
  `COL 24` int(2) DEFAULT NULL,
  `COL 25` varchar(1) DEFAULT NULL,
  `COL 26` varchar(14) DEFAULT NULL,
  `COL 27` varchar(3) DEFAULT NULL,
  `COL 28` varchar(10) DEFAULT NULL,
  `COL 29` varchar(3) DEFAULT NULL,
  `COL 30` varchar(5954) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table 38`
--

INSERT INTO `table 38` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`, `COL 9`, `COL 10`, `COL 11`, `COL 12`, `COL 13`, `COL 14`, `COL 15`, `COL 16`, `COL 17`, `COL 18`, `COL 19`, `COL 20`, `COL 21`, `COL 22`, `COL 23`, `COL 24`, `COL 25`, `COL 26`, `COL 27`, `COL 28`, `COL 29`, `COL 30`) VALUES
(9, 7, 'Shyamal shaligram', 'Residential ', '(ROWHOUSE)', '<p><span>A prime residential project fulfilling one\'s dream of pleasant home in the form of decent flats : \"Shaligram\" and graceful homes : \"Shyamal\" sharpening up at the outstanding habitable location in the Adajan area, a lush green and prime pocket of the fast growing city Surat.<br /> <br /> The location area is a decent dwelling environment preferred by the good civilized people and is too in close vicinity of well-reputed educational institutes, park &amp; gardens, playground, swimming pool, sports complex, temples, shopping malls &amp; superstores...</span></p>', 'Completed', '-', 'http://bit.ly/shaligramshyamal', '', 'Opp.SMC Sport Complex , L.p. Savani Road, Adajan, Surat', '', 'No', '', '', '9-Shyamal-shaligram_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-01', '', 8, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(10, 7, 'Silver crest', 'Residential ', '(2&3 BHK)', '<p><span>A splendid Exclusively Residential Apartment project envisaging truely defined homes in the form of graceful and well planned 3 BHK &amp; 2 BHK flats,... providing all modern amenities and facilities taking up shape of sculpture designed with consideration of earthquake resistant criteria, in the nation-eyed rapidly growing city SURAT... at aggressively developing &amp; prosperity promising ADAJAN area,... a fight location having pollution free, hygienic &amp; eco-friendly environment providing peaceful and pleasant living amongst good civic society,.. And is too in close proximity of well reputed educational institutes, parks &amp; gardens, playground, sport complex, swimming pool, temples, hospitals, shopping malls &amp; super stores... and is very near by the proposed state of art bridge connection to athwalines area.</span></p>', 'Completed', '-', 'http://bit.ly/shaligramcrest', '', 'L.P Savani To Green City Road, Adajan, Surat', '', 'No', '', '', '10-Silver-crest_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-01', '', 9, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(11, 7, 'Shaligram height', 'Residential ', '(2& 3 BHK)', '', 'Completed', '-', 'http://bit.ly/shaligramheight', '', 'Opp. Althan Water Works, Near Althan Char Rasta, Vip Road, Athan, Surat', '<h3>Salient feature</h3>\r\n<div class=\"project-detail-list\">\r\n<p>Gorgeous main gates with well-designed compound wall</p>\r\n<p>Well planned campus with elegant and aesthetic elevation</p>\r\n<p>Beautiful landscaped lush green garden with pleasant sit outs and water body</p>\r\n<p>Club house with indoor game facilities and well equipped common gymnasium</p>\r\n<p>Pleasant and spacious entrance foyer</p>\r\n<p>Distinguished children park with amusement equipment\'s</p>\r\n<p>Skating rink and jogging track</p>\r\n<p>CCTV camera system on main gates and entrance foyer</p>\r\n<p>Intercom facility in all flats</p>\r\n<p>Two high speed elevators of standard make for each building</p>\r\n<p>Backup generator for elevators, water pumps, lighting in common passage and parking and 4 light points in every flat.</p>\r\n<p>Gas connection and centralized plumbing for hot water</p>\r\n<p>Ample parking space with provision of minimum one car parking per flat</p>\r\n<p>SMC water supply with U/G and O/H storage tanks and bore well with separate O/H tank to each building</p>\r\n<p>Fire safety system installation</p>\r\n<p>Internal roads with RCC trimix and paver blocks</p>\r\n</div>', 'No', '', '', '11-Shaligram-height_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-01', '', 10, 'E', '192.168.0.21', 'Yes', '', 'Yes', '<p><strong>Structure :</strong> Earthquake resistant RCC structure with light weight auto clave aerated concrete block masonry</p>\r\n<p><strong>Flooring :</strong> V24 x 24 granamite flooring</p>\r\n<p><strong>kitchen :</strong> Granite kitchen platform with quartz sink and granamite cladding upto lintel level.</p>\r\n<p><strong>store :</strong> Kota stone racks with fully glazed tile dedo</p>\r\n<p><strong>toilets :</strong> Decorative tiles dedo to full heights with architectural concept</p>\r\n<p><strong>Plumbing :</strong> Concealed plumbing with &ldquo;Marc&rdquo; or eq. bath fittings and standard make sanitary ware</p>\r\n<p><strong>Doors :</strong> Attractive main door in salwood frame with decorative jali door. Other doors are both sides laminated flush doors in salwood frame</p>\r\n<p><strong>Windows :</strong> Anodized aluminum section window with reflective glass fixed in granite frame with safety grill</p>\r\n<p><strong>Electrification :</strong> Sufficient points in concealed wiring with modular range accessories Domestic points for household appliances TV and telephone points in living room and master bed room AC points in Master bedroom</p>\r\n<p><strong>Wall Finish :</strong> Interior surface of walls finished with white cement based putty Outer surface of walls finish with acrylic based water Repellant colour and elevative texture finish Oil paints to door frame and grills</p>\r\n<p><strong>Terrace :</strong> Water proofing on terrace with china mosaic flooring</p>'),
(22, 7, 'RUTVAN', 'Residential ', '(2&3 BHK)', '', 'Completed', '-', 'http://bit.ly/shaligramrutvan', '', 'Opp. Jyotindra Dave Garden, Adajan, Surat.', '', 'No', '', '', '22-RUTVAN_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-22', '', 22, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(12, 7, 'Vastugram', 'Residential', '', '', 'Completed', '-', 'http://bit.ly/vastugram', '', 'Nr. Happy Residency , Magdalla Road, Vesu Surat.', '<h3>Salient feature</h3>\r\n<p>Unique residential project comprising SIX towers, containing two flats per floor. Attractive main entrance foyer with reception. Clear and loanable titles. Planning as per vastu shastra.</p>\r\n<h3>Safety and security features</h3>\r\n<ul>\r\n<li>Attractive main gate with security cabin.</li>\r\n<li>Security system for campus.</li>\r\n<li>Video door phone &amp; intercom facilities from reception to each flat.</li>\r\n<li>Fire safety provision as per S.M.C. rules.</li>\r\n<li>Structural design as per earthquake standards.</li>\r\n<li>M.S. safety grill for all windows.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h3>General Facilities</h3>\r\n<ul>\r\n<li>Professionally designed and executed landscaping, children play area with Mordern equipment.</li>\r\n<li>Club house with high-tech modern gym equipment\'s and indoor game zone.</li>\r\n<li>Parking areas and internal roads to be covered with paving blocks &amp; trimix concrete.</li>\r\n<li>Allotted two car parking for each flat.</li>\r\n<li>Backup auto generator for common services &amp; sufficient ele. points in each flat.</li>\r\n<li>Two high speed auto door elevators of standard make for each building.</li>\r\n<li>S.M.C. water supply.</li>\r\n</ul>', 'No', '', '', '12-Vastugram_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-01', '', 12, 'E', '192.168.0.21', 'Yes', '', 'Yes', '<p><strong>Flooring :</strong> Premium quality 32\" X 32\" vitrified flooring in entire area except master bedroom wooden flooring in one master bedroom.</p>\r\n<p><strong>kitchen :</strong> Granite kitchen platform with quartz sink and granamite cladding upto lintel level.</p>\r\n<p><strong>Hot water system :</strong> Gas geyser with centralize plumbing system for each flat.</p>\r\n<p><strong>toilets/Plumbing :</strong> Decorative vitrified tiles dado upto lintel level with standard quality sanitary in all toilet and C.P. fitting of jaquar or similar brand.</p>\r\n<p><strong>Pure drinking water :</strong> R.O. water system in each flat.</p>\r\n<p><strong>Doors :</strong> Attractive main door in salwood frame with decorative jali door. Other doors are both sides laminated flush doors in salwood frame</p>\r\n<p><strong>Electrification :</strong> Sufficient points in concealed wiring with modular range accessories Domestic points for household appliances TV and telephone points in living room and master bed room AC points in Master bedroom</p>\r\n<p><strong>Wall Finish :</strong> Internal Wall - Waterproof putty on all plastered wall and ceiling, External Wall - Weather sealed colours of standard company and paints in common area.</p>\r\n<p><strong>A.C. :</strong> Two split A.C. in master bedroom, Split A.C. point in guest bedroom.</p>\r\n<p><strong>Windows :</strong> Colour anodized aluminum section of zindal make with reflective glass surrounded with granite frame.</p>'),
(13, 7, 'Safron homes', 'Residential ', '(4bhk lavish apt)', '', 'Completed', '-', 'http://bit.ly/safronhomes', '', 'Opp. Green Arcade ,L.P Savani Rd, Adajan Gam, Adajan, Surat.', '<p><strong>Special &amp; Additional Facilities :</strong></p>\r\n<ul>\r\n<li>Allotted 3 nos. of car parking to each flat.</li>\r\n<li>Well-equipped common gym for each building.</li>\r\n<li>Lush green garden space with pleasant sit-outs, fabulous fountains, water body and water fall.</li>\r\n<li>Playful children play area with outdoor play facility.</li>\r\n<li>C.C.T.V. and video door phone security system.</li>\r\n<li>Broadband +wifi internet facility.</li>\r\n<li>Individual water purification unit of standard make to each flat.</li>\r\n<li>Individual standard make split A.C. in two master bedroom to each flat.</li>\r\n<li>Gas connection and geyser with centralized plumbing for hot water.</li>\r\n</ul>', 'No', '', '', '13-Safron-homes_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-01', '', 4, 'E', '192.168.0.21', 'Yes', '', 'Yes', '<p><strong>Structure :</strong> Earthquake resistant R.C.C. structure.</p>\r\n<p><strong>Flooring :</strong> 1Mtr.X1Mtr. granamite flooring in all rooms.</p>\r\n<p><strong>kitchen :</strong> Granite kitchen platform with quartz sink and granamite cladding up to lintel level.</p>\r\n<p><strong>Store room :</strong> Kota stone rakes with fully glazed tile dado.</p>\r\n<p><strong>toilets :</strong> Full height granamite tile dedo with modern concept.</p>\r\n<p><strong>Plumbing :</strong> Concealed plumbing with Jaquar/Kohler or eq. bath fittings and RAK/Kohler or eq. Sanitary ware. Shower panel in two master bedroom toilets.</p>\r\n<p><strong>Doors :</strong> Attractive main door in salwood frame with decorative jali door. Other doors are both sides laminated flush doors in salwood frame</p>\r\n<p><strong>Windows :</strong> Anodized aluminum section window with reflective glass fixed in granite frame with bright bar safety grill.</p>\r\n<p><strong>Electrification :</strong> Finolex or eq. cable &amp; modular switches with I.S.I. standard fittings of good quality, T.V. and A.C. points in living room and bedrooms, Domestic points for household appliances.</p>\r\n<p><strong>Wall Finish paints :</strong> Interior surface of walls finish with mala plaster and white cement based putty or Gypsum plaster. Outer surface of wall finish with double coat roller plaster with texture and acrylic based water repellant color of standard make.</p>\r\n<p><strong>Terrace :</strong> Waterproofing on terrace with china mosaic flooring.</p>\r\n<p><strong>Lifts :</strong> Auto door lifts of kone / schendler or eq. having 8 persons capacity in each building.</p>\r\n<p><strong>Generator back-up :</strong> Back up generator for elevators, water pumps, common passage lighting &amp; parking and 10 light points in each flat.</p>\r\n<p><strong>Power Load :</strong> 3 Phase meter for each flat.</p>\r\n<p><strong>Supply of water :</strong> Uninterrupted corporation water supply pneumatic pressure for equal water pressure in shower panels. Additional bore well for water supply in flush cock.</p>\r\n<p><strong>Road Network :</strong> R.C.C. trimix (V.D.S.) / paver blocks of standard make.</p>\r\n<p><strong>Foyer :</strong> Exclusive entrance foyer with combination of italian marble &amp; granamite.</p>\r\n<p><strong>Passage :</strong> Granamite flooring &amp; combination of italian marble &amp; granamite cladding.</p>\r\n<p><strong>Staircase :</strong> Granite trade &amp; riser with granamite flooring &amp; S.S. railing.</p>\r\n<p><strong>Railing :</strong> Combination of S.S. &amp; Glass in balcony railing.</p>'),
(14, 8, 'Sapphire business hub', 'Commercial ', '(showrooms and offices)', '<p>Welcome to A premium place where you\'ll feel pretty prestige, Advantage fulfilment of achieving skymark success with every convenience and comfort and add a feather of prestige to your business address.</p>', 'Completed', '-', 'http://bit.ly/sapphirebusiness', '', 'Opp. Green Arcade ,L.P Savani Rd, Adajan Gam, Adajan, Surat.', '<p><strong>Structure :</strong> Earthquake resistant R.C.C. structure with light weight autoclave aerated concrete block masonry which reduce heat gain from outside &amp; enhance efficiency of air condition system resulting in saving electricity.</p>\r\n<p><strong>Flooring :</strong> Mtr. X Mtr. granamite flooring.</p>\r\n<p><strong>toilets :</strong> Full height granamite tile dedo with modern concept.</p>\r\n<p><strong>Doors / Shutter :</strong> Galvanized rolling shutter with mechanical operated for showrooms. Attractive main door in teakwood frame for offices.</p>\r\n<p><strong>Windows :</strong> Anodized aluminum section window with reflective glass fixed in granite frame with bright bar safety grill.</p>\r\n<p><strong>Electrification :</strong> Finolex or eq. cable wiring &amp; modular switches with I.S.I, standard fittings of good quality, T.V., A.C. &amp; telephone points in each unit, 3 phase electric meter in each unit.</p>\r\n<p><strong>Wall Finish paints :</strong> Interior surface of walls finish with mala plaster and white cement based putty or Gypsum plaster. Outer surface of wall finish with double coat roller plaster with texture and acrylic based water repellant color of standard make.</p>\r\n<p><strong>Terrace :</strong> Waterproofing on terrace with china mosaic flooring.</p>\r\n<p><strong>Lifts :</strong> 2 Nos. Auto door lifts of kone / schendler or eq. standard having 8 persons capacity.</p>\r\n<p><strong>Generator back-up :</strong> Back up generator for elevators, water pumps, common passage lighting &amp; parking and 10 light points in each flat.</p>\r\n<p><strong>Supply of water :</strong> Uninterrupted corporation water supply pneumatic pressure for equal water pressure in shower panels. Additional bore well for water supply in flush cock.</p>\r\n<p><strong>Road Network:</strong> R.C.C. trimix (V.D.S.) / paver blocks of standard make.</p>\r\n<p><strong>Foyer:</strong> Exclusive entrance foyer with combination of italian marble &amp; granamite.</p>\r\n<p><strong>Passage:</strong> Granamite flooring &amp; combination of italian marble &amp; granamite cladding.</p>\r\n<p><strong>Staircase:</strong> Granite trade &amp; riser with granamite flooring &amp; S.S. railing.</p>\r\n<p><strong>Elevation:</strong> Combination of A.C.P., glass &amp; aluminum fins.</p>', 'No', '', '', '14-Sapphire-business-hub_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-01', '', 3, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(15, 7, 'Shaligram signature', 'Residential', '', '', 'Ongoing', '', '', '', '', '<ul>\r\n<li>No.of floors: Basement parking + ground + 10 storied.</li>\r\n<li>Three side open 2 flats on each floor. Floor height: 11 feet.</li>\r\n<li>Alloted 3 Nos. of car parking to each flat.</li>\r\n<li>C.C.T.V. and video door phone security system.</li>\r\n<li>Individual water purification unit of standard make to each flat.</li>\r\n<li>Standard make split A.C. in 3 master bedrooms in every flat.</li>\r\n<li>Playful children play area with multi-activity play station for children.</li>\r\n<li>Well-equipped common gymnasium hall.</li>\r\n<li>Library hall of sufficient seating area capacity.</li>\r\n<li>Gas connection and gas gayer with flat wise centralized plumbing system providing hot water to every bathroom.</li>\r\n<li>Pressurized water supply to shower panels &amp; gas geyser.</li>\r\n<li>Shower panel in 2 Master bedrooms.</li>\r\n<li>Electronic locking system to main door.</li>\r\n<li>Terrace: Water proofing on china mosaic floor finish.</li>\r\n<li>Jogging track, Basketball practice pole, Skating rink, badminton court.</li>\r\n<li>Lush green garden space with water body and fabulous fountains, meditation center, gazebo sitting,multi purpose event stage.</li>\r\n<li>Indoor game: Pool table, Table tennis, Carom and Chess game port.</li>\r\n</ul>', 'Yes', 'Brochure_Com.pdf', '15-Shaligram-signature_location.jpg', '15-Shaligram-signature_thumb.jpg', '', '', '', '', '2018-02-09', '2018-02-01', '', 15, 'D', '192.168.0.13', 'Yes', '', 'Yes', ''),
(16, 4, 'Shaligram signature', 'Residential ', '(4bhk luxurious apts)', '', 'Ongoing', '-', 'http://bit.ly/shaligramsignature', '', 'B/H Sanjiv Kumar Auditorium , Opp. R.T.O Pal , Pal.', '<ul>\r\n<li><img src=\"/upload/icon/office-block.png\" alt=\"\" />No.of floors: Basement parking + ground + 10 storied.</li>\r\n<li><img src=\"/upload/icon/window.png\" alt=\"\" />Three side open 2 flats on each floor. Floor height: 11 feet.</li>\r\n<li><img src=\"/upload/icon/parking.png\" alt=\"\" />Allotted 3 Nos. of car parking to each flat.</li>\r\n<li><img src=\"/upload/icon/cctv.png\" alt=\"\" />C.C.T.V. and video door phone security system.</li>\r\n<li><img src=\"/upload/icon/water.png\" alt=\"\" />Individual water purification unit of standard make to each</li>\r\n</ul>', 'Yes', 'Brochure_Com.pdf', '', '16-Shaligram-signature_thumb.jpg', '', '', '', '', '2019-03-30', '2018-02-02', '', 28, 'E', '116.74.112.172', 'Yes', '', 'Yes', '<p><strong>Flooring :</strong>&nbsp;Italian marble in Living room, Dining &amp; Kitchen. Large size granamite in all Bedroom.</p>\r\n<p><strong>Kitchen :</strong> Granite kitchen platform with sink of carysil and granamite cladding up to lintel level.</p>\r\n<p><strong>Toilets :</strong> Full height granamite tile dedo with modern concept.</p>\r\n<p><strong>Doors / Shutter :</strong> Attractive teakwood main door along with jali door in teakwood frame and other doors as both side laminated flush doors in teak wood frame.</p>\r\n<p><strong>Plumbing :</strong> Concealed CPVC &amp; UPVC plumbing with jaquar bath fittings and&nbsp;simpolo sanitary ware.</p>\r\n<p><strong>Store room :</strong> Kota stone rakes with fully glazed tiles dado.</p>\r\n<p><strong>Surface Finish :</strong> Mala plaster and gypsum plaster on interior surface, Double coat roller plaster with texture and acrylic based water repellent color of standard make on exterior surface.</p>\r\n<p><strong>Windows :</strong>&nbsp;UPVC&nbsp;windows with tinted glass in granite frame and sill.</p>\r\n<p><strong>Power Connection :</strong> 3 Phase electric power connection to each flat.</p>\r\n<p><strong>Terrace :</strong> Waterproofing on terrace with china mosaic flooring.</p>\r\n<p><strong>Lifts :</strong> 2 Nos. Auto door lifts of schendler having 10 persons capacity.</p>\r\n<p><strong>Electrification :</strong> Finolex or eq. cable, copper wiring with I.S.I. standard modular switches and other fittings, and A.C. points in living room and all bedrooms, Necessary domestic points for household appliances.</p>\r\n<p><strong>Back-up-power :</strong> Generator for back-up power facility for elevators, water pumps,lighting in common passage, Parking and 10 light points in each flat.</p>\r\n<p><strong>Water Supply :</strong> U.G. and Overhead thanks for SMC supplied water of sufficient storage capacity. Additional bore wellfor</p>\r\n<p><strong>Balcony Railing :</strong> Combination of S.S. and glass.</p>\r\n<p><strong>Passage :</strong> Granamite flooring &amp; combination of italian marble &amp; granamite cladding.</p>\r\n<p><strong>Staircase :</strong> Granite trade &amp; riser with granamite flooring &amp; S.S. railing.</p>\r\n<p><strong>No.of floors :</strong>Basement parking + ground + 10 storied, Floor height: 11 feet.</p>'),
(17, 7, 'Sundaram Residency', 'Residential', '', '<p>Sundaram Residency brings you a comfortable home enhancing your lifestyle and makes it easier. A home that&rsquo;s exceptionally beautiful and reliable, it is designed to provide you lasting value and peace of mind in your budget. It balances traditional features you have come to relay on with innovative building science.</p>\r\n<p>Resounding with serenity and sophistication, Sundaram Residency is an array of amazing abodes. Innovatively design with aesthetic, the wondrous units complement all family needs. Each dwelling is significantly designed considering space and utility of all family members.</p>\r\n<p>We have &lsquo;Sundaram Residency,&rsquo; which brings to you comfortable living amidst exceptionally beautiful 3 BHK and 2 BHK flat for sale in Surat. Presenting the perfect blend of form, functionality and aesthetics, we design modern homes that are designed to provide lasting value and complete peace of mind within your budget. Innovative designs and architectural science combines aesthetic to create wondrous abodes that complement all family needs and budget.</p>\r\n<p>Resounding with sophistication and serenity, our Surat flats for sale are meticulously designed considering utility and space for all family members. We have crafted some of the best apartments for sale in Surat, combining the finest of design, architecture, aesthetics and technology. With affordability in mind, we create marvelous Surat apartments for sale that enhance living standards of our customers. We are built on a strong foundation of values and ethics, aiming to build astounding Surat flats for sale that redefine living experiences and affordability.</p>', 'Completed', '', '', '', '', '<div class=\"amenities-block\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Affordable_3BHK_in_Surat_vitrified_flooring.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>FLOORING</h4>\r\n<span>2&rsquo; X 2&rsquo; Granamite flooring. </span></div>\r\n</div>\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2_BHK_Flats_in_Surat_for_Sale_rcc_structure.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>STRUCTURE</h4>\r\n<span>Earthquake resistant RCC structure with light weight autoclaving aerated concrete (AAC) blocks.</span></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"margin-top: 10px;\">\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs  \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Affordable_Flats_in_Surat_kitchen_platform.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>KITCHEN</h4>\r\n<span>Granite top kitchen platform with S.S. sink and designer tiles dado up to lintel level.</span></div>\r\n</div>\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Flats_for_Sale_in_Surat_kota_stone.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>STORE</h4>\r\n<span>Kota stone racks with glazed tile dado.</span></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"margin-top: 10px;\">\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2BHK_Flat_for_Sale_in_Surat_conceled_plumbing.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>PLUMBING</h4>\r\n<span>Concealed plumbing with standard quality sanitary fittings and fixtures. Provision of concealed plumbing for central gas geyser connection.</span></div>\r\n</div>\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Surat_Flats_for_Sale_decorative_tiles.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>TOILET</h4>\r\n<span>Decorative tiles dado up to full height with designer concept. </span></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"margin-top: 10px;\">\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/3_BHK_Flats_in_Surat_conceled_electricity.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>ELECTRIFICATION</h4>\r\n<span>Sufficient points in concealed wiring with modular range accessories. Domestic points for house hold appliances. TV &amp; Telephone/Internet points in living room and Master bedroom. AC point in master bedroom. </span></div>\r\n</div>\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2_BHK_Flats_in_Surat_wooden_door.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>DOOR</h4>\r\n<span>Attractive main door in sal wood frame; other doors are both side laminated flush doors in sal wood frame. Mortised lock fittings in all the doors.</span></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"margin-top: 10px;\">\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2_BHK_Flats_in_Surat_coloured_wall.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>WALL FINISH</h4>\r\n<span>Interior surface of wall finished with plastic paint colour. Outer Surface of walls finished with acrylic base water repellent colour. Oil paints to door frames and grill.</span></div>\r\n</div>\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2BHK_Flat_in_Surat_sectioned_window.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>WINDOW</h4>\r\n<span>Anodised aluminium section window with reflective glass, fixed in granite frame, protected by safety grill.</span></div>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Affordable_2BHK_in_Surat_terrace.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>TERRACE</h4>\r\n<span>Water proofing on terrace with China Mosaic to reduce heat transmission.</span></div>\r\n</div>\r\n</div>\r\n</div>', 'No', '', '', '17-Sundaram-Residency_thumb.jpg', '', '', '', '', '2018-02-03', '2018-02-03', '', 17, 'D', '192.168.0.2', 'Yes', '', 'Yes', '<div class=\"amenities-block\">\n<div class=\"row\">\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Affordable_3BHK_in_Surat_vitrified_flooring.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>FLOORING</h4>\n<span>2&rsquo; X 2&rsquo; Granamite flooring. </span></div>\n</div>\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2_BHK_Flats_in_Surat_for_Sale_rcc_structure.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>STRUCTURE</h4>\n<span>Earthquake resistant RCC structure with light weight autoclaving aerated concrete (AAC) blocks.</span></div>\n</div>\n</div>\n<div class=\"row\" style=\"margin-top: 10px;\">\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs  \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Affordable_Flats_in_Surat_kitchen_platform.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>KITCHEN</h4>\n<span>Granite top kitchen platform with S.S. sink and designer tiles dado up to lintel level.</span></div>\n</div>\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Flats_for_Sale_in_Surat_kota_stone.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>STORE</h4>\n<span>Kota stone racks with glazed tile dado.</span></div>\n</div>\n</div>\n<div class=\"row\" style=\"margin-top: 10px;\">\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2BHK_Flat_for_Sale_in_Surat_conceled_plumbing.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>PLUMBING</h4>\n<span>Concealed plumbing with standard quality sanitary fittings and fixtures. Provision of concealed plumbing for central gas geyser connection.</span></div>\n</div>\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Surat_Flats_for_Sale_decorative_tiles.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>TOILET</h4>\n<span>Decorative tiles dado up to full height with designer concept. </span></div>\n</div>\n</div>\n<div class=\"row\" style=\"margin-top: 10px;\">\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/3_BHK_Flats_in_Surat_conceled_electricity.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>ELECTRIFICATION</h4>\n<span>Sufficient points in concealed wiring with modular range accessories. Domestic points for house hold appliances. TV &amp; Telephone/Internet points in living room and Master bedroom. AC point in master bedroom. </span></div>\n</div>\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2_BHK_Flats_in_Surat_wooden_door.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>DOOR</h4>\n<span>Attractive main door in sal wood frame; other doors are both side laminated flush doors in sal wood frame. Mortised lock fittings in all the doors.</span></div>\n</div>\n</div>\n<div class=\"row\" style=\"margin-top: 10px;\">\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2_BHK_Flats_in_Surat_coloured_wall.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>WALL FINISH</h4>\n<span>Interior surface of wall finished with plastic paint colour. Outer Surface of walls finished with acrylic base water repellent colour. Oil paints to door frames and grill.</span></div>\n</div>\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2BHK_Flat_in_Surat_sectioned_window.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>WINDOW</h4>\n<span>Anodised aluminium section window with reflective glass, fixed in granite frame, protected by safety grill.</span></div>\n</div>\n</div>\n<div class=\"row\">\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Affordable_2BHK_in_Surat_terrace.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>TERRACE</h4>\n<span>Water proofing on terrace with China Mosaic to reduce heat transmission.</span></div>\n</div>\n</div>\n</div>'),
(19, 5, 'kinaro', 'Residential ', '(3 BHK Riverview Apts)', '', 'Ongoing', '-', 'http://bit.ly/kinaro', 'PR/GJ/SURAT/SURAT CITY/SUDA/ RAA04233/041218', 'Katargam', '<ul>\r\n<li><img src=\"/upload/icon/parking.png\" alt=\"\" /> Alloted 2 nos. of car (small &amp; big) to each flat</li>\r\n<li><img src=\"/upload/icon/cctv.png\" alt=\"\" />C.C.T.V Security System</li>\r\n<li><img src=\"/upload/icon/intercom.png\" alt=\"\" />Intercom</li>\r\n<li><img src=\"/upload/icon/7star_carromroom.png\" alt=\"\" />Indoor Games</li>\r\n<li><img src=\"/upload/icon/7star_gym.png\" alt=\"\" />Gymnasium</li>\r\n<li><img src=\"/upload/icon/7star_yoga.png\" alt=\"\" />Yoga Room</li>\r\n<li><img src=\"/upload/icon/office-block.png\" alt=\"\" />Society Office</li>\r\n<li><img src=\"/upload/icon/7star_Banquet Hall.png\" alt=\"\" />Multi Purpose Hall</li>\r\n</ul>\r\n<ul>\r\n<li><img src=\"/upload/icon/cinema.png\" alt=\"\" />Open Air Theatre</li>\r\n<li><img src=\"/upload/icon/flowers-pot-of-yard.png\" alt=\"\" />Terrace Gardern</li>\r\n<li><img src=\"/upload/icon/7star_sketingrink.png\" alt=\"\" />Children Play Area</li>\r\n<li><img src=\"/upload/icon/gazebo.png\" alt=\"\" />Gazebo</li>\r\n<li><img src=\"/upload/icon/7star_oldageseating.png\" alt=\"\" />Senior Citizen Space</li>\r\n<li><img src=\"/upload/icon/gas_line.jpg\" alt=\"\" />Gas Line</li>\r\n<li><img src=\"/upload/icon/7star_joggingtrack.png\" alt=\"\" />Jogging Track</li>\r\n</ul>', 'Yes', 'kinaro_brochure.pdf', '', '19-kinaro_thumb.jpg', '', '', '', '', '2019-03-30', '2018-02-09', '', 1, 'E', '116.74.112.172', 'Yes', '', 'Yes', '<div id=\"p_specifications\" class=\"tab-pane fade   active in\">\r\n<p><strong>STRUCTURE:&nbsp;</strong> Earthquake resistance R.C.C. structure.</p>\r\n<p><strong>FLOORING:&nbsp;</strong> 32*32 granamite tile of good quality.</p>\r\n<p><strong>KITCHEN:&nbsp;&nbsp;</strong> Granite kitchen platform with sink and ceramic tile cladding upto lintel level.</p>\r\n<p><strong>STORE ROOM :&nbsp;</strong> Marble / Kota stone rakes with fully glazed tiles dedo.</p>\r\n<p><strong>TOILETS:&nbsp; </strong>Full height ceramic tile dedo with modern concept.</p>\r\n<p><strong>PLUMBING:&nbsp;&nbsp;</strong> Concealed CPVC &amp; UPVC plumbing with jaquar or eq. path fitting &amp; simpolo / cera or eq. sanitary ware. centred gas gyser system.</p>\r\n<p><strong>DOORS:&nbsp;&nbsp;</strong> Attractive main door in salwood frame &amp; Other doors as both side laminated flush doors in salwood/granite frame.</p>\r\n<p><strong>WINDOWS:&nbsp;&nbsp;</strong> Anodized aluminum section window with reflective glass fixed in granite frame with bright bar safety grill/railing.</p>\r\n<p><strong>POWER CONNECTION:&nbsp;</strong>1 electric power connection to each flat.</p>\r\n<p><strong>LIFT:&nbsp;&nbsp;</strong>2 nos. auto door lifts of 6 persons capacity kone / schindler or eq. in each building.</p>\r\n<p><strong>ELECTRIFICATION:</strong>&nbsp; Finolex or polycab or eq. copper wiring with ISI standard modular switches &amp; others fittings.</p>\r\n<p><strong>SURFACE FINISH :</strong>&nbsp; &nbsp;Mala plaster &amp; putty on interior surface. Double roller plaster (texture) and acrylic based water repellent color of standard make on exterior surface.</p>\r\n<p><strong>BACK-UP POWER:&nbsp;</strong> Generator for back-up power facility for elevators, parking &amp; common passage.</p>\r\n<p><strong>WATER SUPPLY :</strong>&nbsp; &nbsp;U.H &amp; Overhead tanks for SMC supplied water of sufficient storage capacity. Additional bore well for water supply in flush cock.</p>\r\n<p><strong>PASSAGE:&nbsp;&nbsp;</strong>Granamite flooring &amp; cladding of granite and texture.</p>\r\n<p><strong>STAIRCASE:&nbsp;&nbsp;</strong>Trade &amp; Rise and landing with granamite finish with S.S railing.</p>\r\n<p><strong>BALCONY RAILING:&nbsp;</strong> Combination S.S and glass and M.S fabrication.</p>\r\n<p><strong>TERRACE:&nbsp;&nbsp;</strong>Water proofing on terrace with china mosaic and tile floor finish.</p>\r\n</div>'),
(20, 7, 'Shaligram Flats', 'Residential ', '(2&3 BHK)', '', 'Completed', '-', 'http://bit.ly/shaligramflats', '', 'Opp. Green Avanue , Riverdale Circle , L.p Savani Road, Adajan, Surat', '', 'No', '', '', '20-Shaligram-Flats_thumb.jpg', '', '', 'https://www.youtube.com/embed/YVgKdc4yrYo', '', '2018-02-23', '2018-02-09', '', 20, 'E', '192.168.0.18', 'Yes', '', 'Yes', ''),
(21, 7, ' RAMESHWARAM ROWHOUSE', 'Residential ', '(ROWHOUSE)', '', 'Completed', '-', 'http://bit.ly/rameshwaramrowhouse', '', 'Nr. S.t Mark School, Dmart Adajan Road, Adajan, Surat', '', 'No', '', '', '21-RAMESHWARAM-ROWHOUSE_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-22', '', 21, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(23, 7, 'UPVAN ROWHOUSE', 'Residential ', '(ROWHOUSE)', '', 'Completed', '-', 'http://bit.ly/shaligramrutvan', '', 'Opp. Jyotindra Dave Garden, Adajan, Surat.', '', 'No', '', '', '23-UPVAN-ROWHOUSE_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-22', '', 23, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(24, 7, 'MADHUVAN', 'Residential ', '(1&2BHK)', '', 'Completed', '-', 'http://bit.ly/madhuvan', '', 'Opp. Shreeram Petrol Pump,  Adajan, Surat, ', '', 'No', '', '', '24-MADHUVAN_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-22', '', 24, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(25, 7, 'CLASSIC POINT', 'Residential', '(1&2 BHK)', '', 'Completed', '-', 'http://bit.ly/classicpoint', '', 'Anand Mahal Rd, Behind Sneha Sankulwadi,Anand Mahal Rd, Adajan, Surat.', '', 'No', '', '', '25-CLASSIC-POINT_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-22', '', 25, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(26, 5, 'THE PURSUIT OF HAPPINESS', 'Residential', '(3&4 BHK, Sky Villa)', '', 'Ongoing', '-', 'https://goo.gl/maps/Zpeisd55TfL2', 'PR/GJ/SURAT/SURAT CITY /SUDA/SMC/MAA04439/211218', 'Monarch Road, Pal Gam, Surat, Gujarat 395009', '<ul>\r\n<li>\r\n<p><strong>AMENITIES</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/garden.png\" alt=\"\" />Rock Garden</li>\r\n<li><img src=\"/upload/icon/7star_pooltable.png\" alt=\"\" />Indoor Games</li>\r\n<li><img src=\"/upload/icon/7star_zulaseating.png\" alt=\"\" />Jhula Seating</li>\r\n<li><img src=\"/upload/icon/cinema.png\" alt=\"\" />Open Air Theatre</li>\r\n<li><img src=\"/upload/icon/gate.png\" alt=\"\" />DESIGNER GATE WITH WATCHMAN CABIN AND SCHOOL PICK-UP / DROP OFF STAND</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p><strong>Children Play area</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/7star_(Sandpit).png\" alt=\"\" />Sand Pit</li>\r\n<li><img src=\"/upload/icon/wall.png\" alt=\"\" />Featured Wall</li>\r\n<li><img src=\"/upload/icon/7star_childrenindoorgame.png\" alt=\"\" />Toddler Zone</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p><strong>CLUB HOUSE AMENITIES</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/7star_carromroom.png\" alt=\"\" />Indoor Games</li>\r\n<li><img src=\"/upload/icon/7star_Banquet Hall.png\" alt=\"\" />Multipurpose Hall</li>\r\n<li><img src=\"/upload/icon/ac.png\" alt=\"\" />A.C. IN COMMON AMENITIES</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p><strong>AMENITIES FOR AESTHETIC PURPOSE</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/7star_waterbodyfountain.png\" alt=\"\" />Water Body</li>\r\n<li><img src=\"/upload/icon/7star_maditation.png\" alt=\"\" />Sculpture</li>\r\n<li><img src=\"/upload/icon/garden.png\" alt=\"\" />Aesthetic Landscape</li>\r\n<li><img src=\"/upload/icon/flowers-pot-of-yard.png\" alt=\"\" />Sky Garden With Seating-Barbeque</li>\r\n<li><img src=\"/upload/icon/7star_aerobics.png\" alt=\"\" />Double-Heighted Entrance Foyer</li>\r\n</ul>\r\n<ul>\r\n<li>\r\n<p><strong>AMENITIES FOR ELDERLY PEOPLE</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/senior.png\" alt=\"\" />Ramp And Wheel Chair Facility To Travel Everywhere In The Campus</li>\r\n<li><img src=\"/upload/icon/gazebo.png\" alt=\"\" />Senior Citizen Gazebo-Seating</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p><strong>AMENITIES FOR HEALTHY LIVING</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/wlkway.png\" alt=\"\" />Paved Walkway</li>\r\n<li><img src=\"/upload/icon/aid.png\" alt=\"\" />First-Aid-Kit</li>\r\n<li><img src=\"/upload/icon/flowers-pot-of-yard.png\" alt=\"\" />Party Lawn With Hanging Garden</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p><strong>ECO-FRIENDLY AMENITIES</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/solar_panel.png\" alt=\"\" />Solar Panels</li>\r\n<li><img src=\"/upload/icon/rain.png\" alt=\"\" />Rain Water Harvesting</li>\r\n<li><img src=\"/upload/icon/green.png\" alt=\"\" />IGBC (GREEN BUILDING) REGISTERED PROJECT</li>\r\n<li><img src=\"/upload/icon/window.png\" alt=\"\" />Reflective Glass In Windows</li>\r\n<li><img src=\"/upload/icon/light.png\" alt=\"\" />Energy Efficient Light In common Area</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p><strong>ADD ONs</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/parking.png\" alt=\"\" />2 Cars Reserved Parking</li>\r\n<li><img src=\"/upload/icon/gen.png\" alt=\"\" />Generator Facility For Common Area And 1.5Amp Power Back-up For Each Flat</li>\r\n<li><img src=\"/upload/icon/cctv.png\" alt=\"\" />CCTV Cameras in the Premises</li>\r\n<li><img src=\"/upload/icon/fingerprint.png\" alt=\"\" />FINGER PRINT DOOR LOCK ON MAIN DOORS</li>\r\n<li><img src=\"/upload/icon/intercom.png\" alt=\"\" />VIDEO DOOR PHONE AND INTERCOM</li>\r\n<li><img src=\"/upload/icon/gas_line.jpg\" alt=\"\" />Gujarat Gas Connection</li>\r\n</ul>', 'Yes', 'tpoh.pdf', '', 'projects_upcoming.jpg', '', '', '', '', '2019-03-30', '2019-01-15', '', 0, 'E', '116.74.112.172', 'Yes', '', 'Yes', '<div id=\"p_specifications\" class=\"tab-pane fade   active in\">\r\n<p><strong>STRUCTURE:&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>- CORE AND SHELL: </strong>EARTHQUAKE RESISTANT RCC FRAMED STRUCTURE WITH FLOOR HEIGHT OF 9\'10\" FROM SLAB TOP TO SLAB TOP</li>\r\n<li><strong>- MASONRY: </strong>HIGH QUALITY AUTOCLAVED AERATED CONCRETE BLOCKS</li>\r\n<li><strong>- INTERNAL WALLS: </strong>SINGLE COAT MALA PLASTER WITH PUTTI FINISHES</li>\r\n<li><strong>- EXTERNAL WALL: </strong>DOUBLE COAT ROLLER PLASTER WITH ASIAN PAINT OR EQUIVALENT ACRYLIC EXTERIOR PAINT</li>\r\n</ul>\r\n<br />\r\n<p><strong>- FLOORS:&nbsp;</strong> BASEMENT PARKING + GROUND LEVEL + 14 FLOORS</p>\r\n<br />\r\n<p><strong>- TERRACE:&nbsp;&nbsp;</strong> WATERPROOFING WITH CHEMICAL TREATMENT AND CHINA MOSAIC</p>\r\n<br />\r\n<p><strong>FLOORING AND DADO:&nbsp;</strong></p>\r\n<ul>\r\n<li>VITRIFIED FLOORING IN LIVING, DINING, KITCHEN AREA &amp; IN ALL BEDROOMS</li>\r\n<li>GRANITE FINISHED PLATFORM WITH QUARTZ SINK</li>\r\n<li>DECORATIVE GLAZED / PORCELAIN DADO TILES UPTO LINTEL LEVEL IN KITCHEN</li>\r\n<li>FULL HEIGHT DADO TILES AND ANTI-SKID FLOORING TILES WITH MODERN CONCEPT IN ALL BATHROOMS</li>\r\n<li>COMMON WASH BASIN WITH DADO TILES</li>\r\n<li>KOTA STONE RACKS WITH FULLY GLAZED TILES IN STORE ROOM</li>\r\n<li>KOTA FLOORING AND GLAZED DADO TILES WITH GRANITE SILL TOP IN WASH AREA</li>\r\n</ul>\r\n<br />\r\n<p><strong>SANITARY AND PLUMBING:&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>- WATER CLOSET: </strong>WALL HUNG WESTERN STYLE IN ALL BATHROOMS</li>\r\n<li><strong>- SANITARY FITTINGS: </strong>JAQUAR / SIMPOLO OR EQUIVALENT</li>\r\n<li><strong>- CP FITTINGS: </strong>JAQUAR OR EQUIVALENT WITH CONCEALED PLUMBING</li>\r\n<li><strong>- SHOWERS: </strong>STANDARD MAKE WALL HUNG SHOWERS IN ALL BATHROOMS</li>\r\n<li><strong>- WASH AREA: </strong>CENTRALLY GEYSER POINT PROVISION</li>\r\n<li><strong>- PLUMBING: </strong>cPVC and uPVC pipes</li>\r\n</ul>\r\n<br />\r\n<p><strong>ELECTRICAL:&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>- WIRING: </strong>R.R. / FINOLEX CABLES OR EQUIVALENT CONCEALED IN PVC CONDUIT PIPES WITH I.S.I. STANDARDS</li>\r\n<li><strong>- SWITCHES AND SOCKETS: </strong>M.K. / PANASONIC OR EQUIVALENT.<br />ALL NECESSARY DOMESTIC POINTS FOR HOUSEHOLD APPLIANCES.<br />TV AND AC POINTS IN LIVING ROOM AND ALL BEDROOMS</li>\r\n</ul>\r\n<br />\r\n<p><strong>DOORS AND WINDOWS:&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>- MAIN DOOR: </strong>WELL DESIGNED TEAK WOOD FRAMED MAIN DOOR WITH STANDARD MAKE HARDWARE FITTINGS</li>\r\n<li><strong>- INTERNAL DOORS: </strong>LAMINATED FLUSHED DOORS IN ALL BEDROOMS, BATHROOMS, WASH AND STORE</li>\r\n<li><strong>- SLIDING ALU. WINDOWS: </strong>ANODIZED COATED WINDOWS WITH REFLECTIVE GLASS FIXED IN GRANITE FRAMES</li>\r\n<li><strong>- FABRICATION: </strong>S.S. AND GLASS COMBINATION RAILINGS FOR STANDING BALCONY<br />M.S. SAFETY GRILLS FOR ALL WINDOWS</li>\r\n</ul>\r\n<br />\r\n<p><strong>PASSAGE AND STAIRCASE:&nbsp;</strong>TRADES AND LANDINGS WITH GRANITE / GRANAMITE FINISH AND RISER WITH GRANAMITE FINISH WITH S.S. RAILING</p>\r\n<br />\r\n<p><strong>LIFTS:&nbsp;</strong>2 Nos AUTO DOOR LIFTS OF SCHINDLER / KONE / OTIS OR EQUIVALENT FOR EACH BUILDING</p>\r\n<br />\r\n<p><strong>WATER SUPPLY:&nbsp;</strong>U.G. AND OVERHEAD TANKS FOR SMC SUPPLIED WATER OF SUFFICIENT STORAGE CAPACITY.</p>\r\n<br />\r\n<p><strong>SHOPS:&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>- SHUTTERS: </strong>MECHANICALLY OPERATED GALVANIZED ROLLING SHUTTER</li>\r\n<li><strong>- MASONRY: </strong>HIGH QUALITY AUTOCLAVED AERATED CONCRETE BLOCKS</li>\r\n<li><strong>- INTERNAL PLASTER: </strong>SINGLE COAT MALA PLASTER WITH PUTTI FINISHED</li>\r\n<li><strong>- FLOORING: </strong>STANDARD VITRIFIED FLOORING</li>\r\n<li><strong>- ELECTRIC POINTS: </strong>NECESSARY POINTS FOR A.C., FANS AND LIGHTS</li>\r\n<li><strong>- TOILETS: </strong>COMMON TOILETS FOR MEN AND WOMEN AS PER SMC PLAN PASS</li>\r\n</ul>\r\n<br />\r\n<p style=\"color: red;\"><strong>Note:&nbsp;</strong>ALL SPECIFICATIONS ABOVE ARE SUBJECT TO CHANGE. DECISIONS TAKEN FROM TIME TO TIME BY THE DEVELOPERS SHALL BE FINAL AND BINDING AND WILL BE FOR THE GOOD SAKE OF PROJECT IMPLEMENTATION <br />IN THE BRANDS MENTIONED ABOVE, THE DEVELOPERS MAY USE EQUIVALENT BRANDS AT THEIR DISCRETION.</p>\r\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `table 39`
--

CREATE TABLE `table 39` (
  `COL 1` int(2) DEFAULT NULL,
  `COL 2` int(1) DEFAULT NULL,
  `COL 3` varchar(24) DEFAULT NULL,
  `COL 4` varchar(12) DEFAULT NULL,
  `COL 5` varchar(23) DEFAULT NULL,
  `COL 6` varchar(1660) DEFAULT NULL,
  `COL 7` varchar(9) DEFAULT NULL,
  `COL 8` varchar(1) DEFAULT NULL,
  `COL 9` varchar(33) DEFAULT NULL,
  `COL 10` varchar(48) DEFAULT NULL,
  `COL 11` varchar(71) DEFAULT NULL,
  `COL 12` varchar(6033) DEFAULT NULL,
  `COL 13` varchar(3) DEFAULT NULL,
  `COL 14` varchar(19) DEFAULT NULL,
  `COL 15` varchar(35) DEFAULT NULL,
  `COL 16` varchar(34) DEFAULT NULL,
  `COL 17` varchar(10) DEFAULT NULL,
  `COL 18` varchar(10) DEFAULT NULL,
  `COL 19` varchar(41) DEFAULT NULL,
  `COL 20` varchar(10) DEFAULT NULL,
  `COL 21` varchar(10) DEFAULT NULL,
  `COL 22` varchar(10) DEFAULT NULL,
  `COL 23` varchar(10) DEFAULT NULL,
  `COL 24` int(2) DEFAULT NULL,
  `COL 25` varchar(1) DEFAULT NULL,
  `COL 26` varchar(14) DEFAULT NULL,
  `COL 27` varchar(3) DEFAULT NULL,
  `COL 28` varchar(10) DEFAULT NULL,
  `COL 29` varchar(3) DEFAULT NULL,
  `COL 30` varchar(5954) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table 39`
--

INSERT INTO `table 39` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`, `COL 9`, `COL 10`, `COL 11`, `COL 12`, `COL 13`, `COL 14`, `COL 15`, `COL 16`, `COL 17`, `COL 18`, `COL 19`, `COL 20`, `COL 21`, `COL 22`, `COL 23`, `COL 24`, `COL 25`, `COL 26`, `COL 27`, `COL 28`, `COL 29`, `COL 30`) VALUES
(9, 7, 'Shyamal shaligram', 'Residential ', '(ROWHOUSE)', '<p><span>A prime residential project fulfilling one\'s dream of pleasant home in the form of decent flats : \"Shaligram\" and graceful homes : \"Shyamal\" sharpening up at the outstanding habitable location in the Adajan area, a lush green and prime pocket of the fast growing city Surat.<br /> <br /> The location area is a decent dwelling environment preferred by the good civilized people and is too in close vicinity of well-reputed educational institutes, park &amp; gardens, playground, swimming pool, sports complex, temples, shopping malls &amp; superstores...</span></p>', 'Completed', '-', 'http://bit.ly/shaligramshyamal', '', 'Opp.SMC Sport Complex , L.p. Savani Road, Adajan, Surat', '', 'No', '', '', '9-Shyamal-shaligram_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-01', '', 8, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(10, 7, 'Silver crest', 'Residential ', '(2&3 BHK)', '<p><span>A splendid Exclusively Residential Apartment project envisaging truely defined homes in the form of graceful and well planned 3 BHK &amp; 2 BHK flats,... providing all modern amenities and facilities taking up shape of sculpture designed with consideration of earthquake resistant criteria, in the nation-eyed rapidly growing city SURAT... at aggressively developing &amp; prosperity promising ADAJAN area,... a fight location having pollution free, hygienic &amp; eco-friendly environment providing peaceful and pleasant living amongst good civic society,.. And is too in close proximity of well reputed educational institutes, parks &amp; gardens, playground, sport complex, swimming pool, temples, hospitals, shopping malls &amp; super stores... and is very near by the proposed state of art bridge connection to athwalines area.</span></p>', 'Completed', '-', 'http://bit.ly/shaligramcrest', '', 'L.P Savani To Green City Road, Adajan, Surat', '', 'No', '', '', '10-Silver-crest_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-01', '', 9, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(11, 7, 'Shaligram height', 'Residential ', '(2& 3 BHK)', '', 'Completed', '-', 'http://bit.ly/shaligramheight', '', 'Opp. Althan Water Works, Near Althan Char Rasta, Vip Road, Athan, Surat', '<h3>Salient feature</h3>\r\n<div class=\"project-detail-list\">\r\n<p>Gorgeous main gates with well-designed compound wall</p>\r\n<p>Well planned campus with elegant and aesthetic elevation</p>\r\n<p>Beautiful landscaped lush green garden with pleasant sit outs and water body</p>\r\n<p>Club house with indoor game facilities and well equipped common gymnasium</p>\r\n<p>Pleasant and spacious entrance foyer</p>\r\n<p>Distinguished children park with amusement equipment\'s</p>\r\n<p>Skating rink and jogging track</p>\r\n<p>CCTV camera system on main gates and entrance foyer</p>\r\n<p>Intercom facility in all flats</p>\r\n<p>Two high speed elevators of standard make for each building</p>\r\n<p>Backup generator for elevators, water pumps, lighting in common passage and parking and 4 light points in every flat.</p>\r\n<p>Gas connection and centralized plumbing for hot water</p>\r\n<p>Ample parking space with provision of minimum one car parking per flat</p>\r\n<p>SMC water supply with U/G and O/H storage tanks and bore well with separate O/H tank to each building</p>\r\n<p>Fire safety system installation</p>\r\n<p>Internal roads with RCC trimix and paver blocks</p>\r\n</div>', 'No', '', '', '11-Shaligram-height_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-01', '', 10, 'E', '192.168.0.21', 'Yes', '', 'Yes', '<p><strong>Structure :</strong> Earthquake resistant RCC structure with light weight auto clave aerated concrete block masonry</p>\r\n<p><strong>Flooring :</strong> V24 x 24 granamite flooring</p>\r\n<p><strong>kitchen :</strong> Granite kitchen platform with quartz sink and granamite cladding upto lintel level.</p>\r\n<p><strong>store :</strong> Kota stone racks with fully glazed tile dedo</p>\r\n<p><strong>toilets :</strong> Decorative tiles dedo to full heights with architectural concept</p>\r\n<p><strong>Plumbing :</strong> Concealed plumbing with &ldquo;Marc&rdquo; or eq. bath fittings and standard make sanitary ware</p>\r\n<p><strong>Doors :</strong> Attractive main door in salwood frame with decorative jali door. Other doors are both sides laminated flush doors in salwood frame</p>\r\n<p><strong>Windows :</strong> Anodized aluminum section window with reflective glass fixed in granite frame with safety grill</p>\r\n<p><strong>Electrification :</strong> Sufficient points in concealed wiring with modular range accessories Domestic points for household appliances TV and telephone points in living room and master bed room AC points in Master bedroom</p>\r\n<p><strong>Wall Finish :</strong> Interior surface of walls finished with white cement based putty Outer surface of walls finish with acrylic based water Repellant colour and elevative texture finish Oil paints to door frame and grills</p>\r\n<p><strong>Terrace :</strong> Water proofing on terrace with china mosaic flooring</p>'),
(22, 7, 'RUTVAN', 'Residential ', '(2&3 BHK)', '', 'Completed', '-', 'http://bit.ly/shaligramrutvan', '', 'Opp. Jyotindra Dave Garden, Adajan, Surat.', '', 'No', '', '', '22-RUTVAN_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-22', '', 22, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(12, 7, 'Vastugram', 'Residential', '', '', 'Completed', '-', 'http://bit.ly/vastugram', '', 'Nr. Happy Residency , Magdalla Road, Vesu Surat.', '<h3>Salient feature</h3>\r\n<p>Unique residential project comprising SIX towers, containing two flats per floor. Attractive main entrance foyer with reception. Clear and loanable titles. Planning as per vastu shastra.</p>\r\n<h3>Safety and security features</h3>\r\n<ul>\r\n<li>Attractive main gate with security cabin.</li>\r\n<li>Security system for campus.</li>\r\n<li>Video door phone &amp; intercom facilities from reception to each flat.</li>\r\n<li>Fire safety provision as per S.M.C. rules.</li>\r\n<li>Structural design as per earthquake standards.</li>\r\n<li>M.S. safety grill for all windows.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h3>General Facilities</h3>\r\n<ul>\r\n<li>Professionally designed and executed landscaping, children play area with Mordern equipment.</li>\r\n<li>Club house with high-tech modern gym equipment\'s and indoor game zone.</li>\r\n<li>Parking areas and internal roads to be covered with paving blocks &amp; trimix concrete.</li>\r\n<li>Allotted two car parking for each flat.</li>\r\n<li>Backup auto generator for common services &amp; sufficient ele. points in each flat.</li>\r\n<li>Two high speed auto door elevators of standard make for each building.</li>\r\n<li>S.M.C. water supply.</li>\r\n</ul>', 'No', '', '', '12-Vastugram_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-01', '', 12, 'E', '192.168.0.21', 'Yes', '', 'Yes', '<p><strong>Flooring :</strong> Premium quality 32\" X 32\" vitrified flooring in entire area except master bedroom wooden flooring in one master bedroom.</p>\r\n<p><strong>kitchen :</strong> Granite kitchen platform with quartz sink and granamite cladding upto lintel level.</p>\r\n<p><strong>Hot water system :</strong> Gas geyser with centralize plumbing system for each flat.</p>\r\n<p><strong>toilets/Plumbing :</strong> Decorative vitrified tiles dado upto lintel level with standard quality sanitary in all toilet and C.P. fitting of jaquar or similar brand.</p>\r\n<p><strong>Pure drinking water :</strong> R.O. water system in each flat.</p>\r\n<p><strong>Doors :</strong> Attractive main door in salwood frame with decorative jali door. Other doors are both sides laminated flush doors in salwood frame</p>\r\n<p><strong>Electrification :</strong> Sufficient points in concealed wiring with modular range accessories Domestic points for household appliances TV and telephone points in living room and master bed room AC points in Master bedroom</p>\r\n<p><strong>Wall Finish :</strong> Internal Wall - Waterproof putty on all plastered wall and ceiling, External Wall - Weather sealed colours of standard company and paints in common area.</p>\r\n<p><strong>A.C. :</strong> Two split A.C. in master bedroom, Split A.C. point in guest bedroom.</p>\r\n<p><strong>Windows :</strong> Colour anodized aluminum section of zindal make with reflective glass surrounded with granite frame.</p>'),
(13, 7, 'Safron homes', 'Residential ', '(4bhk lavish apt)', '', 'Completed', '-', 'http://bit.ly/safronhomes', '', 'Opp. Green Arcade ,L.P Savani Rd, Adajan Gam, Adajan, Surat.', '<p><strong>Special &amp; Additional Facilities :</strong></p>\r\n<ul>\r\n<li>Allotted 3 nos. of car parking to each flat.</li>\r\n<li>Well-equipped common gym for each building.</li>\r\n<li>Lush green garden space with pleasant sit-outs, fabulous fountains, water body and water fall.</li>\r\n<li>Playful children play area with outdoor play facility.</li>\r\n<li>C.C.T.V. and video door phone security system.</li>\r\n<li>Broadband +wifi internet facility.</li>\r\n<li>Individual water purification unit of standard make to each flat.</li>\r\n<li>Individual standard make split A.C. in two master bedroom to each flat.</li>\r\n<li>Gas connection and geyser with centralized plumbing for hot water.</li>\r\n</ul>', 'No', '', '', '13-Safron-homes_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-01', '', 4, 'E', '192.168.0.21', 'Yes', '', 'Yes', '<p><strong>Structure :</strong> Earthquake resistant R.C.C. structure.</p>\r\n<p><strong>Flooring :</strong> 1Mtr.X1Mtr. granamite flooring in all rooms.</p>\r\n<p><strong>kitchen :</strong> Granite kitchen platform with quartz sink and granamite cladding up to lintel level.</p>\r\n<p><strong>Store room :</strong> Kota stone rakes with fully glazed tile dado.</p>\r\n<p><strong>toilets :</strong> Full height granamite tile dedo with modern concept.</p>\r\n<p><strong>Plumbing :</strong> Concealed plumbing with Jaquar/Kohler or eq. bath fittings and RAK/Kohler or eq. Sanitary ware. Shower panel in two master bedroom toilets.</p>\r\n<p><strong>Doors :</strong> Attractive main door in salwood frame with decorative jali door. Other doors are both sides laminated flush doors in salwood frame</p>\r\n<p><strong>Windows :</strong> Anodized aluminum section window with reflective glass fixed in granite frame with bright bar safety grill.</p>\r\n<p><strong>Electrification :</strong> Finolex or eq. cable &amp; modular switches with I.S.I. standard fittings of good quality, T.V. and A.C. points in living room and bedrooms, Domestic points for household appliances.</p>\r\n<p><strong>Wall Finish paints :</strong> Interior surface of walls finish with mala plaster and white cement based putty or Gypsum plaster. Outer surface of wall finish with double coat roller plaster with texture and acrylic based water repellant color of standard make.</p>\r\n<p><strong>Terrace :</strong> Waterproofing on terrace with china mosaic flooring.</p>\r\n<p><strong>Lifts :</strong> Auto door lifts of kone / schendler or eq. having 8 persons capacity in each building.</p>\r\n<p><strong>Generator back-up :</strong> Back up generator for elevators, water pumps, common passage lighting &amp; parking and 10 light points in each flat.</p>\r\n<p><strong>Power Load :</strong> 3 Phase meter for each flat.</p>\r\n<p><strong>Supply of water :</strong> Uninterrupted corporation water supply pneumatic pressure for equal water pressure in shower panels. Additional bore well for water supply in flush cock.</p>\r\n<p><strong>Road Network :</strong> R.C.C. trimix (V.D.S.) / paver blocks of standard make.</p>\r\n<p><strong>Foyer :</strong> Exclusive entrance foyer with combination of italian marble &amp; granamite.</p>\r\n<p><strong>Passage :</strong> Granamite flooring &amp; combination of italian marble &amp; granamite cladding.</p>\r\n<p><strong>Staircase :</strong> Granite trade &amp; riser with granamite flooring &amp; S.S. railing.</p>\r\n<p><strong>Railing :</strong> Combination of S.S. &amp; Glass in balcony railing.</p>'),
(14, 8, 'Sapphire business hub', 'Commercial ', '(showrooms and offices)', '<p>Welcome to A premium place where you\'ll feel pretty prestige, Advantage fulfilment of achieving skymark success with every convenience and comfort and add a feather of prestige to your business address.</p>', 'Completed', '-', 'http://bit.ly/sapphirebusiness', '', 'Opp. Green Arcade ,L.P Savani Rd, Adajan Gam, Adajan, Surat.', '<p><strong>Structure :</strong> Earthquake resistant R.C.C. structure with light weight autoclave aerated concrete block masonry which reduce heat gain from outside &amp; enhance efficiency of air condition system resulting in saving electricity.</p>\r\n<p><strong>Flooring :</strong> Mtr. X Mtr. granamite flooring.</p>\r\n<p><strong>toilets :</strong> Full height granamite tile dedo with modern concept.</p>\r\n<p><strong>Doors / Shutter :</strong> Galvanized rolling shutter with mechanical operated for showrooms. Attractive main door in teakwood frame for offices.</p>\r\n<p><strong>Windows :</strong> Anodized aluminum section window with reflective glass fixed in granite frame with bright bar safety grill.</p>\r\n<p><strong>Electrification :</strong> Finolex or eq. cable wiring &amp; modular switches with I.S.I, standard fittings of good quality, T.V., A.C. &amp; telephone points in each unit, 3 phase electric meter in each unit.</p>\r\n<p><strong>Wall Finish paints :</strong> Interior surface of walls finish with mala plaster and white cement based putty or Gypsum plaster. Outer surface of wall finish with double coat roller plaster with texture and acrylic based water repellant color of standard make.</p>\r\n<p><strong>Terrace :</strong> Waterproofing on terrace with china mosaic flooring.</p>\r\n<p><strong>Lifts :</strong> 2 Nos. Auto door lifts of kone / schendler or eq. standard having 8 persons capacity.</p>\r\n<p><strong>Generator back-up :</strong> Back up generator for elevators, water pumps, common passage lighting &amp; parking and 10 light points in each flat.</p>\r\n<p><strong>Supply of water :</strong> Uninterrupted corporation water supply pneumatic pressure for equal water pressure in shower panels. Additional bore well for water supply in flush cock.</p>\r\n<p><strong>Road Network:</strong> R.C.C. trimix (V.D.S.) / paver blocks of standard make.</p>\r\n<p><strong>Foyer:</strong> Exclusive entrance foyer with combination of italian marble &amp; granamite.</p>\r\n<p><strong>Passage:</strong> Granamite flooring &amp; combination of italian marble &amp; granamite cladding.</p>\r\n<p><strong>Staircase:</strong> Granite trade &amp; riser with granamite flooring &amp; S.S. railing.</p>\r\n<p><strong>Elevation:</strong> Combination of A.C.P., glass &amp; aluminum fins.</p>', 'No', '', '', '14-Sapphire-business-hub_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-01', '', 3, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(15, 7, 'Shaligram signature', 'Residential', '', '', 'Ongoing', '', '', '', '', '<ul>\r\n<li>No.of floors: Basement parking + ground + 10 storied.</li>\r\n<li>Three side open 2 flats on each floor. Floor height: 11 feet.</li>\r\n<li>Alloted 3 Nos. of car parking to each flat.</li>\r\n<li>C.C.T.V. and video door phone security system.</li>\r\n<li>Individual water purification unit of standard make to each flat.</li>\r\n<li>Standard make split A.C. in 3 master bedrooms in every flat.</li>\r\n<li>Playful children play area with multi-activity play station for children.</li>\r\n<li>Well-equipped common gymnasium hall.</li>\r\n<li>Library hall of sufficient seating area capacity.</li>\r\n<li>Gas connection and gas gayer with flat wise centralized plumbing system providing hot water to every bathroom.</li>\r\n<li>Pressurized water supply to shower panels &amp; gas geyser.</li>\r\n<li>Shower panel in 2 Master bedrooms.</li>\r\n<li>Electronic locking system to main door.</li>\r\n<li>Terrace: Water proofing on china mosaic floor finish.</li>\r\n<li>Jogging track, Basketball practice pole, Skating rink, badminton court.</li>\r\n<li>Lush green garden space with water body and fabulous fountains, meditation center, gazebo sitting,multi purpose event stage.</li>\r\n<li>Indoor game: Pool table, Table tennis, Carom and Chess game port.</li>\r\n</ul>', 'Yes', 'Brochure_Com.pdf', '15-Shaligram-signature_location.jpg', '15-Shaligram-signature_thumb.jpg', '', '', '', '', '2018-02-09', '2018-02-01', '', 15, 'D', '192.168.0.13', 'Yes', '', 'Yes', ''),
(16, 4, 'Shaligram signature', 'Residential ', '(4bhk luxurious apts)', '', 'Ongoing', '-', 'http://bit.ly/shaligramsignature', '', 'B/H Sanjiv Kumar Auditorium , Opp. R.T.O Pal , Pal.', '<ul>\r\n<li><img src=\"/upload/icon/office-block.png\" alt=\"\" />No.of floors: Basement parking + ground + 10 storied.</li>\r\n<li><img src=\"/upload/icon/window.png\" alt=\"\" />Three side open 2 flats on each floor. Floor height: 11 feet.</li>\r\n<li><img src=\"/upload/icon/parking.png\" alt=\"\" />Allotted 3 Nos. of car parking to each flat.</li>\r\n<li><img src=\"/upload/icon/cctv.png\" alt=\"\" />C.C.T.V. and video door phone security system.</li>\r\n<li><img src=\"/upload/icon/water.png\" alt=\"\" />Individual water purification unit of standard make to each</li>\r\n</ul>', 'Yes', 'Brochure_Com.pdf', '', '16-Shaligram-signature_thumb.jpg', '', '', '', '', '2019-03-30', '2018-02-02', '', 28, 'E', '116.74.112.172', 'Yes', '', 'Yes', '<p><strong>Flooring :</strong>&nbsp;Italian marble in Living room, Dining &amp; Kitchen. Large size granamite in all Bedroom.</p>\r\n<p><strong>Kitchen :</strong> Granite kitchen platform with sink of carysil and granamite cladding up to lintel level.</p>\r\n<p><strong>Toilets :</strong> Full height granamite tile dedo with modern concept.</p>\r\n<p><strong>Doors / Shutter :</strong> Attractive teakwood main door along with jali door in teakwood frame and other doors as both side laminated flush doors in teak wood frame.</p>\r\n<p><strong>Plumbing :</strong> Concealed CPVC &amp; UPVC plumbing with jaquar bath fittings and&nbsp;simpolo sanitary ware.</p>\r\n<p><strong>Store room :</strong> Kota stone rakes with fully glazed tiles dado.</p>\r\n<p><strong>Surface Finish :</strong> Mala plaster and gypsum plaster on interior surface, Double coat roller plaster with texture and acrylic based water repellent color of standard make on exterior surface.</p>\r\n<p><strong>Windows :</strong>&nbsp;UPVC&nbsp;windows with tinted glass in granite frame and sill.</p>\r\n<p><strong>Power Connection :</strong> 3 Phase electric power connection to each flat.</p>\r\n<p><strong>Terrace :</strong> Waterproofing on terrace with china mosaic flooring.</p>\r\n<p><strong>Lifts :</strong> 2 Nos. Auto door lifts of schendler having 10 persons capacity.</p>\r\n<p><strong>Electrification :</strong> Finolex or eq. cable, copper wiring with I.S.I. standard modular switches and other fittings, and A.C. points in living room and all bedrooms, Necessary domestic points for household appliances.</p>\r\n<p><strong>Back-up-power :</strong> Generator for back-up power facility for elevators, water pumps,lighting in common passage, Parking and 10 light points in each flat.</p>\r\n<p><strong>Water Supply :</strong> U.G. and Overhead thanks for SMC supplied water of sufficient storage capacity. Additional bore wellfor</p>\r\n<p><strong>Balcony Railing :</strong> Combination of S.S. and glass.</p>\r\n<p><strong>Passage :</strong> Granamite flooring &amp; combination of italian marble &amp; granamite cladding.</p>\r\n<p><strong>Staircase :</strong> Granite trade &amp; riser with granamite flooring &amp; S.S. railing.</p>\r\n<p><strong>No.of floors :</strong>Basement parking + ground + 10 storied, Floor height: 11 feet.</p>'),
(17, 7, 'Sundaram Residency', 'Residential', '', '<p>Sundaram Residency brings you a comfortable home enhancing your lifestyle and makes it easier. A home that&rsquo;s exceptionally beautiful and reliable, it is designed to provide you lasting value and peace of mind in your budget. It balances traditional features you have come to relay on with innovative building science.</p>\r\n<p>Resounding with serenity and sophistication, Sundaram Residency is an array of amazing abodes. Innovatively design with aesthetic, the wondrous units complement all family needs. Each dwelling is significantly designed considering space and utility of all family members.</p>\r\n<p>We have &lsquo;Sundaram Residency,&rsquo; which brings to you comfortable living amidst exceptionally beautiful 3 BHK and 2 BHK flat for sale in Surat. Presenting the perfect blend of form, functionality and aesthetics, we design modern homes that are designed to provide lasting value and complete peace of mind within your budget. Innovative designs and architectural science combines aesthetic to create wondrous abodes that complement all family needs and budget.</p>\r\n<p>Resounding with sophistication and serenity, our Surat flats for sale are meticulously designed considering utility and space for all family members. We have crafted some of the best apartments for sale in Surat, combining the finest of design, architecture, aesthetics and technology. With affordability in mind, we create marvelous Surat apartments for sale that enhance living standards of our customers. We are built on a strong foundation of values and ethics, aiming to build astounding Surat flats for sale that redefine living experiences and affordability.</p>', 'Completed', '', '', '', '', '<div class=\"amenities-block\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Affordable_3BHK_in_Surat_vitrified_flooring.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>FLOORING</h4>\r\n<span>2&rsquo; X 2&rsquo; Granamite flooring. </span></div>\r\n</div>\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2_BHK_Flats_in_Surat_for_Sale_rcc_structure.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>STRUCTURE</h4>\r\n<span>Earthquake resistant RCC structure with light weight autoclaving aerated concrete (AAC) blocks.</span></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"margin-top: 10px;\">\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs  \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Affordable_Flats_in_Surat_kitchen_platform.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>KITCHEN</h4>\r\n<span>Granite top kitchen platform with S.S. sink and designer tiles dado up to lintel level.</span></div>\r\n</div>\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Flats_for_Sale_in_Surat_kota_stone.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>STORE</h4>\r\n<span>Kota stone racks with glazed tile dado.</span></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"margin-top: 10px;\">\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2BHK_Flat_for_Sale_in_Surat_conceled_plumbing.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>PLUMBING</h4>\r\n<span>Concealed plumbing with standard quality sanitary fittings and fixtures. Provision of concealed plumbing for central gas geyser connection.</span></div>\r\n</div>\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Surat_Flats_for_Sale_decorative_tiles.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>TOILET</h4>\r\n<span>Decorative tiles dado up to full height with designer concept. </span></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"margin-top: 10px;\">\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/3_BHK_Flats_in_Surat_conceled_electricity.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>ELECTRIFICATION</h4>\r\n<span>Sufficient points in concealed wiring with modular range accessories. Domestic points for house hold appliances. TV &amp; Telephone/Internet points in living room and Master bedroom. AC point in master bedroom. </span></div>\r\n</div>\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2_BHK_Flats_in_Surat_wooden_door.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>DOOR</h4>\r\n<span>Attractive main door in sal wood frame; other doors are both side laminated flush doors in sal wood frame. Mortised lock fittings in all the doors.</span></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"margin-top: 10px;\">\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2_BHK_Flats_in_Surat_coloured_wall.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>WALL FINISH</h4>\r\n<span>Interior surface of wall finished with plastic paint colour. Outer Surface of walls finished with acrylic base water repellent colour. Oil paints to door frames and grill.</span></div>\r\n</div>\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2BHK_Flat_in_Surat_sectioned_window.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>WINDOW</h4>\r\n<span>Anodised aluminium section window with reflective glass, fixed in granite frame, protected by safety grill.</span></div>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-sm-6 col-xs-12\">\r\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Affordable_2BHK_in_Surat_terrace.png\" alt=\"\" /></div>\r\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\r\n<h4>TERRACE</h4>\r\n<span>Water proofing on terrace with China Mosaic to reduce heat transmission.</span></div>\r\n</div>\r\n</div>\r\n</div>', 'No', '', '', '17-Sundaram-Residency_thumb.jpg', '', '', '', '', '2018-02-03', '2018-02-03', '', 17, 'D', '192.168.0.2', 'Yes', '', 'Yes', '<div class=\"amenities-block\">\n<div class=\"row\">\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Affordable_3BHK_in_Surat_vitrified_flooring.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>FLOORING</h4>\n<span>2&rsquo; X 2&rsquo; Granamite flooring. </span></div>\n</div>\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2_BHK_Flats_in_Surat_for_Sale_rcc_structure.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>STRUCTURE</h4>\n<span>Earthquake resistant RCC structure with light weight autoclaving aerated concrete (AAC) blocks.</span></div>\n</div>\n</div>\n<div class=\"row\" style=\"margin-top: 10px;\">\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs  \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Affordable_Flats_in_Surat_kitchen_platform.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>KITCHEN</h4>\n<span>Granite top kitchen platform with S.S. sink and designer tiles dado up to lintel level.</span></div>\n</div>\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Flats_for_Sale_in_Surat_kota_stone.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>STORE</h4>\n<span>Kota stone racks with glazed tile dado.</span></div>\n</div>\n</div>\n<div class=\"row\" style=\"margin-top: 10px;\">\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2BHK_Flat_for_Sale_in_Surat_conceled_plumbing.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>PLUMBING</h4>\n<span>Concealed plumbing with standard quality sanitary fittings and fixtures. Provision of concealed plumbing for central gas geyser connection.</span></div>\n</div>\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Surat_Flats_for_Sale_decorative_tiles.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>TOILET</h4>\n<span>Decorative tiles dado up to full height with designer concept. </span></div>\n</div>\n</div>\n<div class=\"row\" style=\"margin-top: 10px;\">\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/3_BHK_Flats_in_Surat_conceled_electricity.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>ELECTRIFICATION</h4>\n<span>Sufficient points in concealed wiring with modular range accessories. Domestic points for house hold appliances. TV &amp; Telephone/Internet points in living room and Master bedroom. AC point in master bedroom. </span></div>\n</div>\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2_BHK_Flats_in_Surat_wooden_door.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>DOOR</h4>\n<span>Attractive main door in sal wood frame; other doors are both side laminated flush doors in sal wood frame. Mortised lock fittings in all the doors.</span></div>\n</div>\n</div>\n<div class=\"row\" style=\"margin-top: 10px;\">\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2_BHK_Flats_in_Surat_coloured_wall.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>WALL FINISH</h4>\n<span>Interior surface of wall finished with plastic paint colour. Outer Surface of walls finished with acrylic base water repellent colour. Oil paints to door frames and grill.</span></div>\n</div>\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs \" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/2BHK_Flat_in_Surat_sectioned_window.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>WINDOW</h4>\n<span>Anodised aluminium section window with reflective glass, fixed in granite frame, protected by safety grill.</span></div>\n</div>\n</div>\n<div class=\"row\">\n<div class=\"col-sm-6 col-xs-12\">\n<div class=\"col-md-2 col-sm-4 hidden-xs\" style=\"padding-left: 0px;\"><img class=\"img-responsive\" style=\"border-right: 1px solid;\" src=\"/images/shaligram_images/project/sundaram_residency/specification/Affordable_2BHK_in_Surat_terrace.png\" alt=\"\" /></div>\n<div class=\"col-md-10 col-sm-8 col-xs-12\" style=\"padding-left: 0px;\">\n<h4>TERRACE</h4>\n<span>Water proofing on terrace with China Mosaic to reduce heat transmission.</span></div>\n</div>\n</div>\n</div>'),
(19, 5, 'kinaro', 'Residential ', '(3 BHK Riverview Apts)', '', 'Ongoing', '-', 'http://bit.ly/kinaro', 'PR/GJ/SURAT/SURAT CITY/SUDA/ RAA04233/041218', 'Katargam', '<ul>\r\n<li><img src=\"/upload/icon/parking.png\" alt=\"\" /> Alloted 2 nos. of car (small &amp; big) to each flat</li>\r\n<li><img src=\"/upload/icon/cctv.png\" alt=\"\" />C.C.T.V Security System</li>\r\n<li><img src=\"/upload/icon/intercom.png\" alt=\"\" />Intercom</li>\r\n<li><img src=\"/upload/icon/7star_carromroom.png\" alt=\"\" />Indoor Games</li>\r\n<li><img src=\"/upload/icon/7star_gym.png\" alt=\"\" />Gymnasium</li>\r\n<li><img src=\"/upload/icon/7star_yoga.png\" alt=\"\" />Yoga Room</li>\r\n<li><img src=\"/upload/icon/office-block.png\" alt=\"\" />Society Office</li>\r\n<li><img src=\"/upload/icon/7star_Banquet Hall.png\" alt=\"\" />Multi Purpose Hall</li>\r\n</ul>\r\n<ul>\r\n<li><img src=\"/upload/icon/cinema.png\" alt=\"\" />Open Air Theatre</li>\r\n<li><img src=\"/upload/icon/flowers-pot-of-yard.png\" alt=\"\" />Terrace Gardern</li>\r\n<li><img src=\"/upload/icon/7star_sketingrink.png\" alt=\"\" />Children Play Area</li>\r\n<li><img src=\"/upload/icon/gazebo.png\" alt=\"\" />Gazebo</li>\r\n<li><img src=\"/upload/icon/7star_oldageseating.png\" alt=\"\" />Senior Citizen Space</li>\r\n<li><img src=\"/upload/icon/gas_line.jpg\" alt=\"\" />Gas Line</li>\r\n<li><img src=\"/upload/icon/7star_joggingtrack.png\" alt=\"\" />Jogging Track</li>\r\n</ul>', 'Yes', 'kinaro_brochure.pdf', '', '19-kinaro_thumb.jpg', '', '', '', '', '2019-03-30', '2018-02-09', '', 1, 'E', '116.74.112.172', 'Yes', '', 'Yes', '<div id=\"p_specifications\" class=\"tab-pane fade   active in\">\r\n<p><strong>STRUCTURE:&nbsp;</strong> Earthquake resistance R.C.C. structure.</p>\r\n<p><strong>FLOORING:&nbsp;</strong> 32*32 granamite tile of good quality.</p>\r\n<p><strong>KITCHEN:&nbsp;&nbsp;</strong> Granite kitchen platform with sink and ceramic tile cladding upto lintel level.</p>\r\n<p><strong>STORE ROOM :&nbsp;</strong> Marble / Kota stone rakes with fully glazed tiles dedo.</p>\r\n<p><strong>TOILETS:&nbsp; </strong>Full height ceramic tile dedo with modern concept.</p>\r\n<p><strong>PLUMBING:&nbsp;&nbsp;</strong> Concealed CPVC &amp; UPVC plumbing with jaquar or eq. path fitting &amp; simpolo / cera or eq. sanitary ware. centred gas gyser system.</p>\r\n<p><strong>DOORS:&nbsp;&nbsp;</strong> Attractive main door in salwood frame &amp; Other doors as both side laminated flush doors in salwood/granite frame.</p>\r\n<p><strong>WINDOWS:&nbsp;&nbsp;</strong> Anodized aluminum section window with reflective glass fixed in granite frame with bright bar safety grill/railing.</p>\r\n<p><strong>POWER CONNECTION:&nbsp;</strong>1 electric power connection to each flat.</p>\r\n<p><strong>LIFT:&nbsp;&nbsp;</strong>2 nos. auto door lifts of 6 persons capacity kone / schindler or eq. in each building.</p>\r\n<p><strong>ELECTRIFICATION:</strong>&nbsp; Finolex or polycab or eq. copper wiring with ISI standard modular switches &amp; others fittings.</p>\r\n<p><strong>SURFACE FINISH :</strong>&nbsp; &nbsp;Mala plaster &amp; putty on interior surface. Double roller plaster (texture) and acrylic based water repellent color of standard make on exterior surface.</p>\r\n<p><strong>BACK-UP POWER:&nbsp;</strong> Generator for back-up power facility for elevators, parking &amp; common passage.</p>\r\n<p><strong>WATER SUPPLY :</strong>&nbsp; &nbsp;U.H &amp; Overhead tanks for SMC supplied water of sufficient storage capacity. Additional bore well for water supply in flush cock.</p>\r\n<p><strong>PASSAGE:&nbsp;&nbsp;</strong>Granamite flooring &amp; cladding of granite and texture.</p>\r\n<p><strong>STAIRCASE:&nbsp;&nbsp;</strong>Trade &amp; Rise and landing with granamite finish with S.S railing.</p>\r\n<p><strong>BALCONY RAILING:&nbsp;</strong> Combination S.S and glass and M.S fabrication.</p>\r\n<p><strong>TERRACE:&nbsp;&nbsp;</strong>Water proofing on terrace with china mosaic and tile floor finish.</p>\r\n</div>'),
(20, 7, 'Shaligram Flats', 'Residential ', '(2&3 BHK)', '', 'Completed', '-', 'http://bit.ly/shaligramflats', '', 'Opp. Green Avanue , Riverdale Circle , L.p Savani Road, Adajan, Surat', '', 'No', '', '', '20-Shaligram-Flats_thumb.jpg', '', '', 'https://www.youtube.com/embed/YVgKdc4yrYo', '', '2018-02-23', '2018-02-09', '', 20, 'E', '192.168.0.18', 'Yes', '', 'Yes', ''),
(21, 7, ' RAMESHWARAM ROWHOUSE', 'Residential ', '(ROWHOUSE)', '', 'Completed', '-', 'http://bit.ly/rameshwaramrowhouse', '', 'Nr. S.t Mark School, Dmart Adajan Road, Adajan, Surat', '', 'No', '', '', '21-RAMESHWARAM-ROWHOUSE_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-22', '', 21, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(23, 7, 'UPVAN ROWHOUSE', 'Residential ', '(ROWHOUSE)', '', 'Completed', '-', 'http://bit.ly/shaligramrutvan', '', 'Opp. Jyotindra Dave Garden, Adajan, Surat.', '', 'No', '', '', '23-UPVAN-ROWHOUSE_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-22', '', 23, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(24, 7, 'MADHUVAN', 'Residential ', '(1&2BHK)', '', 'Completed', '-', 'http://bit.ly/madhuvan', '', 'Opp. Shreeram Petrol Pump,  Adajan, Surat, ', '', 'No', '', '', '24-MADHUVAN_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-22', '', 24, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(25, 7, 'CLASSIC POINT', 'Residential', '(1&2 BHK)', '', 'Completed', '-', 'http://bit.ly/classicpoint', '', 'Anand Mahal Rd, Behind Sneha Sankulwadi,Anand Mahal Rd, Adajan, Surat.', '', 'No', '', '', '25-CLASSIC-POINT_thumb.jpg', '', '', '', '', '2018-02-22', '2018-02-22', '', 25, 'E', '192.168.0.21', 'Yes', '', 'Yes', ''),
(26, 5, 'THE PURSUIT OF HAPPINESS', 'Residential', '(3&4 BHK, Sky Villa)', '', 'Ongoing', '-', 'https://goo.gl/maps/Zpeisd55TfL2', 'PR/GJ/SURAT/SURAT CITY /SUDA/SMC/MAA04439/211218', 'Monarch Road, Pal Gam, Surat, Gujarat 395009', '<ul>\r\n<li>\r\n<p><strong>AMENITIES</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/garden.png\" alt=\"\" />Rock Garden</li>\r\n<li><img src=\"/upload/icon/7star_pooltable.png\" alt=\"\" />Indoor Games</li>\r\n<li><img src=\"/upload/icon/7star_zulaseating.png\" alt=\"\" />Jhula Seating</li>\r\n<li><img src=\"/upload/icon/cinema.png\" alt=\"\" />Open Air Theatre</li>\r\n<li><img src=\"/upload/icon/gate.png\" alt=\"\" />DESIGNER GATE WITH WATCHMAN CABIN AND SCHOOL PICK-UP / DROP OFF STAND</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p><strong>Children Play area</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/7star_(Sandpit).png\" alt=\"\" />Sand Pit</li>\r\n<li><img src=\"/upload/icon/wall.png\" alt=\"\" />Featured Wall</li>\r\n<li><img src=\"/upload/icon/7star_childrenindoorgame.png\" alt=\"\" />Toddler Zone</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p><strong>CLUB HOUSE AMENITIES</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/7star_carromroom.png\" alt=\"\" />Indoor Games</li>\r\n<li><img src=\"/upload/icon/7star_Banquet Hall.png\" alt=\"\" />Multipurpose Hall</li>\r\n<li><img src=\"/upload/icon/ac.png\" alt=\"\" />A.C. IN COMMON AMENITIES</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p><strong>AMENITIES FOR AESTHETIC PURPOSE</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/7star_waterbodyfountain.png\" alt=\"\" />Water Body</li>\r\n<li><img src=\"/upload/icon/7star_maditation.png\" alt=\"\" />Sculpture</li>\r\n<li><img src=\"/upload/icon/garden.png\" alt=\"\" />Aesthetic Landscape</li>\r\n<li><img src=\"/upload/icon/flowers-pot-of-yard.png\" alt=\"\" />Sky Garden With Seating-Barbeque</li>\r\n<li><img src=\"/upload/icon/7star_aerobics.png\" alt=\"\" />Double-Heighted Entrance Foyer</li>\r\n</ul>\r\n<ul>\r\n<li>\r\n<p><strong>AMENITIES FOR ELDERLY PEOPLE</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/senior.png\" alt=\"\" />Ramp And Wheel Chair Facility To Travel Everywhere In The Campus</li>\r\n<li><img src=\"/upload/icon/gazebo.png\" alt=\"\" />Senior Citizen Gazebo-Seating</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p><strong>AMENITIES FOR HEALTHY LIVING</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/wlkway.png\" alt=\"\" />Paved Walkway</li>\r\n<li><img src=\"/upload/icon/aid.png\" alt=\"\" />First-Aid-Kit</li>\r\n<li><img src=\"/upload/icon/flowers-pot-of-yard.png\" alt=\"\" />Party Lawn With Hanging Garden</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p><strong>ECO-FRIENDLY AMENITIES</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/solar_panel.png\" alt=\"\" />Solar Panels</li>\r\n<li><img src=\"/upload/icon/rain.png\" alt=\"\" />Rain Water Harvesting</li>\r\n<li><img src=\"/upload/icon/green.png\" alt=\"\" />IGBC (GREEN BUILDING) REGISTERED PROJECT</li>\r\n<li><img src=\"/upload/icon/window.png\" alt=\"\" />Reflective Glass In Windows</li>\r\n<li><img src=\"/upload/icon/light.png\" alt=\"\" />Energy Efficient Light In common Area</li>\r\n<li>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p><strong>ADD ONs</strong></p>\r\n</li>\r\n<li><img src=\"/upload/icon/parking.png\" alt=\"\" />2 Cars Reserved Parking</li>\r\n<li><img src=\"/upload/icon/gen.png\" alt=\"\" />Generator Facility For Common Area And 1.5Amp Power Back-up For Each Flat</li>\r\n<li><img src=\"/upload/icon/cctv.png\" alt=\"\" />CCTV Cameras in the Premises</li>\r\n<li><img src=\"/upload/icon/fingerprint.png\" alt=\"\" />FINGER PRINT DOOR LOCK ON MAIN DOORS</li>\r\n<li><img src=\"/upload/icon/intercom.png\" alt=\"\" />VIDEO DOOR PHONE AND INTERCOM</li>\r\n<li><img src=\"/upload/icon/gas_line.jpg\" alt=\"\" />Gujarat Gas Connection</li>\r\n</ul>', 'Yes', 'tpoh.pdf', '', 'projects_upcoming.jpg', '', '', '', '', '2019-03-30', '2019-01-15', '', 0, 'E', '116.74.112.172', 'Yes', '', 'Yes', '<div id=\"p_specifications\" class=\"tab-pane fade   active in\">\r\n<p><strong>STRUCTURE:&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>- CORE AND SHELL: </strong>EARTHQUAKE RESISTANT RCC FRAMED STRUCTURE WITH FLOOR HEIGHT OF 9\'10\" FROM SLAB TOP TO SLAB TOP</li>\r\n<li><strong>- MASONRY: </strong>HIGH QUALITY AUTOCLAVED AERATED CONCRETE BLOCKS</li>\r\n<li><strong>- INTERNAL WALLS: </strong>SINGLE COAT MALA PLASTER WITH PUTTI FINISHES</li>\r\n<li><strong>- EXTERNAL WALL: </strong>DOUBLE COAT ROLLER PLASTER WITH ASIAN PAINT OR EQUIVALENT ACRYLIC EXTERIOR PAINT</li>\r\n</ul>\r\n<br />\r\n<p><strong>- FLOORS:&nbsp;</strong> BASEMENT PARKING + GROUND LEVEL + 14 FLOORS</p>\r\n<br />\r\n<p><strong>- TERRACE:&nbsp;&nbsp;</strong> WATERPROOFING WITH CHEMICAL TREATMENT AND CHINA MOSAIC</p>\r\n<br />\r\n<p><strong>FLOORING AND DADO:&nbsp;</strong></p>\r\n<ul>\r\n<li>VITRIFIED FLOORING IN LIVING, DINING, KITCHEN AREA &amp; IN ALL BEDROOMS</li>\r\n<li>GRANITE FINISHED PLATFORM WITH QUARTZ SINK</li>\r\n<li>DECORATIVE GLAZED / PORCELAIN DADO TILES UPTO LINTEL LEVEL IN KITCHEN</li>\r\n<li>FULL HEIGHT DADO TILES AND ANTI-SKID FLOORING TILES WITH MODERN CONCEPT IN ALL BATHROOMS</li>\r\n<li>COMMON WASH BASIN WITH DADO TILES</li>\r\n<li>KOTA STONE RACKS WITH FULLY GLAZED TILES IN STORE ROOM</li>\r\n<li>KOTA FLOORING AND GLAZED DADO TILES WITH GRANITE SILL TOP IN WASH AREA</li>\r\n</ul>\r\n<br />\r\n<p><strong>SANITARY AND PLUMBING:&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>- WATER CLOSET: </strong>WALL HUNG WESTERN STYLE IN ALL BATHROOMS</li>\r\n<li><strong>- SANITARY FITTINGS: </strong>JAQUAR / SIMPOLO OR EQUIVALENT</li>\r\n<li><strong>- CP FITTINGS: </strong>JAQUAR OR EQUIVALENT WITH CONCEALED PLUMBING</li>\r\n<li><strong>- SHOWERS: </strong>STANDARD MAKE WALL HUNG SHOWERS IN ALL BATHROOMS</li>\r\n<li><strong>- WASH AREA: </strong>CENTRALLY GEYSER POINT PROVISION</li>\r\n<li><strong>- PLUMBING: </strong>cPVC and uPVC pipes</li>\r\n</ul>\r\n<br />\r\n<p><strong>ELECTRICAL:&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>- WIRING: </strong>R.R. / FINOLEX CABLES OR EQUIVALENT CONCEALED IN PVC CONDUIT PIPES WITH I.S.I. STANDARDS</li>\r\n<li><strong>- SWITCHES AND SOCKETS: </strong>M.K. / PANASONIC OR EQUIVALENT.<br />ALL NECESSARY DOMESTIC POINTS FOR HOUSEHOLD APPLIANCES.<br />TV AND AC POINTS IN LIVING ROOM AND ALL BEDROOMS</li>\r\n</ul>\r\n<br />\r\n<p><strong>DOORS AND WINDOWS:&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>- MAIN DOOR: </strong>WELL DESIGNED TEAK WOOD FRAMED MAIN DOOR WITH STANDARD MAKE HARDWARE FITTINGS</li>\r\n<li><strong>- INTERNAL DOORS: </strong>LAMINATED FLUSHED DOORS IN ALL BEDROOMS, BATHROOMS, WASH AND STORE</li>\r\n<li><strong>- SLIDING ALU. WINDOWS: </strong>ANODIZED COATED WINDOWS WITH REFLECTIVE GLASS FIXED IN GRANITE FRAMES</li>\r\n<li><strong>- FABRICATION: </strong>S.S. AND GLASS COMBINATION RAILINGS FOR STANDING BALCONY<br />M.S. SAFETY GRILLS FOR ALL WINDOWS</li>\r\n</ul>\r\n<br />\r\n<p><strong>PASSAGE AND STAIRCASE:&nbsp;</strong>TRADES AND LANDINGS WITH GRANITE / GRANAMITE FINISH AND RISER WITH GRANAMITE FINISH WITH S.S. RAILING</p>\r\n<br />\r\n<p><strong>LIFTS:&nbsp;</strong>2 Nos AUTO DOOR LIFTS OF SCHINDLER / KONE / OTIS OR EQUIVALENT FOR EACH BUILDING</p>\r\n<br />\r\n<p><strong>WATER SUPPLY:&nbsp;</strong>U.G. AND OVERHEAD TANKS FOR SMC SUPPLIED WATER OF SUFFICIENT STORAGE CAPACITY.</p>\r\n<br />\r\n<p><strong>SHOPS:&nbsp;</strong></p>\r\n<ul>\r\n<li><strong>- SHUTTERS: </strong>MECHANICALLY OPERATED GALVANIZED ROLLING SHUTTER</li>\r\n<li><strong>- MASONRY: </strong>HIGH QUALITY AUTOCLAVED AERATED CONCRETE BLOCKS</li>\r\n<li><strong>- INTERNAL PLASTER: </strong>SINGLE COAT MALA PLASTER WITH PUTTI FINISHED</li>\r\n<li><strong>- FLOORING: </strong>STANDARD VITRIFIED FLOORING</li>\r\n<li><strong>- ELECTRIC POINTS: </strong>NECESSARY POINTS FOR A.C., FANS AND LIGHTS</li>\r\n<li><strong>- TOILETS: </strong>COMMON TOILETS FOR MEN AND WOMEN AS PER SMC PLAN PASS</li>\r\n</ul>\r\n<br />\r\n<p style=\"color: red;\"><strong>Note:&nbsp;</strong>ALL SPECIFICATIONS ABOVE ARE SUBJECT TO CHANGE. DECISIONS TAKEN FROM TIME TO TIME BY THE DEVELOPERS SHALL BE FINAL AND BINDING AND WILL BE FOR THE GOOD SAKE OF PROJECT IMPLEMENTATION <br />IN THE BRANDS MENTIONED ABOVE, THE DEVELOPERS MAY USE EQUIVALENT BRANDS AT THEIR DISCRETION.</p>\r\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `template_master`
--

CREATE TABLE `template_master` (
  `template_id` int(11) NOT NULL,
  `template_name` varchar(100) NOT NULL,
  `template_title` varchar(100) NOT NULL,
  `sortorder` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_master`
--

INSERT INTO `template_master` (`template_id`, `template_name`, `template_title`, `sortorder`) VALUES
(1, 'inner_page.tpl.php', 'Inner Page Template', 1),
(3, 'full_width_page.tpl.php', 'full_width_page', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_Id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `review` text NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `modifieddate` date DEFAULT NULL,
  `sortorder` int(8) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `remote_ip` varchar(100) DEFAULT NULL,
  `testimonial_type` varchar(256) NOT NULL,
  `tour_Name` varchar(256) NOT NULL,
  `home` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_Id`, `name`, `designation`, `image`, `review`, `username`, `createdate`, `modifieddate`, `sortorder`, `status`, `remote_ip`, `testimonial_type`, `tour_Name`, `home`) VALUES
(1, 'Mrs. BHAVISHA', '', '1-testimonial-3.jpg', 'By using Facial Cryo my facial skin become brighter and glowing. Highly recommend for Beauty.', 'Keyur', '2016-12-19', '2018-09-28', 1, 'E', '116.74.112.240', '1', 'Surat', 'Y'),
(2, 'Mrs. SHREYA SHAH', '', '2-testimonial-2.jpg', 'First time trying Cryotherapy, I was nervous, but the process was explained well and the staff was knowledgeable and polite.', 'Keyur', '2016-12-19', '2018-09-28', 2, 'E', '116.74.112.240', '1', 'Surat', 'Y'),
(4, 'Mr. MUKESH PATEL', '', '', 'Yugeva Cryo Centre has proved to provide the best quality service.', 'Keyur', '2017-03-29', '2018-09-28', 3, 'E', '116.74.112.240', '3', 'Surat', ''),
(7, 'Mr. MANISH TAMAKUWALA', NULL, '', 'Facing Psoriasis from last 4 years, after coupling 5-6 sessions of WBC I feel 60% of recovery.  ', 'Keyur', '2017-12-29', '2018-09-28', 4, 'E', '116.74.112.240', '1', 'Surat', ''),
(9, 'Mr. AMAR RAVAL', NULL, '', 'When you get out of it you feel really good, like youâ€™ve got a ton of energy & liveliness â€¦ the benefits of that are huge.', 'Keyur', '2017-12-29', '2018-09-28', 6, 'E', '116.74.112.240', '1', 'Surat', ''),
(10, ' Mr. PRASHANT DESAI', NULL, '', 'I have Psoriasis from last 30 years and after taking 5 sessions of Whole body cryotherapy there is 35% recovery. I believe this therapy will help to cure my Psoriasis. Also this has helped me to come out of depression.', 'Keyur', '2018-08-23', '2018-09-28', 7, 'E', '116.74.112.240', '1', 'Surat', ''),
(11, 'Ms. BHAVISHA', NULL, '', 'My experience with Yugevacryo is very nice. Facial Cryotherapy has enhanced my beauty. My skin has become more brighter, tighter and glowing.', 'Keyur', '2018-08-23', '2018-09-28', 8, 'E', '116.74.112.240', '1', 'Surat', ''),
(12, 'Mr. SHIVAM SHARMA', NULL, '', 'Being an athlete I get injuries quite often. When I visited Yugevacryo I was suffering from acute back pain since 5 years. With the treatment it has minimized to hardly 5-10%.  Overall stamina has increased. Also my migraine has marginally reduced. Kudos to the team for bringing quality treatment to India. Will surely recommend to others.', 'Keyur', '2018-08-23', '2018-09-28', 9, 'E', '116.74.112.240', '1', 'Surat', ''),
(13, 'Mr. NIHAR PATEL', NULL, '', 'I had hip joint operation. Due to which i was not even able to walk properly. I was suffering from severe pain and stiffness. Before Navratri  I started taking cryotherapy which gave me immense benefits that to after the very  first session. And after taking 8 to 10 sessions I got relieved from pain and played Navratri very well.', 'Keyur', '2018-09-28', '2018-09-28', 10, 'E', '116.74.112.240', '1', 'Surat', ''),
(14, 'Mrs. BHAVNA LAKHANI', NULL, NULL, 'I am taking targeted cryotherapy for Arthritis pain. Before taking this therapy I had intolerable chronic pain in my joints and fingers. It was very difficult for me to move my hand and to work as a housewife.\r\n\r\nAfter 10 sessions of whole boy cryotherapy and targeted cryotherapy, I got miracle result in my arthritis pain, even I wad able to work without pain. I am very happy with the results which I got from cryotherapy.\r\n\r\nThanks to Yugeva Cryo', 'Keyur', '2018-09-28', NULL, 11, 'E', '116.74.112.240', '1', 'Surat', ''),
(15, 'Mrs. JINAL PATEL', NULL, '', 'My skin has improved a lot in 10 sessions of Whole Body Cryotherapy and Facial Cryotherapy. There is a glow on my skin. I feel younger. Also my health has improved. I feel healthier than before.', 'Keyur', '2018-09-28', '2018-09-28', 12, 'E', '116.74.112.240', '1', 'Surat', ''),
(16, 'Ms. KARISHMA DESAI', NULL, '', 'Facial cryotherapy has enhanced my beauty. Firstly I didn\'t believe it will be helpful to my skin but after taking few sessions I must say it\'s worth it. Highly recommended to the people who are concerned about their skin.', 'Keyur', '2018-09-28', '2018-09-28', 13, 'E', '116.74.112.240', '1', 'Surat', ''),
(17, 'Mr. SHIVLAL SAKARIA', NULL, NULL, 'I am suffering from chornic leg pain since 2 years. After the very second session  I feel the difference. There is lot of improvement in my left leg after 5 sessions. Worth it.', 'Keyur', '2018-09-28', NULL, 14, 'E', '116.74.112.240', '1', 'Surat', ''),
(18, 'Mrs. SHILA SAKARIA', NULL, NULL, 'This treatment is very effective for weight loss. I lost 2 kg after 3 sessions of Whole Body Cryotherapy.  Apart from weight loss  there are many other benefits.  I feel more energetic  and more fit.', 'Keyur', '2018-09-28', NULL, 15, 'E', '116.74.112.240', '1', 'Surat', ''),
(19, 'Mrs. RINA PATEL', NULL, NULL, 'With Yugeva Cryo  I had very good experience. Took 5 facial cryotherapy sessions. A lot of improvement in my skin face. It has toned and tightened my skin. Even my pores size has reduced. Will surely recommend to others.', 'Keyur', '2018-09-28', NULL, 16, 'E', '116.74.112.240', '1', 'Surat', ''),
(20, 'Mr. PARESH DESAI', NULL, NULL, 'I am suffering from Psoriasis from past 8 years. After taking 10 sessions of cryotherapy  I am very happy with the result. Reduction in pain and inflammation. Definitely good for skin and Psoriasis.', 'Keyur', '2018-09-28', NULL, 17, 'E', '116.74.112.240', '1', 'Surat', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_master`
--

CREATE TABLE `testimonial_master` (
  `testimonial_master_id` int(11) NOT NULL,
  `testimonial_type` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `createdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `sortorder` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  `remote_ip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial_master`
--

INSERT INTO `testimonial_master` (`testimonial_master_id`, `testimonial_type`, `username`, `createdate`, `modifieddate`, `sortorder`, `status`, `remote_ip`) VALUES
(1, 'Cosmetic', 'Keyur', '2015-10-27', '2017-12-29', 1, 'E', '123.201.225.120'),
(3, 'Imaging', 'Keyur', '2017-03-29', '2017-12-29', 2, 'E', '123.201.225.120');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `userID` int(11) NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '0',
  `loginID` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `address` text NOT NULL,
  `contacts` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`userID`, `group_id`, `loginID`, `email`, `password`, `firstname`, `lastname`, `address`, `contacts`) VALUES
(4, 1, 'admin-ofj', 'contact@easternts.com(1vggk3bis52)', '3a34a9a6f9601108c991b012c34264a5ae13927f202780f35730b831cdd86d99', 'Keyur', 'Mehta', '', ''),
(5, 2, 'bhavini', 'bhavini.easternts@gmail.com(jdhvwzxvej5)', '82b901e6eecd23fb45443ae39d6b4afa3443afb71004db7590c997a273c78f20cd17128192d1f36cb7d693bf7c80a3502eeaaa9faef0691f553670636e842f9d', 'Bhavini', 'Chauhan', 'Bhavini', '123456789'),
(6, 1, 'bhavini-admin', 'contact@easternts.com(v10oy2ana0n)', 'fa1cd5f350a50a55ef5ef5e31733088b15c319a56b204b00a173d0c95bed7b8e', 'Bhavini', 'Chauhan', 'Bhavini', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `website_master`
--

CREATE TABLE `website_master` (
  `id` int(11) NOT NULL,
  `email1` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `tel1` varchar(25) NOT NULL,
  `tel2` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `address1` text,
  `terms` text,
  `timings` text,
  `diamonds_address1` text,
  `diamonds_email1` varchar(255) DEFAULT NULL,
  `diamonds_tel1` varchar(255) DEFAULT NULL,
  `diamonds_address2` text,
  `diamonds_email2` varchar(255) DEFAULT NULL,
  `diamonds_tel2` varchar(255) DEFAULT NULL,
  `re_address1` text,
  `re_email1` varchar(255) DEFAULT NULL,
  `re_tel1` varchar(255) DEFAULT NULL,
  `re_address2` text,
  `re_email2` varchar(255) DEFAULT NULL,
  `re_tel2` varchar(255) DEFAULT NULL,
  `re_address3` text,
  `re_email3` varchar(255) DEFAULT NULL,
  `re_tel3` varchar(255) DEFAULT NULL,
  `mi_address1` text,
  `mi_address2` text,
  `mi_address3` text,
  `mi_tel1` varchar(255) DEFAULT NULL,
  `mi_tel2` varchar(255) DEFAULT NULL,
  `mi_tel3` varchar(255) DEFAULT NULL,
  `mi_email1` varchar(255) DEFAULT NULL,
  `mi_email2` varchar(255) DEFAULT NULL,
  `mi_email3` varchar(255) DEFAULT NULL,
  `ed_address1` text,
  `ed_email1` text,
  `ed_tel1` varchar(255) DEFAULT NULL,
  `te_address1` text,
  `te_address2` text,
  `te_email1` varchar(255) DEFAULT NULL,
  `te_email2` varchar(255) DEFAULT NULL,
  `te_tel1` varchar(255) DEFAULT NULL,
  `te_tel2` varchar(255) DEFAULT NULL,
  `ho_address1` text,
  `ho_email1` text,
  `ho_tel1` varchar(255) DEFAULT NULL,
  `fax` varchar(25) NOT NULL,
  `map_code` text NOT NULL,
  `logo` text NOT NULL,
  `social` text NOT NULL,
  `sharing` text NOT NULL,
  `copyright` varchar(70) NOT NULL,
  `powered_by` text NOT NULL,
  `coming_soon` varchar(1) NOT NULL DEFAULT 'N',
  `username` varchar(70) NOT NULL,
  `remote_ip` varchar(70) NOT NULL,
  `create_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `homeimage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_master`
--

INSERT INTO `website_master` (`id`, `email1`, `email2`, `tel1`, `tel2`, `address`, `address1`, `terms`, `timings`, `diamonds_address1`, `diamonds_email1`, `diamonds_tel1`, `diamonds_address2`, `diamonds_email2`, `diamonds_tel2`, `re_address1`, `re_email1`, `re_tel1`, `re_address2`, `re_email2`, `re_tel2`, `re_address3`, `re_email3`, `re_tel3`, `mi_address1`, `mi_address2`, `mi_address3`, `mi_tel1`, `mi_tel2`, `mi_tel3`, `mi_email1`, `mi_email2`, `mi_email3`, `ed_address1`, `ed_email1`, `ed_tel1`, `te_address1`, `te_address2`, `te_email1`, `te_email2`, `te_tel1`, `te_tel2`, `ho_address1`, `ho_email1`, `ho_tel1`, `fax`, `map_code`, `logo`, `social`, `sharing`, `copyright`, `powered_by`, `coming_soon`, `username`, `remote_ip`, `create_date`, `modified_date`, `homeimage`) VALUES
(1, 'info@korinoptoelectronics.com', '', '+91 9327893996', '+91 9327895006', '<p style=\"display: inline-block;\"><a>502, 5th Floor, \"Union&nbsp;Trade Center\", Udhana Darwaja, Ring Road, Surat, Gujarat, India - 395002</a></p>\r\n<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;</span></p>', '<p style=\"text-align: left;\">Plot No 119, Apparel Park, Ancillary Zone Sachin Gidc, Vanz, Surat, Gujarat, India - 394230</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>', '<h5><strong>Privacy Statement and Consent to Use of Data</strong></h5>\r\n<h5><strong>IMPORTANT</strong></h5>\r\n<h6>Acknowledgement of Our Privacy Statement</h6>\r\n<p>By using this Site, you acknowledge that you have reviewed the terms of our Privacy Statement and Consent to Use of Data (the &ldquo;Privacy Statement and Consent&rdquo;) and agree that we may collect, use and transfer your Personal Data and User Data in accordance therewith. If you do not agree with these terms, you may choose not to use our Site, and please do not provide any Personal Data through this Site. This Privacy Statement and Consent forms part of our Site Terms of Use and such shall be governed by and construed in accordance with the laws of the State of Gujarat in India. Please note that this Privacy Statement and Consent does not apply to the providing or use of Personal Data other than through the Site, nor to the providing or use of Personal Data of past or present employees of, or consultants engaged by, Hindva Builders and/or its subsidiaries, for employment or benefits administration purposes.</p>\r\n<p>What follows is a table of contents listing the areas covered by our Privacy Statement and Consent. Please read our entire Privacy Statement and Consent carefully. Should you have any questions about this Statement or about our data collection, storage and use practices, please contact us.</p>\r\n<h6>Privacy Statement and Consent Table of Contents</h6>\r\n<p>Changes to Hindva&rsquo; Privacy Statement and Consent This Site and our business change constantly. As a result, at times it may be necessary for Hindva Builders to make changes to this Privacy Statement and Consent. Hindva Builders reserves the right to update or modify this Privacy Statement and Consent at any time and from time to time without prior notice. Please review this Statement periodically, and especially before you provide any Personal Data. This Privacy Statement and Consent was last updated on 24 Oct 2016. Your continued use of the Site after any changes or revisions to this Privacy Statement and Consent shall indicate your agreement with the terms of such revised Privacy Statement and Consent.</p>\r\n<h6>Welcome</h6>\r\n<p>Welcome to www.hindva.com (the &ldquo;Site&rdquo;). This Site is operated by Hindva Builders (&ldquo;Hindva&rdquo; or &ldquo;we&rdquo; or &ldquo;us&rdquo;) and has been created to provide our customers the information, products and other initiatives developed and/or offered by Hindva and its subsidiaries and affiliates. You are important to Hindva and, as described in this Privacy Statement and Consent, we will take appropriate measures to protect your privacy as you use this Site. This Privacy Statement and Consent sets forth Hindva&rsquo;s approach with respect to information that is collected from users of this Site. This Site is intended for users in the India.</p>\r\n<h6>Definitions</h6>\r\n<p>&ldquo;Aggregated Data&rdquo; includes customer demographics, interests and behavior based on Personal Data and other information provided to us which is compiled and analyzed on an aggregate and anonymous basis.</p>\r\n<p>\"Personal Data\" includes all information that enables an individual to be identified, including, by way of example, the individual&rsquo;s name and e-mail address.</p>\r\n<p>&ldquo;Public Information&rdquo; includes information posted to any public areas of the Site, such as bulletin boards, chat rooms and comment areas. Please refer to our discussion of \"Public and Unsolicited Information\".</p>\r\n<p>\"Unsolicited Information\" includes any ideas for new products or modifications to existing project and other unsolicited communications. Personal Data included in Unsolicited Information will be handled in the manner set forth in this Privacy Statement and Consent.</p>\r\n<p>\"User Data\" includes all information passively collected from users of the Site that does not identify a particular individual, including, by way of example, statistical information on Site usage. The terms \"you\", \"your\" and \"yours\" when used in this Privacy Statement and Consent means any user of this Site.</p>\r\n<h6>What Information Do We Collect?</h6>\r\n<p>Information That You Give Us: We collect Personal Data such as your name, date of birth, e-mail or mailing address from you when you voluntarily choose to register for or use certain Hindva Services at this Site. We use the Personal Data that we collect in an effort to provide you with a superior customer experience on the Site and to improve and market Hindva Services. Hindva may store such Personal Data itself or it may be stored in databases owned and maintained by Hindva&rsquo;s affiliates, agents or service providers. Hindva retains its rights to these databases and the information contained in them.</p>\r\n<p>If you Subscribe with Hindva or use certain other of the personalized options we offer, we will create a profile that includes your name, mailing address, e-mail address, and other information that you provide that is pertinent to your specific situation. We may combine such information with data gathered from other sources. For instance, if incorrect postal codes are received, we may use third party software to correct them. We also may collect e-mail or other addresses from prospect lists of other companies, for example, in connection with a joint marketing effort. When we do so, (1) we acknowledge in our correspondence how the recipient was added to our list and (2) we provide a means for recipients to opt out of further communications from us. In addition, we may ask you for Personal Data if you enter an educational program, contest or promotion sponsored by Hindva. When you contact Hindva we may keep a record of that correspondence and may occasionally ask you to complete surveys for sales and research purposes.</p>\r\n<p>In some instances, we contract with outside parties to collect and maintain our information collection servers and to perform technology and related services. We seek to provide any such third parties with only the information they need to perform their specific function and we require them to protect your Personal Data in accordance with this Privacy Statement and Consent. Wherever Hindva collects Personal Data we will provide a link to this Privacy Statement and Consent.</p>\r\n<h6>Personally Non-Identifiable Information:</h6>\r\n<p>Passively Collected User Data: When you interact with Hindva through this Site, we receive and store certain \"User Data\". Such User Data, which is collected passively using various technologies, is not used to specifically identify you. Hindva may store such User Data itself or it may be stored in databases owned and maintained by Hindva&rsquo;s affiliates, agents or service providers. Hindva retains all rights to these databases and the information contained in them.</p>\r\n<p>This Site will use such User Data together with data provided by other parties and pool it with other information to track, for example, the total number of visitors to our Site, the number of visitors to each page of our Site, the keywords visitors used to find our Site and the domain names of our visitors\' Internet service providers. We also may disclose User Data in order to describe our services to current and prospective business partners, and to other third parties for other lawful purposes. It is important to note that no Personal Data is available or used in this process.</p>\r\n<h6>Transfer of Your Data Abroad.</h6>\r\n<p>By voluntarily providing us with your Personal Data, you are consenting to our use of it in accordance with this Privacy Statement and Consent. Due to the nature of the Internet if you are visiting this Site from a country other than the India, your communications will inevitably result in the transfer of information across international boundaries. By visiting this web site you consent to these transfers. If you provide Personal Data to this Site, you acknowledge and agree that such Personal Data may be transferred from your current location to the offices and servers of Hindva and the affiliates, agents and service providers referred to herein located in the India and in other countries.</p>\r\n<h6>What are Your Choices?</h6>\r\n<p>You can use this Site without providing your Personal Data, although doing so may limit your ability to obtain certain information or to use other valuable Hindva Services, including, for example, informational newsletters and responses to specific inquiries you may have. Where no Personal Data is legally required or is necessary for a particular service (for example, to contact you in response to your request), the use of a pseudonym is accepted.</p>\r\n<p>We keep your Personal Data only for as long as reasonably necessary for the purposes for which it was collected or to comply with any applicable legal reporting or document retention requirements. We will take reasonable steps to update, correct or, upon your request, delete your Personal Data in our possession that you have previously submitted via this Site. In order to request an update, with respect to your Personal Data, please contact us as provided below. If at any time you wish not to receive further communications, you may also follow the unsubscribe procedure included in our communication.</p>\r\n<h6>How Do We Use Your Personal Data and Other Information?</h6>\r\n<p>Hindva uses the Personal Data you provide for our business purposes in a manner that is consistent with this Privacy Statement and Consent.</p>\r\n<ul>\r\n<li>If you provide Personal Data for a certain reason, that Personal Data will be available to us for use in connection with the reason for which it was provided or for a consistent purpose, including, if applicable, processing an order placed by you or informing you that the product is no longer available. For instance, if you contact us by e-mail, we may use the Personal Data you provide to respond to you; or if you contact us about a job listing, the information you provide to us may be used to consider you for the position. We may also combine Personal Data that you have provided to us with information obtained by us from other parties.</li>\r\n<li>Hindva and its affiliates also may use your Personal Data, User Data and other information collected through the Site to help us improve the content and functionality of the Site, to better understand our customers and markets, to improve our products and services and to effect and facilitate sales.</li>\r\n<li>Hindva and its affiliates may use this information to contact you, electronically, through telemarketing or otherwise, in the future to tell you about, and to offer for sale, products or services we believe will be of interest to you. If we do so, each communication we send you will contain instructions permitting you to \"opt out\" of receiving future communications.</li>\r\n<li>If at any time you wish not to receive any future communications or to have your name deleted from our mailing lists, you may follow the \"unsubscribe\" procedure included with our communication. In addition, you may e-mail us at info@hindva.com. See How to Contact Hindva below.</li>\r\n</ul>\r\n<p>Do Not Track browser settings: www.hindva.com does not use pervasive online web tracking for behavioural advertisements. Enabling of the Do Not Track setting in your browser will have no effect on the types of data Hindva collects and uses as follows:</p>\r\n<ul>\r\n<li>Personally non-identifiable information is used only for commonly accepted practices such as visit and click-through rates collected to improve site design and navigation</li>\r\n<li>Personally identifiable information is only gathered when data is explicitly entered into a Hindva on-line form and you have explicitly accepted the Hindva privacy policy. At any time, you can also opt-out of receiving any future communications.</li>\r\n</ul>\r\n<h6>Do We Share the Information that We Receive?</h6>\r\n<p>Hindva considers your information to be a vital part of our relationship with you. Hindva will share information including Personal Data with its subsidiaries and affiliates that have also agreed to be bound by this Privacy Statement and Consent. In addition, Hindva, like many businesses, sometimes hires other companies to perform certain business-related functions. Examples include mailing information, maintaining databases and processing payments. When we retain another non-affiliated company to perform a function of this nature, we seek to provide them with only the information that they need to perform their specific functions, and we require them to protect your Personal Data in accordance with this Privacy Statement and Consent and Hindva &lsquo;s restrictions.</p>\r\n<p>In addition, if you input Personal Data on a co-branded registration page, relating, for example, to a contest co-sponsored by both Hindva and a partner company, then your Personal Data will be available both to Hindva and to such partner company. While Hindva will only use such Personal Data in accordance with this Privacy Statement and Consent, such partner company\'s use of your Personal Data will be subject to the privacy policy of that company and Hindva cannot be responsible for their use of your information. We encourage you to review the privacy policy of such partner company before providing information on any such co-sponsored page or promotion.</p>\r\n<p>There are also a limited number of circumstances in which we may share your Personal Data and other information in our possession with certain additional third parties without further notice to you, as set forth below:</p>\r\n<h6>Legal Requirements:</h6>\r\n<p>Hindva may disclose your Personal Data, User Data and other information if required to do so by law or in the good faith belief that such action is necessary to (a) comply with a legal obligation, (b) protect and defend the rights or property of Hindva or its affiliates, (c) act in urgent circumstances to protect the personal safety of users of the Site or the public, or (d) protect against legal liability.</p>\r\n<h6>Business Transfers, Combinations and Related Activities:</h6>\r\n<p>As we develop our business, we might sell, buy, restructure or reorganize businesses or assets. In the event of any sale, merger, reorganization, restructuring, dissolution or similar event involving our business or assets, Personal Data may be part of the transferred assets.</p>\r\n<h6>Security</h6>\r\n<p>Hindva takes reasonable steps to protect any Personal Data you provide to us and to protect such information from loss, misuse, and unauthorized access, disclosure, alteration, or destruction. Unless otherwise stated on the relevant page of the Site, Hindva uses general security standards but has not taken additional action to secure data provided to its sites, and such transmissions are subject to normal Internet security risks. As noted, no Internet or e-mail transmission is ever fully secure or error free. In particular, e-mail sent to or from this Site may not be secure, and you should therefore take special care in deciding what information you send to us. Please keep this in mind when disclosing any Personal Data to Hindva or to any other party via the Internet. Moreover, when you use passwords, ID numbers, or other special access features on this Site, it is your responsibility to safeguard them.</p>\r\n<h6>How to Contact Hindva</h6>\r\n<p>Please also feel free to contact us if you have any questions about Hindva Privacy Statement and Consent or the information practices of this Site.</p>\r\n<p>You may contact us as follows:</p>\r\n<p>Hindva Builders 3rd Floor C/o M Kantilal Exports, 251, Shree Ambika, Near Yash Plaza, Varachha Road, Surat 395006</p>\r\n<p>Or visit our &ldquo;Contact Us&rdquo; section.</p>', 'Mon - Sat: 9:00am - 5:00pm', '<p class=\"text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five\">Surat - Office</p>\r\n<p>Carbon Creation, C/o Hindva, <br /> Near Yash Plaza,<br /> Varachha Road, Surat - 395006 <br /> Gujarat, India</p>', 'info@carboncreation.in', '+91 261 2551475', '<p class=\"text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five\">Maharashtra - Office</p>\r\n<p>Carbon Creation , FC-7010, <br /> Bharat Diamond Bourse Bandra Kurla Complex, <br />Bandra (East) Mumbai - 400051 <br /> Maharashtra, India</p>', 'info@carboncreation.in', '+91 22 40730730', '<p class=\"text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five\">Surat - Office</p>\r\n<p>Hindva Builders , <br />Near Yash Plaza, <br /> Varachha Road, Surat - 395006 <br />Gujarat, India</p>', 'surat@hindva.com', '+91 261 2551475', '<p class=\"text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five\">Mumbai - Office</p>\r\n<p>Hindva Builders, <br />905, 9th Floor, Business Suites - 9, 83, S.V. Road, <br /> Near Dynasty Restaurant Santacruz (West), <br />Mumbai - 400054, Maharashtra, India</p>', 'mumbai@hindva.com', '+91 22 26481010', '<p class=\"text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five\">Ahmedabad - Office</p>\r\n<p>Hindva Builders , Shantiniketan Solitaire, <br /> Opp. Vrundavan Party Plot, <br />S.P. Ring Road, Nikol,<br />Ahmedabad - 380038, Gujarat, India</p>', 'ahmedabad@hindva.com', '+91 74 05058991', '<p class=\"text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five\">Surat - Office</p>\r\n<p>Valbaux MineTech, C/o Hindva, <br /> Near Yash Plaza, <br /> Varachha Road, Surat - 395006 <br /> Gujarat, India</p>', '<p class=\"text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five\">Porbandar - Office</p>\r\n<p>Valbaux MineTech, <br /> Jeevan Jyot, M.G Road, <br />Porbandar - 360575 <br /> Gujarat, India</p>', '<p class=\"text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five\">Jamnagar - Office</p>\r\n<p>Valbaux MineTech, <br /> Kuranga, <br />Jamnagar - 361315<br /> Gujarat, India</p>', '+91 261 2551475', '+91 286 2244345', '+91 286 2244345', 'info@valbaux.com', 'info@valbaux.com', 'info@valbaux.com', '<p class=\"text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five\">Surat - Office</p>\r\n<p>Ashadeep Vidhyalay, <br />C/o Hindva, <br /> Near Yash Plaza, <br /> Varachha Road, Surat - 395006 <br /> Gujarat, India</p>', 'edu@hindva.com', '+91 261 2551475', '<p class=\"text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five\">Surat - Office</p>\r\n<p>Vritika Lifestyle, 28-33, <br /> Hari Om Industrial Estate, <br /> Near Bharat Hospital, Kadodara Road, <br /> Saroli, Surat &ndash; 395010 <br />Gujarat, India</p>', '<p class=\"text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five\">Surat - Office</p>\r\n<p>Riya Fashion, 28-33, <br /> Hari Om Industrial Estate, <br /> Near Bharat Hospital, Kadodara Road, <br /> Saroli, Surat &ndash; 395010 <br />Gujarat, India</p>', 'sales@vritika.in', 'info@riyatrendz.in', '+91 261 2647777', '+91 261 2647777', '<p class=\"text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five\">Surat - Office</p>\r\n<p>The World, Behind Pramukh Aranya, <br /> Godadra - Dindoli Road, <br /> Parvat - Magob, Surat - 395010 <br /> Gujarat, India</p>', 'theworld@hindva.com', '+91 261 6554666', '', '', 'logo.png', 'a:6:{s:8:\"facebook\";s:41:\"https://www.facebook.com/korin.opto.3    \";s:7:\"twitter\";s:38:\"https://twitter.com/optoelectronics   \";s:6:\"google\";s:0:\"\";s:9:\"instagram\";s:40:\"https://www.instagram.com/korinopto/    \";s:8:\"linkedin\";s:24:\"https://in.linkedin.com/\";s:9:\"pinterest\";s:24:\"https://www.youtube.com/\";}', 'a:6:{s:8:\"facebook\";s:1:\"1\";s:7:\"twitter\";s:1:\"1\";s:6:\"google\";s:1:\"1\";s:9:\"pinterest\";s:1:\"1\";s:9:\"instagram\";N;s:8:\"linkedin\";s:1:\"1\";}', 'Yugeva Cryo. All Rights Reserved.', 'a:2:{s:5:\"title\";s:24:\"Eastern Techno Solutions\";s:4:\"link\";s:28:\"http://www.easternts.com.au/\";}', '', 'Keyur', '116.74.112.172', '2015-10-26', '2019-06-22', 'catalogue_of_korin_optoelectronics.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `album_type`
--
ALTER TABLE `album_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `appointment_master`
--
ALTER TABLE `appointment_master`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `banner_image`
--
ALTER TABLE `banner_image`
  ADD PRIMARY KEY (`bannerID`);

--
-- Indexes for table `benefit`
--
ALTER TABLE `benefit`
  ADD PRIMARY KEY (`benefitID`);

--
-- Indexes for table `contact_master`
--
ALTER TABLE `contact_master`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `content_master`
--
ALTER TABLE `content_master`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `download_brochure`
--
ALTER TABLE `download_brochure`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_Id`);

--
-- Indexes for table `faq_master`
--
ALTER TABLE `faq_master`
  ADD PRIMARY KEY (`faq_master_id`);

--
-- Indexes for table `gallery_master`
--
ALTER TABLE `gallery_master`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `group_master`
--
ALTER TABLE `group_master`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `homecontent`
--
ALTER TABLE `homecontent`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_master`
--
ALTER TABLE `job_master`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `module_master`
--
ALTER TABLE `module_master`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `eve_date` (`news_date`);

--
-- Indexes for table `news_type`
--
ALTER TABLE `news_type`
  ADD PRIMARY KEY (`news_type_id`);

--
-- Indexes for table `page_master`
--
ALTER TABLE `page_master`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `permission_master`
--
ALTER TABLE `permission_master`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `personality`
--
ALTER TABLE `personality`
  ADD PRIMARY KEY (`personalityID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `pTypeID` (`pTypeID`),
  ADD KEY `pTypeID_2` (`pTypeID`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`pTypeID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`),
  ADD KEY `pTypeID` (`pTypeID`),
  ADD KEY `pTypeID_2` (`pTypeID`);

--
-- Indexes for table `project_gallery`
--
ALTER TABLE `project_gallery`
  ADD PRIMARY KEY (`galleryID`);

--
-- Indexes for table `project_slider`
--
ALTER TABLE `project_slider`
  ADD PRIMARY KEY (`sliderID`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`researchID`);

--
-- Indexes for table `seo_link_master`
--
ALTER TABLE `seo_link_master`
  ADD PRIMARY KEY (`seo_link_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `session_log_master`
--
ALTER TABLE `session_log_master`
  ADD PRIMARY KEY (`session_log_id`);

--
-- Indexes for table `sliderimage`
--
ALTER TABLE `sliderimage`
  ADD PRIMARY KEY (`sliderID`);

--
-- Indexes for table `subscription_master`
--
ALTER TABLE `subscription_master`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `template_master`
--
ALTER TABLE `template_master`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_Id`);

--
-- Indexes for table `testimonial_master`
--
ALTER TABLE `testimonial_master`
  ADD PRIMARY KEY (`testimonial_master_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `website_master`
--
ALTER TABLE `website_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `a_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `album_type`
--
ALTER TABLE `album_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointment_master`
--
ALTER TABLE `appointment_master`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `banner_image`
--
ALTER TABLE `banner_image`
  MODIFY `bannerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `benefit`
--
ALTER TABLE `benefit`
  MODIFY `benefitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `contact_master`
--
ALTER TABLE `contact_master`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `content_master`
--
ALTER TABLE `content_master`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `download_brochure`
--
ALTER TABLE `download_brochure`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `faq_master`
--
ALTER TABLE `faq_master`
  MODIFY `faq_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery_master`
--
ALTER TABLE `gallery_master`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_master`
--
ALTER TABLE `group_master`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homecontent`
--
ALTER TABLE `homecontent`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `job_master`
--
ALTER TABLE `job_master`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `module_master`
--
ALTER TABLE `module_master`
  MODIFY `module_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `news_type`
--
ALTER TABLE `news_type`
  MODIFY `news_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page_master`
--
ALTER TABLE `page_master`
  MODIFY `page_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `permission_master`
--
ALTER TABLE `permission_master`
  MODIFY `permission_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=789;

--
-- AUTO_INCREMENT for table `personality`
--
ALTER TABLE `personality`
  MODIFY `personalityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `pTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_gallery`
--
ALTER TABLE `project_gallery`
  MODIFY `galleryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `project_slider`
--
ALTER TABLE `project_slider`
  MODIFY `sliderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `researchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `seo_link_master`
--
ALTER TABLE `seo_link_master`
  MODIFY `seo_link_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `session_log_master`
--
ALTER TABLE `session_log_master`
  MODIFY `session_log_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `sliderimage`
--
ALTER TABLE `sliderimage`
  MODIFY `sliderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subscription_master`
--
ALTER TABLE `subscription_master`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `template_master`
--
ALTER TABLE `template_master`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `testimonial_master`
--
ALTER TABLE `testimonial_master`
  MODIFY `testimonial_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `website_master`
--
ALTER TABLE `website_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
