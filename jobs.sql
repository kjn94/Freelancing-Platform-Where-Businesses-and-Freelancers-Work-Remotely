-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2019 at 12:07 AM
-- Server version: 5.5.60-log
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `cover_letter` text NOT NULL,
  `proposed_budget` int(10) NOT NULL,
  `current` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `topic_id`, `applicant_id`, `cover_letter`, `proposed_budget`, `current`) VALUES
(1, 54, 3, 'I am a professional programmer with great skills in C++. Moreover, I have gained a lot of knowledge in MS SQL Server database. I have expertise in Android applications as well.\r\n\r\nLooking forward to working together.', 250, 0),
(2, 53, 3, 'I am a professional C# Developer. I have 5+ years experience with ASP.NET MVC, Javascript & Git. Moreover, I am able to work full time, during UTC +1/+3 time zone. I am an exceptionally  talented developer, able to solve complex problems.\r\n\r\nI would love to take this full time role on a large and ongoing project.', 460, 1),
(3, 11, 4, 'Youtube Video Editing. This project is exactly for me. \r\n\r\nI am able to work as told on this full time position.\r\n\r\nMeet deadlines on a daily/weekly basis - no problem. Moreover, I am able to produce animation videos 5-10mins long in high quality.', 250, 1),
(4, 31, 4, 'I am an Expert Graphics Designer. Moreover, I have Compelling portfolio that demonstrates innovative infographics and other design work. I am able to work with constructive criticism as well as adhere to deadlines. Furthermore, I am extremely detail oriented. There is no doubt that I can collaborate with team members to understand business and user requirements.\r\n\r\nLooking forward to working together.', 430, 0),
(5, 38, 4, 'I would love to take this Project Manager position.\r\n\r\n> Work on exciting projects\r\n> Test new cutting-edge digital strategies\r\n> Help scale a digital agency\r\n> Learn from great marketers\r\n> Work in a relaxed atmosphere with pre-screened clients (no difficult people, only serious businesses, only exciting projects)\r\n> Grow your knowledge, get certifications and access our huge marketing resource database and plenty of courses\r\n> Get individual coaching by our agency owner\r\n> Fully remote work\r\n> Flexible hours, plan your own schedule \r\n\r\nLooking forward to working together.', 215, 1),
(6, 10, 4, 'I have done hundreds of videos. Editing interviews is my expertise. Keep me in mind for the job.\r\n\r\nI can post in FB and Whatsapp daily.', 119, 0),
(7, 14, 3, 'Software Engineer. - That role is exactly for me.\r\n\r\nI am a person who can write a script to update both e-commerce stores from the web app and keep items in sync. No matter how hard the task is, I can do it. I am a motivated and hard working expert who provides results. I am a programmer and I am able to complete any task in the IT world.\r\n\r\nLooking forward to working together.', 350, 0),
(8, 54, 10, 'I am a professional C++ developer and I can bring you results in your business. Moreover, I have more than 5 years of experience in the IT filed working as a C++ developer.', 275, 0),
(9, 11, 6, 'Youtube Video Editing - great job and it is exactly for me. I have a professional Youtube channel with more that 100 000 subscriber and I can grow your channels as well. \r\n\r\nIf you want results, I am the right person.', 290, 1),
(10, 5, 6, 'Animated Video Explainer - That is exactly what I am looking for. You will receive a very high quality 5 minutes explainer video. Your viewers will love it.', 60, 0),
(11, 10, 6, 'Well, your viewers will love it. I am a passionate video editor who is editing interview every single day.\r\n\r\nGreat videos with catchy music and lines and posting in FB and Whatsapp - that is my expertise.', 135, 1),
(12, 38, 6, 'Being a Project Manager is my passion. \r\n\r\nI would love to take this exciting opportunity for an experienced Project Manager to join your digital team to look after a range of clients.\r\n\r\nThis role is exactly for me because I am a person who goes an extra mile and is really passionate about growing online businesses. \r\n\r\nI posses everyone of these skills:\r\n\r\n> Work on exciting projects\r\n> Test new cutting-edge digital strategies\r\n> Help scale a digital agency\r\n> Learn from great marketers\r\n> Work in a relaxed atmosphere with pre-screened clients (no difficult people, only serious businesses, only exciting projects)\r\n> Grow your knowledge, get certifications and access our huge marketing resource database and plenty of courses\r\n> Get individual coaching by our agency owner\r\n> Fully remote work\r\n> Flexible hours, plan your own schedule ', 240, 1),
(13, 54, 15, 'I have excellent skills in C++. If you don\'t hire me, you will regret a lot. I have Expertise in developing Android applications as well.', 265, 1),
(14, 53, 10, 'I posses everyone of these skills:\r\n\r\n- **Live in Europe or Russia**\r\n- Able to work full time, during UTC +1/+3 time zone\r\n- Have 5+ years experience with ASP.NET MVC, Javascript & Git\r\n- Be an exceptionally talented developer, able to solve complex problems\r\n\r\nIn addition, I have experience with React and Typescript.', 465, 1),
(15, 38, 16, 'I am a business person and this role is exactly for me. I would like to be a part of this great working environment, with a start-up feel, great conversations and debates on slack and a fantastic opportunity to grow within our evolving and creative business.\r\n\r\nLooking forward to working together.', 235, 1),
(16, 1, 16, 'I want to improve my career in Business Development.\r\n\r\nThis skills are my expertise:\r\n\r\n*Fluent English\r\n*Strong work ethic\r\n*Great communicator\r\n*Can work independently and quickly\r\n*Reliable and Consistent\r\n*Fast internet connection\r\n\r\nLooking forward to working together.', 365, 0),
(17, 34, 10, 'I am an Android developer and I can help you make an awesome Android application. Of course, I will provide you source code (commented) and instructions to build the app.\r\n\r\nThe app will be able to read from the usb serial device (will be provided to freelancer for the duration of the job) by using a serial communication library.', 650, 0),
(18, 33, 10, 'I would like to be a part of this Fast paced agency.\r\n\r\nI am a professional, even expert in Python and C++ and I will convert an existing website.', 370, 0),
(19, 49, 11, 'Uploading to eBay, amazon - that\'s my dream job. I am an expert  with eBay and Amazon.\r\n\r\nGenerating eBay listings from a list off our manifest - don\'t worry about that. I will take care of it.', 250, 0),
(20, 51, 11, 'I would like to be a part of this rapidly growing Ecommerce company. I am a long term employee who can grow with our company.\r\n\r\nI have all of the skills listed below:\r\n\r\nBasic MS Excel / Google Spreadsheet\r\nSEO Optimization\r\nBachelor degree from accredited university\r\nAble to multi-task and understand the bigger picture\r\nTeam play who is sincere and willing to learn and be part of the team\r\nHigh proficiency in English and good internet connection\r\nExperience in Amazon or Seller Central\r\n\r\nLooking forward to working together.', 475, 1),
(21, 44, 11, 'I am an experienced Shopify eCommerce expert.\r\n\r\nI have all of the skills below:\r\n\r\n1. setting up the shopify store (we have a store you can clone) | Includes adding apps\r\n2. finding new, hot products by using FB ads research, and other tools\r\n3. adding new products using Oberlo\r\n4. fulfilling orders using Oberlo\r\n5. replying to customer emails in a 24 hour response time\r\n6. handling disputes on Stripe/Shopify\r\n7. running FB ads / scaling FB ad', 335, 0),
(22, 21, 11, 'My monthly rate for one post a day on each page will be $700. I am an expert Social media marketer and I bring results to my clients. I have good communication and I can keep you posted every day about my progress. \r\n\r\nNo matter how hard the task is, I can do it. I am a motivated and hard working expert who provides results. I am a programmer and I am able to complete any task in the IT world.', 700, 1),
(23, 35, 11, 'Let me format this 2-page word document to fit onto 1 page. I can do it pretty fast.', 30, 0),
(24, 22, 11, 'Full time VA, data entry, excel, cold calling, product knowledge in real estate field, social media posting, must clock hours with time doctor, must speak English and be available central standard time.\r\n\r\nWell, I have all of these skill. I am the right person for the job.', 200, 0),
(25, 35, 19, 'Word Document Format Editing is my favorite thing to do. Hire me now.', 35, 1),
(26, 23, 19, 'Data Analytics for Business is my expertise. Let me turn your course into something that matters. I have good research skills to help us figure out the course, what content, lessons, etc to include and where we should get the content, and what we should not offer in the course, and to develop a \"working syllabus.\"\r\n\r\nI completely understand what is the purpose of the syllabus.\r\n\r\nLooking forward to working together.', 325, 0),
(27, 38, 14, 'This Project Manager position is exacty for me. I can go an extra mile and is really passionate about growing online businesses. \r\n\r\nI am looking to broaden my digital knowledge across other disciplines in a dynamic digital agency and enjoy working from the comfort of my home in their my time. ', 215, 1),
(28, 28, 14, 'I am an expert businessman and I can make you a great number of sales for your business.\r\n\r\nThese skill are not a problem. I have them.\r\n\r\nReach out to customer leads through cold calling\r\nPresent, promote and sell all-in-one shielding solutions benefits\r\nPerforming cost-benefit analyses of existing and potential customers\r\nMaintaining positive business relationships to ensure future sales', 299, 1),
(29, 51, 14, 'I can expand your business with great marketing campaigns.\r\n\r\nThis role is for me, because I would love to be responsible for the day-to-day optimization and products management. \r\n\r\nNo matter how hard the task is, I can do it. I am a motivated and hard working expert who provides results. I am a programmer and I am able to complete any task in the IT world.\r\n\r\nLooking forward to working together.', 465, 1),
(30, 22, 14, 'Let me put your Data entry, Excel, Word service on a new level. You will be surprised how good I am.', 199, 0),
(31, 1, 14, 'I meet these requirements and I would love to talk.\r\n\r\n*Fluent English\r\n*Strong work ethic\r\n*Great communicator\r\n*Can work independently and quickly\r\n*Reliable and Consistent\r\n*Fast internet connection\r\n\r\nI can help your businesses grow.', 310, 0),
(32, 40, 3, 'photo\r\n\r\nI am a Full Stack Developer and I would love to build a great app for you. I can assure you that it will be able to work on a browser, iphone and android. \r\n\r\nLooking forward to working together.', 150, 0),
(33, 11, 3, 'Youtube Video Editing - I do that every day. You will be impressed with my skills and what I can do for you.\r\n\r\nNo matter how hard the task is, I can do it. I am a motivated and hard working expert who provides results. I am a programmer and I am able to complete any task in the IT world.\r\n\r\nLooking forward to working together.', 300, 1),
(34, 6, 3, 'I can make you a really great 15 Promo Video. I would love to work on an ongoing basis.\r\n\r\nLooking forward to working together.', 75, 0),
(35, 11, 10, 'Let me be your youtube video editor for a while. Then, we can move to a full time position. I can Meet deadlines on a daily/weekly basis. And moreover, I would love to be responsible for creating animation videos 5-10mins long.', 265, 1),
(36, 5, 13, 'Animated Video Explainer - I am the right guy.\r\n\r\nNeed 5 minutes explainer video to explained the importance of using our product to automate a cumbersome manual process. Must be able to deliver finished product by Friday 6pm GMT. -  Dont\' worry about that. I will take care of it.', 59, 1),
(37, 10, 13, 'Ohh, interviews. Great videos with catchy music and lines. Also to be posted in FB and Whatsapp - That\'s the kind of job I have dreamed about. Results are guaranteed. Hire me now.\r\n\r\nLooking forward to working together.', 150, 1),
(38, 54, 4, 'I would love to get into the IT world as a C++ developer. Why not you give me this opportunity? I would love to learn new things and I am passionate about that. I have always wanted to learn how to build Android applications.\r\n\r\nNo matter how hard the task is, I can do it. I am a motivated and hard working expert who provides results. I am a programmer and I am able to complete any task in the IT world.\r\n\r\nLooking forward to working together.', 250, 0),
(39, 27, 4, 'I would be happy to be responsible for identifying new business opportunities and relationship with B2B customers, including small- and medium-sized businesses, large enterprises, educational institutions and government agencies, negotiating advantageous business terms and creating/executing go-to-market plans with these customers and maintains the business relationship by providing solutions for defined account(s), to achieve the identified strategy and companyâ€™s financial objectives. Working for Megatech, you will be supporting manufacturers such as, Cisco, Dell, HP, Lenovo, Microsoft, Lexmark, Xerox, Samsung, Western Digital, Asus, etc.\r\n\r\nMoreover, I would love to grow within your company.', 500, 0),
(40, 11, 20, 'Hi, my name is Borqna and I would like to get into the Youtube Video Editing industry.  I am able to work as told on this full time position.\r\n\r\nDon\'t worry about Meeting deadlines on a daily/weekly basis.\r\n\r\nMoreover, I would love to grow within your company.\r\n\r\nLooking forward to working together. Hire me now.', 299, 1),
(41, 49, 20, 'I would love to grow your business by Uploading to eBay, amazon. I am skilled to boost social media and other outlets as well.\r\n\r\nGenerating eBay listings from a list off our manifest. - Don\'t worry about that. Results are guaranteed.', 260, 0),
(42, 48, 19, 'No worries about setting up a drop shipping store. I will provide assistance setting up Facebook, Instagram, Twitter, Pinterest.\r\n\r\nI can also help you with advertising videos on drop shipping store and products to go viral..', 175, 1),
(43, 32, 19, 'My Spanish knowledge is pretty good. I will be able to Translate pages from Spanish to English with no problems. I am also in the law firm, so that will be a plus.', 50, 0),
(44, 50, 19, 'I am willing to translate your marketing campaign very fast. I have the time and knowledge to do that.', 39, 1),
(45, 51, 3, 'If you are looking for an expert, let me help you do that.\r\n\r\nI am an expert on everything listed below:\r\n\r\nOn amazon promotions (coupons / multi-buy / cross promoting products)\r\nPromotion creation (single use coupon codes / group / url structure)\r\nPromotion tracking\r\nListing optimization tracking (sessions + conversions).\r\nEBC\r\nKeyword tracking + follow up regarding best course of action\r\nGive aways tracking\r\nsocial media promotions\r\nmany chats management preferred\r\nFB campaigns set up also preferred\r\n\r\nNeed to have experience or knowledge in\r\nBasic MS Excel / Google Spreadsheet\r\nSEO Optimization\r\nBachelor degree from accredited university\r\nAble to multi-task and understand the bigger picture\r\nTeam play who is sincere and willing to learn and be part of the team\r\nHigh proficiency in English and good internet connection\r\nExperience in Amazon or Seller Central', 600, 1),
(46, 21, 3, 'I am not exactly a Social media marketer, but I think I will be of great value to you. Your two Instagram and Facebook pages will become awesome.\r\n\r\nNo matter how hard the task is, I can do it. I am a motivated and hard working expert who provides results. \r\n\r\nLooking forward to working together.', 750, 1),
(47, 15, 3, 'I am very eager to be a part of this Intership Junior Programmer.\r\n\r\nI posses all of the skills listed below:\r\n\r\nThe ideal candidate will have a passion for technology and software building with:\r\nAbility to program in PHP, a plus if has knowledge about Laravel\r\nGood knowledge with relational databases, mySQL, understand joins and query optimization.\r\nAbility to adapt to code made by other programmers: discover and fix errors, expand functionalities, etc.\r\n\r\nMoreover, I would love to grow within your company.\r\n\r\nLooking forward to working together.', 1099, 0),
(48, 15, 10, 'This Intership Junior Programmer position is very eye catching to me.\r\n\r\nI have all the REQUIREMENTS listed below:\r\n\r\nThe ideal candidate will have a passion for technology and software building with:\r\nAbility to program in PHP, a plus if has knowledge about Laravel\r\nGood knowledge with relational databases, mySQL, understand joins and query optimization.\r\nAbility to adapt to code made by other programmers: discover and fix errors, expand functionalities, etc.\r\n\r\nLet me be a part of your company.', 1250, 0),
(49, 14, 10, 'I am a programmer who can complete your Inventory Management web app. Moreover, I can write a script to update both e-commerce stores from the web app and keep items in sync.', 365, 0),
(50, 53, 16, 'I am a business person and a professional C# developer with all the skills listed below.\r\n\r\n- **Live in Europe or Russia**\r\n- Able to work full time, during UTC +1/+3 time zone\r\n- Have 5+ years experience with ASP.NET MVC, Javascript & Git\r\n- Be an exceptionally talented developer, able to solve complex problems\r\n\r\nI can work will these technologies: ASP.Net MVC, WebApi, .Net Core, React, TypeScript, SQL Server.', 450, 1),
(51, 14, 16, 'Why not you let me be a part of this Software Engineer position. I can complete our Inventory Management web app. I understand that you want your app to keep track of inventory items on two e-commerce platforms, Shopify and Handshake Direct Online.\r\n\r\nWriting a script to update both e-commerce stores from the web app and keep items in sync is not a problem.', 330, 0),
(52, 2, 16, 'Business Manager for eCommerce\r\n\r\nI  have a positive attitude, and I am willing to learn new things.\r\n\r\nI have the skills listed below:\r\n\r\n-Google yahoo bingSEO and Online Marketing.\r\n-Social Media and social media marketing\r\n-Graphic Design (Image Editing Photoshop etc.)\r\n-Market Research\r\n-Alibaba (Product Research)\r\n-Amazon (product listing, optimizing )\r\n-Ebay (product listing, optimizing)', 450, 0),
(53, 53, 15, 'This C# Developers role is very exciting. These technologies are great and I know all of them: ASP.Net MVC, WebApi, .Net Core, React, TypeScript, SQL Server.\r\n\r\nI have experience with React and Typescript.\r\n\r\n- Able to work full time, during UTC +1/+3 time zone\r\n- Have 5+ years experience with ASP.NET MVC, Javascript & Git\r\n- Be an exceptionally talented developer, able to solve complex problems', 479, 1),
(54, 42, 15, 'I am a passionate Front end developer with 5+ years of experience.\r\n\r\nThese skills are my expertise:\r\n\r\n- Expertise in web development and web development best practices\r\n- Expertise in working with responsive designs and development\r\n- Knowledge of the Ruby on Rails framework\r\n- Knowledge of working with HAML, SASS, and Pug\r\n- Design fundamentals\r\n- Fluent in web standards and building solutions using semantic markup and CSS\r\n- Knowledge of working with GIT and Git Hub\r\n\r\nWhat is more, I know how to work with a Rails and Vue.js application. Moreover, I am detailed oriented.', 550, 0),
(55, 41, 15, 'Developer with Planning Skills\r\n\r\nI am An experienced full stack developer and I can help kick-start the development of a learning management system that has CRM functionality for to aid in the automation of marketing campaigns.\r\n\r\nI am the right developer, because I have experience in the following\r\n\r\n- Experience translating mock-ups and wireframes into front-end code\r\n- Experience designing websites\r\n- Experience integrating apps with APIs', 349, 0),
(56, 34, 15, 'Android applications are very valuable and I build them daily. I will provide you with the source code (commented) and instructions to build the app.\r\n\r\nNo matter how hard the task is, I can do it. I am a motivated and hard working expert who provides results. I am a programmer and I am able to complete any task in the IT world.\r\n\r\nMoreover, I would love to grow within your company.\r\n\r\nResults are guaranteed.\r\n\r\nLooking forward to working together.', 640, 0),
(57, 50, 14, 'Let me translate your marketing campaign very fast and put some business strategy behind it.', 60, 1),
(58, 32, 14, 'I started learning Spanish since I was a little boy. Know every single word of that language.', 87, 1),
(59, 32, 6, 'Spanish - my second language. I had only excellent marks in school. I will be able to Translate pages from Spanish to English.', 55, 1),
(60, 48, 6, 'Video Marketing is my expertise.  No worries about assistance setting up Facebook, Instagram, Twitter, Pinterest.\r\n\r\nThe advertising videos on drop shipping store and products to go viral will be of high quality. ', 199, 0),
(61, 45, 6, 'Bring your Business to Life with Facebook and Instagram Video ads. \r\n\r\nFacebook users watch more than 4 billion videos a day. Capturing viewersâ€™ attention is getting harder and harder. They are far more likely to scroll down the feed because of impatience. That is why I will share with you the secrets of making videos that capture peopleâ€™s attention.\r\n\r\nI have proven experience in facebook advertising marketing and a strong track record in conversion campaigns. B2C eCommerce ads experience is a must, preferably with international targeting. \r\n\r\nI am fluent in English, French and German.', 300, 0),
(62, 52, 20, 'I am a Native English Writer and speaker.\r\n\r\nI am a good writer and I would not waste time applying if I am not qualified. \r\n\r\nMoreover, I would love to grow within your company.\r\n\r\nResults are guaranteed.\r\n\r\nLooking forward to working together.\r\n', 600, 0),
(63, 39, 20, 'I am passionate about health and I have the skills below:\r\n\r\n-Competitive Marketing Research\r\n-SEO / Keyword Research\r\n-Website & Online Marketing Analytics / Opportunities\r\n-Business Goals / Priorities - regular discussions with website project manager\r\n-Content Opportunities - missing or needed content, or improving existing content\r\n\r\nMoreover, these are not far away from me:\r\n\r\n-Determine the best content direction/plan prior to the next period (month)\r\n-Produce a specific amount of words / pages / content each month, in the first 20 days\r\n-Edit all content reviewed by managers and the client\r\n-Publish all approved content by the end of that period', 340, 0),
(64, 52, 11, 'I am a great writer and marketer. I know how make your articles go viral.\r\n\r\nNo matter how hard the task is, I can do it. I am a motivated and hard working expert who provides results. \r\n\r\nMoreover, I would love to grow within your company.\r\n\r\nResults are guaranteed.\r\n\r\nLooking forward to working together.', 600, 0),
(65, 38, 11, 'I would like to take this exciting opportunity for an experienced Project Manager to join our digital team to look after a range of clients.', 350, 1),
(66, 28, 11, 'I would like your company make as many sales as possible and I am the right person to do that. I am a high-performing and motivated sales representative.\r\n\r\nI have the following skills:\r\n\r\nProven work experience as a sales representative\r\nHighly motivated and target driven with a proven track record in sales\r\nExcellent selling, communication and negotiation skills\r\nPrioritizing, time management and organizational skills\r\nAbility to create and deliver presentations tailored to the audience needs\r\nRelationship management skills and openness to feedback\r\nBS/BA degree or equivalent', 299, 0),
(67, 50, 11, 'I am willing to translate your marketing campaign very fast.', 45, 1),
(68, 31, 3, 'I have a lot of experience working as a Expert Graphics Designer. Moreover, I have the ability to create appealing professional graphics.\r\n\r\nI would like to be responsible for these:\r\n- Collaborate with team members to understand business and user requirements\r\n- Create graphics (dimension, labeling, and icon) for product images and graphic design work (for A+) on Amazon\r\n- Translate requirements into highly engaging and compelling design concepts\r\n- Communicate design strategy and rationale to stakeholders\r\n- Handle multiple projects and deliver results in a timely manner\r\n- Contribute suggestions or ideas to improve branding and messaging\r\n\r\nMoreover, I would love to grow within your company.\r\n\r\nResults are guaranteed.\r\n\r\nLooking forward to working together.', 450, 0),
(69, 12, 3, 'I am a Woocommerce Programmer Expert. \r\n\r\nAll in all, I believe I have the needed qualification, skills and experience to fit in this online community. I may have some struggles in the beginning, but there is nothing I cannot learn along the way.\r\n\r\nYours sincerely,\r\nKaloyan Nikolov', 850, 0),
(70, 13, 10, 'I am really passionate about Game Development. I am an experienced programmer (Javascript , create JS, and React JS).\r\n\r\nNo matter how hard the task is, I can do it. I am a motivated and hard working expert who provides results. I am a programmer and I am able to complete any task in the IT world.\r\n\r\nMoreover, I would love to grow within your company.\r\n\r\nResults are guaranteed.\r\n\r\nLooking forward to working together.', 450, 0),
(71, 5, 10, 'I will create a 5 minute explainer video to explained the importance of using our product to automate a cumbersome manual process. \r\n\r\nMoreover, I am able to deliver finished product by Friday 6pm GMT.\r\n\r\nMoreover, I would love to grow within your company.\r\n\r\nResults are guaranteed.\r\n\r\nLooking forward to working together.', 60, 1),
(72, 8, 3, 'I would like to apply for this Facebook Marketing Expert position. I am in Facebook 24/7 and that is why I am the right person. ', 110, 1),
(73, 39, 16, 'I have 5 years+ experience in writing blogs.\r\n\r\nI am very passionate about health and I know all this stuff.\r\n\r\n-Competitive Marketing Research\r\n-SEO / Keyword Research\r\n-Website & Online Marketing Analytics / Opportunities\r\n-Business Goals / Priorities - regular discussions with website project manager\r\n-Content Opportunities - missing or needed content, or improving existing content', 320, 1),
(74, 8, 16, 'I would be happy to be your Facebook Marketing Expert.\r\n\r\nI am able to create and organize content for your pages and grow our following organically ( NO fake likes ). Looking forward to working with you!', 95, 1),
(75, 44, 16, 'I have 3 years of experience in the Shopify Dropshipping eCommerce industry.\r\n\r\nI am also experienced in Shopify eCommerce Dropshipping and I can handle:\r\n\r\n1. setting up the shopify store (we have a store you can clone) | Includes adding apps\r\n2. finding new, hot products by using FB ads research, and other tools\r\n3. adding new products using Oberlo\r\n4. fulfilling orders using Oberlo\r\n5. replying to customer emails in a 24 hour response time\r\n6. handling disputes on Stripe/Shopify\r\n7. running FB ads / scaling FB ad', 325, 1),
(76, 1, 3, 'Hey. I saw you are looking for a Business Development person. Well, I am the right person for you.\r\n\r\nI am a person with the following skills:\r\n\r\n*Fluent English\r\n*Strong work ethic\r\n*Great communicator\r\n*Can work independently and quickly\r\n*Reliable and Consistent \r\n*Fast internet connection\r\n\r\nNo matter how hard the task is, I can do it. I am a motivated and hard working expert who provides results. \r\n\r\nMoreover, I would love to grow within your company.\r\n\r\nResults are guaranteed.\r\n\r\nLooking forward to working together.', 400, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `agreed_price` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL,
  `finished` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `topic_id`, `applicant_id`, `agreed_price`, `startDate`, `endDate`, `finished`) VALUES
(1, 54, 3, '240', '2018-11-01', '2019-01-05', 1),
(2, 15, 10, '1099', '2018-11-03', '2019-01-11', 1),
(3, 35, 11, '20', '2018-11-05', NULL, 0),
(4, 6, 3, '60', '2018-11-10', '2019-01-11', 1),
(5, 5, 6, '50', '2018-11-12', '2019-01-10', 1),
(6, 52, 11, '580', '2018-11-13', '2019-01-10', 1),
(7, 27, 4, '475', '2018-11-15', '2019-01-10', 1),
(8, 2, 16, '425', '2018-11-17', '2019-01-10', 1),
(9, 1, 14, '305', '2018-11-20', NULL, 0),
(10, 40, 3, '130', '2018-11-21', '2019-01-14', 1),
(11, 33, 10, '360', '2018-11-22', NULL, 0),
(12, 31, 4, '415', '2018-11-25', NULL, 0),
(13, 31, 3, '425', '2018-11-28', '2019-01-08', 1),
(14, 49, 11, '240', '2018-11-29', '2019-01-10', 1),
(15, 39, 20, '325', '2018-12-01', '2019-01-19', 1),
(16, 28, 11, '275', '2018-12-01', '2019-01-10', 1),
(17, 45, 6, '250', '2018-12-04', '2019-01-10', 1),
(18, 23, 19, '320', '2018-12-05', NULL, 0),
(19, 42, 15, '530', '2018-12-10', NULL, 0),
(20, 12, 3, '820', '2018-12-15', '2019-01-02', 1),
(21, 44, 11, '320', '2018-12-17', '2019-01-10', 1),
(22, 22, 14, '190', '2018-12-20', '2019-01-10', 1),
(23, 10, 4, '115', '2019-01-10', NULL, 0),
(24, 32, 19, '50', '2019-01-10', NULL, 0),
(25, 52, 20, '580', '2019-01-10', NULL, 0),
(26, 34, 10, '630', '2019-01-10', NULL, 0),
(27, 13, 10, '430', '2019-01-10', NULL, 0),
(28, 54, 10, '250', '2019-01-10', '2019-01-10', 1),
(29, 54, 4, '230', '2019-01-10', NULL, 0),
(30, 1, 16, '350', '2019-01-10', '2019-01-10', 1),
(31, 49, 20, '245', '2019-01-10', NULL, 0),
(32, 48, 6, '199', '2019-01-10', '2019-01-10', 1),
(33, 15, 3, '1050', '2019-01-14', NULL, 0),
(35, 1, 3, '350', '2019-01-17', '2019-01-17', 1),
(37, 28, 3, '330', '2019-01-17', '2019-01-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `emp_experience` int(11) NOT NULL,
  `emp_summary` varchar(255) NOT NULL,
  `app_experience` int(11) DEFAULT NULL,
  `app_summary` varchar(255) DEFAULT NULL,
  `contract_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `emp_experience`, `emp_summary`, `app_experience`, `app_summary`, `contract_id`, `applicant_id`) VALUES
(1, 1, 'Elena is not a good freelancer', NULL, NULL, 8, 16),
(2, 3, 'It was good working\r\nwith Borqna.', NULL, NULL, 15, 20),
(3, 1, 'Don\'t work with this\r\nperson. Very bad\r\nexperience.', NULL, NULL, 17, 6),
(4, 5, 'Kaloyan is great to\r\nwork with.', 2, 'Average experience.', 1, 3),
(5, 4, 'Highly recommended.\r\nViktoriq does her\r\nbest work every\r\ntime.', NULL, NULL, 21, 11),
(6, 3, 'Good performance.', NULL, NULL, 22, 14),
(7, 5, 'Ivan does his very\r\nbest every time.', NULL, NULL, 5, 6),
(8, 4, 'Kaloyan is great to\r\nwork with. He does\r\nnot stop until the\r\ntask is finished.', 5, 'I like how Maria works. Awesome experience.', 20, 3),
(9, 5, 'Excellent work. Will\r\nhire again.', 5, 'I can highly\r\nrecommend Maria.\r\nThanks a lot.', 28, 10),
(10, 2, 'John is not that\r\ngood in business\r\ndevelopment. Won\'t\r\nhire again.', NULL, NULL, 7, 4),
(11, 3, 'Not bad work. She\r\nknow what to do, but\r\nis bad at\r\ncommunication.', NULL, NULL, 16, 11),
(12, 2, 'Ahh, I know better\r\nfreelancers out\r\nthere.', 3, 'Not a bad employer, but I know better ones.', 6, 11),
(13, 4, 'Viktoriq is very\r\ngood. She did the\r\njob fast and will\r\nhire again.', NULL, NULL, 14, 11),
(14, 1, 'Ivan, did not\r\ncomplete the job in\r\ntime. So, sorry for\r\nhim.', NULL, NULL, 32, 6),
(15, 3, 'Elena knows her\r\nstuff. But, she did\r\nnot respond in time.', NULL, NULL, 30, 16),
(16, 3, 'Good work, but still needs to improve.', 4, 'Very good working\r\nperson. I recommend\r\nMaria.', 2, 10),
(17, 5, 'Great freelancer.', 2, 'Bad client to work\r\nwith. Don\'t like\r\nLili.', 13, 3),
(18, 4, 'Very good\r\nexperience. I\r\nrecommend Kaloyan.', NULL, NULL, 4, 3),
(19, 5, 'Kaloyan is an expert in his field. Excellent work.', NULL, NULL, 10, 3),
(20, 4, 'very good worker', 5, 'Bob is great to work\r\nwith.', 35, 3);

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `current` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobposts`
--

CREATE TABLE `jobposts` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_description` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `client_budget` int(11) NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 NOT NULL,
  `active` tinyint(11) NOT NULL DEFAULT '0',
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `job_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobposts`
--

INSERT INTO `jobposts` (`id`, `job_title`, `job_description`, `client_budget`, `picture`, `active`, `author_id`, `category_id`, `timestamp`, `job_views`) VALUES
(1, 'Business Development', 'Looking for someone with the following:\r\n\r\n*Fluent English\r\n*Strong work ethic\r\n*Great communicator\r\n*Can work independently and quickly\r\n*Reliable and Consistent \r\n*Fast internet connection\r\n\r\nAt VTL we help businesses grow. A segment of that is focused around growth hacking business development. \r\n\r\nAs a Business Development Associate, you will be challenged in a dynamic fast paced environment that will allow you to work remotely.\r\n\r\nWill be required to send a minimum of 50 direct messages that will be a copy and paste fashion for multiple accounts. So looking for someone that can send these out fast and hit numbers around 150-300 per day. \r\n\r\nAlso looking for someone who can analyze a list and identify great candidates for business opportunities depending on the client\'s needs. \r\n\r\nB2B sales experience is a plus. \r\nExperience is tech is a plus.\r\n\r\nPlease apply if you meet these requirements and we\'ll talk.', 299, 'http://localhost/job_board/img/jobs/business.jpg', 1, 2, 7, '2019-01-09 21:56:02', 4),
(2, 'Business Manager for eCommerce', 'I am looking for someone to assist with various upcoming projects least 30 hours a week as a Virtual Assistant and project manager. \r\n\r\nWe are a company based in the US, we have multiple websites, we need help in multiple areas including, managing our existing websites finishing updating and optimizing. And we want to branch out and add applicable items on eBay and Amazon, we need help in taking our business to the next level, so this person needs to be somewhat knowledgeable in those areas.   \r\n\r\nWould like someone familiar with the following but does not have to be completely competent in all areas\r\n\r\nPreferred but not required:\r\n\r\n-Google yahoo bingSEO and Online Marketing. \r\n-Social Media and social media marketing\r\n-Graphic Design (Image Editing Photoshop etc.)\r\n-Market Research\r\n-Alibaba (Product Research)\r\n-Amazon (product listing, optimizing )\r\n-Ebay  (product listing, optimizing)\r\n\r\nWe have help from developers and content writing but we need someone to overlook the projects And help us find help in different areas.\r\n\r\nThe VA would need to only have a positive attitude, and be willing to learn new things, some skills, and a willingness to deliver on time.  Also, good writing and communication skills and organized.', 399, 'http://localhost/job_board/img/jobs/business3.png', 1, 2, 7, '2019-01-09 22:05:41', 2),
(3, 'Full-stack PHP Developer', 'We are seeking strong full-stack: frontend and back end developers with a solid work ethic and willingness to learn new systems. \r\n\r\nWe are looking for someone motivated to help first to deliver quick small fixes and incrementally build new features. \r\n\r\nMandatory skillset: \r\nHTML, CSS, mySQL, git and PHP & Laravel\r\n\r\nThe ideal candidate will have a strong programming background (computer science degree or equivalent experience) and demonstrated record of getting results for a company. \r\n\r\nPlease send your resume when you apply, with links to your public github account and/or portfolio.\r\n\r\nMandatory: \r\nCandidate must have a maximum two hour time difference with Eastern Time (EST)\r\nExcellent conversational english (able to discuss complex technology issues and business domain concepts)', 499, 'http://localhost/job_board/img/jobs/it3.jpg', 0, 8, 1, '2019-01-09 22:08:49', 0),
(4, 'Expert Video Editor', 'Hey there! Please read this carefully. Whoever I hire will likely stay on board with me for this project and others over time. So, it\'s worth it for you to take a little time here. \r\n\r\nI run a financial marketing agency that helps online trading education services attract new members. Our new client has been in business for several months, and is already making well over $200k MRR, without even implementing a paid traffic strategy. As you can imagine, we see a lot of potential to substantially scale this business, as long as our ad campaigns are executed correctly.\r\n\r\nI believe this business has the most marketable, and easy to sell content out there. However, there is currently no process in place for produce compelling ad creative, on autopilot.\r\n\r\nWHAT I NEED\r\n\r\nWe are looking for someone who is capable of producing graphics and video that will work within a variety of ad placements on Facebook and Instagram. I will send you the client\'s existing media assets, including videos, which you can work with. I need you to be able to quickly complete tasks, such as:\r\n\r\n- Adding subtitles / captions to videos in all formats.\r\n- Converting a horizontal video into a vertical format, and vice versa.\r\n- Cutting up longer videos into short form clips, and surrounding them with text.\r\n- Mashing up segments from several longer videos into a visually appealing video ad.\r\n- Adding a status bar as the videos are progressing.\r\n- Producing graphics for all media placements that are specific to my instructions.\r\n\r\nPLEASE BE SPECIFIC IN YOUR PROPOSAL\r\n\r\n* Did you look over the client\'s website, media assets and videos? (Make sure to request them from me in your case study).\r\n\r\n* Do you understand the product I\'m selling? Do you have any interest, or relevant experience, in this space?\r\n\r\n* Do you understand how I want to work with you? \r\n\r\n* Do you have any case studies? \r\n\r\n* Do you have any initial ideas on how to help me based on the information I\'ve provided?\r\n\r\nThanks!', 259, 'http://localhost/job_board/img/jobs/graphicdesign2.jpg', 0, 9, 2, '2019-01-09 22:12:12', 0),
(5, 'Animated Video Explainer', 'Need 5 minutes explainer video to explained the importance of using our product to automate a cumbersome manual process. Must be able to deliver finished product by Friday 6pm GMT.', 39, 'http://localhost/job_board/img/jobs/graphicdesign.PNG', 1, 9, 2, '2019-01-09 22:16:06', 4),
(6, '15 Promo Video', 'We\'re looking for someone who can make us a great video.\r\n\r\nWe will have more than just this one project - we\'d like to start with one video and then make another 5 to 10 with you.\r\n\r\nPlease send samples of your work that\'s similar to the video linked above.', 55, 'http://localhost/job_board/img/jobs/graphicdesign3.jpg', 1, 9, 2, '2019-01-09 22:17:27', 2),
(7, 'Virtual Assistant For Marketing Tasks', 'You will be given a database of potential clients in which contains their contact details. You will be tasked with sending an email to 10 clients each working day. The email has been written and will be given to you. You will have to add the clients details to the email and send. All emails must be sent at 08:00 am UK time. \r\n\r\nAs you send an email to a potential client, you must note the date that the email was sent. \r\n\r\nIn short, you will send emails to 10 clients each day and note the date on the database provided.\r\n\r\nThis job was posted from a mobile device, so please pardon any typos or any missing details.', 79, 'http://localhost/job_board/img/jobs/marketing.jpg', 1, 12, 5, '2019-01-09 22:19:46', 0),
(8, 'Facebook Marketing Expert', 'We are looking for a social media expert to oversee our Instagram and Facebook social presents. Applicants must be able to create and organize content for our pages and grow our following organically ( NO fake likes ). Looking forward to working with you!', 66, 'http://localhost/job_board/img/jobs/marketing2.jpg', 1, 12, 5, '2019-01-09 22:20:43', 4),
(9, 'Email Marketing Expert', 'Looking to hire people for creating email marketing content for my digital agency. Please reach out to me with samples of previous work and share your experience.', 119, 'http://localhost/job_board/img/jobs/marketing5.jpg', 1, 12, 5, '2019-01-09 22:21:51', 0),
(10, 'Need video of interview', 'Great videos with catchy music and lines. Also to be posted in FB and Whatsapp', 111, 'http://localhost/job_board/img/jobs/graphicdesign4.jpg', 1, 9, 2, '2019-01-09 22:23:48', 4),
(11, 'Youtube Video Editing', 'You need to be being to work as told & this will be a full time position. Meet deadlines on a daily/weekly basis. this will be on going and will be for editing videos, loading up to youtube, also creating animation videos 5-10mins long.', 229, 'http://localhost/job_board/img/jobs/graphicdesign5.png', 1, 9, 2, '2019-01-09 22:25:04', 8),
(12, 'Woocommerce Programmer', 'We run a WordPress website and e-commerce store using Woocommerce.\r\n\r\n1. We would like our site improved to move faster for user and admin.\r\n\r\n2. We need our store redesigned/reconfigured for better user experience. \r\n\r\nPlease be sure to send an example of a store you have created.\r\n\r\nPlease do not apply if you are not an expert in Wordpress and Woocommerce.\r\n\r\nAttached is the home page design we would like.', 799, 'http://localhost/job_board/img/jobs/it8.jpeg', 1, 8, 1, '2019-01-09 22:27:05', 1),
(13, 'Game Development', 'Hi  \r\nI\'m looking for a experienced programmer (Javascript , create JS, and React JS).\r\nto develop a license free html program for browser to be used on computer or tablet for a childrenâ€™s interactive story book. \r\n\r\nThe project will start with the first chapter (14 pages).\r\nA prototype of the book has been created on Demibook composer. One chapter has been already translated into a suitable html program. \r\n\r\nI will provide assets, written instructions, and a video for each page.\r\n\r\nThis unique project is created in collaboration with Emory Hospital ( pediatric department of hematology) and is part of a larger children\'s health education  program.', 399, 'http://localhost/job_board/img/jobs/it2.png', 1, 21, 1, '2019-01-09 22:27:54', 2),
(14, 'Software Engineer', 'We need a programmer to complete our Inventory Management web app. The purpose of the app is to keep track of inventory items on two e-commerce platforms, Shopify and Handshake Direct Online. \r\n\r\nWe need someone who can write a script to update both e-commerce stores from the web app and keep items in sync.', 325, 'http://localhost/job_board/img/jobs/it4.jpeg', 1, 21, 1, '2019-01-09 22:29:10', 6),
(15, 'Intership Junior Programmer', 'We are looking for talented junior or student programmer to develop secure and functional code for our in-house software, which currently manage the whole Company (Flight Ops, Aircraft/Simulator and Crew controlling, Training follow up, Aircraft trackingâ€¦). Development will be under a mentoring program by our partner Omitsis, which not only will coach the student to work under professional standards and quality but also will help to work enjoying the project.\r\n\r\nREQUIREMENTS\r\nThe ideal candidate will have a passion for technology and software building with:\r\nAbility to program in PHP, a plus if has knowledge about Laravel\r\nGood knowledge with relational databases, mySQL, understand joins and query optimization.\r\nAbility to adapt to code made by other programmers: discover and fix errors, expand functionalities, etc.\r\n\r\nCAREER & SALARY\r\nVery competitive Salary Package + Perf. Bonus', 999, 'http://localhost/job_board/img/jobs/it5.jpg', 1, 8, 1, '2019-01-09 22:30:19', 2),
(16, 'Copywriter Needed', 'Hi there!\r\n\r\nWe\'re looking for a copywriter to join our group of e-commerce companies! We\'re a young and dynamic e-commerce team, and we\'re looking for a driven copywriter to join the ship.\r\n\r\nYou will be responsible for all copywriting needs. This ranges from packaging & product inserts copy, through ads creative and website/shopify funnels to Amazon listing copy & listing strategy (and more).  The industries are varied (health, supplements, beauty, pets, baby, etc.). The time commitment is ~20hrs/week for the first 6 months. \r\n\r\nYou must be well-versed in (1) direct response copywriting (e.g. sales funnels, sales letters, etc.) and (2) Amazon listing copywriting. If you do not have experience in both, this is not the right fit.\r\n\r\nWe\'re a very results-driven, high energy and high pace entrepreneurial company.\r\n\r\nIf you believe you\'re a good fit, we\'re looking forward to receiving your application!', 599, 'http://localhost/job_board/img/jobs/writing.jpg', 0, 5, 3, '2019-01-09 22:32:16', 0),
(17, 'Creative Copywrite', 'We have a very small writing task for which we need a creative and talented copywriter who has a way with words. The deliverable is around 60-100 words. We have an existing text but would like it to be refined into a more witty and original way. As we need a couple of variations to test, we will hire a number of freelancers. The ideal freelancer has experience in copywriting and coming up with good taglines.', 223, 'http://localhost/job_board/img/jobs/writing4.jpg', 1, 5, 3, '2019-01-09 22:33:09', 0),
(18, 'Sales copywriter for information product', 'My company sells information products and high-end coaching targeting web and software developers, priced in the $2000-4000 range. \r\n\r\nI\'m looking for a sales and marketing professional who specializes in sales copywriting. \r\n\r\nYou\'ll work closely with 1) the product principal, 2) an email and social media marketing expert, and 3) brand identity specialist to create the perfect sales content for sales pages, lead magnets, and automated email campaigns. \r\n\r\nI\'m hoping to establish a long-term working relationship.', 524, 'http://localhost/job_board/img/jobs/writing6.jpg', 0, 5, 3, '2019-01-09 22:34:12', 0),
(19, 'Bussiness Analyst', 'JobTitle     :  Business System Analyst\r\nDuration    :  6 +months\r\n\r\nDescription:\r\n    Requirement Elicitation Skills; Analysis of BRD, Writing detailed FRD, UI Specs, Data field mapping\r\n    Ability to create flowcharts, Use Cases, process flow, activity diagrams highly desirable\r\n    Identify internal & external dependencies & capture non-functional requirements\r\n    Experience on Insurance domain certainly desirable but not necessary\r\n    Written and verbal Business communication primarily in English language\r\n    Test Case review, Defect screening and categorizing (CRs vs Defects)\r\n    Excellent Communication skills, presentation and follow-up skills.', 234, 'http://localhost/job_board/img/jobs/business2.jpg', 1, 2, 7, '2019-01-09 22:36:01', 0),
(20, 'Virtual Assistant - Marketing', 'We are looking for an Administrative assistant with strong marketing & technology skills who can assist in planning events, arrange travel plans, research the competition, conduct phone calls, and assist our marketing team with setting up and managing campaigns. Must be fluent in English (reading/writing/speaking).\r\n\r\nTasks:\r\n\r\n    - Manage lead source tool LeadKahuna\r\n    - Create PowerPoint presentations for client & prospect events\r\n    - Gather stats from website Google Analytics and social media platforms prior to  weekly team meetings\r\n    - Edit/update website(s) as needed\r\n    - Edit videos for social media marketing\r\n    - Research competition using Excel spreadsheets/Google Drive\r\n    - Edit images for social media posts in Photoshop\r\n    - Post videos to Facebook Groups\r\n    - Create captions for Facebook videos', 433, 'http://localhost/job_board/img/jobs/marketing6.png', 1, 12, 5, '2019-01-09 22:38:16', 0),
(21, 'Social media marketer', 'I have two Instagram and Facebook pages that I would like to have one post a day put on each of them, this will be an ongoing contract for the right candidate. Needs to have good communication with me, I\'d like to be sent the posts before they are put up. Must have perfect written English. Basically I want to target people in the area I live, I am s personal trainer and also another side business of mine is providing vitamin B12 Shots. \r\nWhat is the going monthly rate for one post a day on each page?', 655, 'http://localhost/job_board/img/jobs/marketing7.jpeg', 1, 12, 5, '2019-01-09 22:39:22', 5),
(22, 'Data entry, Excel, Word', 'Full time VA, data entry, excel, cold calling, product knowledge in real estate field, social media posting, must clock hours with time doctor, must speak English and be available central standard time.', 187, 'http://localhost/job_board/img/jobs/dataentry.jpg', 1, 12, 4, '2019-01-09 22:40:39', 2),
(23, 'Data Analytics Expert', 'The course is entitled, \r\n\r\nâ€œData Analytics for Businessâ€\r\n\r\nThis course presumes no prior experience with Data Analytics and even extensive use of the tools used in Data Analytics, such as Advanced Excel and Tableau/SQL. \r\n\r\nWe are seeking someone with good research skills to help us figure out the course, what content, lessons, etc to include and where we should get the content, and what we should not offer in the course, and to develop a \"working syllabus.\"  \r\n\r\nThe purpose of the syllabus is to help us in our marketing efforts in procuring students via an information session (ie to present them with an overview of what they\'re going to learn, etc) for the course and an instructor. ', 299, 'http://localhost/job_board/img/jobs/dataentry2.JPG', 1, 12, 4, '2019-01-09 22:41:53', 1),
(24, 'Blog writer', 'I would like to have 50 plus articles for different categories listed on my blog should be plagiarism free.', 77, 'http://localhost/job_board/img/jobs/writing7.jpg', 1, 7, 3, '2019-01-09 22:43:49', 0),
(25, 'Create 5 Articles', 'We are looking for someone to write 4-5 800-1500 post articles on the subject of celebrity marketing. We already have the topics, and the person will need to do the research and write the articles based on the topics. This project is pretty straightforward. \r\n\r\nWe need the articles finished within 2 weeks.', 150, 'http://localhost/job_board/img/jobs/writing3.jpg', 1, 7, 3, '2019-01-09 22:44:57', 0),
(26, 'Creative Writer', 'Create brand awareness by generating:\r\n1.	Trust by publishing easily readable, shareable, engaging and truthful articles.\r\n2.	A history of quality content.\r\n3.	Added value to the website.\r\n\r\nThe goals are to:\r\n-	Publish content on our website, Facebook and RSS feed (or other social media platforms if needed)\r\n-	Increase website ranking (SEO etc..)\r\n-	Bring traffic to our website when content is shared.\r\n-	Generate leads.\r\n\r\nThe articles, infographics and videos need to be:\r\nA.	Relatable to common â€œissuesâ€ (ie: my parents live in FL and I am in NYC)\r\nB.	Meaningful\r\nC.	Easily understandable\r\nD.	Engaging\r\nE.	Informative\r\nF.	Short ( 400-500 words â€“ Less than 1 minute to read)\r\nG.	Reliable (verified sources)\r\n\r\nAvailability and means of communication must be given during the application process. More details will be given by private messages if selected.', 122, 'http://localhost/job_board/img/jobs/writing2.jpg', 1, 7, 3, '2019-01-09 22:45:58', 0),
(27, 'Business developer Manager', 'This role will be identifying new business opportunities and relationship with B2B customers, including small- and medium-sized businesses, large enterprises, educational institutions and government agencies, negotiating advantageous business terms and creating/executing go-to-market plans with these customers and maintains the business relationship by providing solutions for defined account(s), to achieve the identified strategy and companyâ€™s financial objectives. Working for Megatech, you will be supporting manufacturers such as, Cisco, Dell, HP, Lenovo, Microsoft, Lexmark, Xerox, Samsung, Western Digital, Asus, etc.\r\n\r\nDevelops and grows our companyâ€™ s pre-established market share in the assigned market or technology segment. Conducts market research in order to profile customers/vendors and determine revenue potential. Works closely with Product Marketing, Marketing Services, Sales and Tech Support to achieve established Company objectives. ', 455, 'http://localhost/job_board/img/jobs/business4.jpg', 1, 2, 7, '2019-01-09 22:51:56', 2),
(28, 'Sales representative', 'We are looking for a high-performing and motivated sales representative to help us meet our customer acquisition and revenue growth targets by keeping our company competitive and innovative in the field.\r\n\r\nResponsibilities:\r\nReach out to customer leads through cold calling\r\nPresent, promote and sell all-in-one shielding solutions benefits\r\nPerforming cost-benefit analyses of existing and potential customers\r\nMaintaining positive business relationships to ensure future sales\r\n\r\nRequirements:\r\nProven work experience as a sales representative\r\nHighly motivated and target driven with a proven track record in sales\r\nExcellent selling, communication and negotiation skills\r\nPrioritizing, time management and organizational skills\r\nAbility to create and deliver presentations tailored to the audience needs\r\nRelationship management skills and openness to feedback\r\nBS/BA degree or equivalent', 267, 'http://localhost/job_board/img/jobs/business5.jpg', 1, 2, 7, '2019-01-09 22:54:33', 3),
(29, 'General Translation', 'Deliverable is  a term used in project management to describe service produced as result of the project that is intend ed to be delivered to a customer. The type of freelancer I\'m looking for is: Translation. The unique thing is to be able to have smart success criteria which mean it\'s specific and realistic', 69, 'http://localhost/job_board/img/jobs/translation.jpg', 0, 2, 6, '2019-01-09 22:55:43', 0),
(30, 'English to Portuguese Brazil Translation/Editing', 'We\'re looking for native Brazilian Portuguese speaker with fluent English is accurately translate or proofread & edit. The native individual must be attentive to details.\r\n\r\nYour bid should be for 30000 words in total to edit and proofread and correct. More details with selected individual.\r\n\r\nThanks\r\n', 78, 'http://localhost/job_board/img/jobs/translation2.jpg', 1, 2, 6, '2019-01-09 22:56:33', 0),
(31, 'Expert Graphics Designer', 'We are looking for a talented Infographics designer, with the ability to create appealing professional graphics. \r\n\r\nYour responsibilities:\r\n- Collaborate with team members to understand business and user requirements\r\n- Create graphics  (dimension, labeling, and icon) for product images and graphic design work (for A+)  on Amazon\r\n- Translate requirements into highly engaging and compelling design concepts\r\n- Communicate design strategy and rationale to stakeholders\r\n- Handle multiple projects and deliver results in a timely manner  \r\n- Contribute suggestions or ideas to improve branding and messaging\r\n\r\nYour qualifications: \r\n- Compelling portfolio that demonstrates innovative infographics and other design work\r\n- Ability to work with constructive criticism as well as adhere to deadlines\r\n- A work style that is extremely detail oriented ', 411, 'http://localhost/job_board/img/jobs/graphicdesign6.jpg', 1, 17, 2, '2019-01-09 22:57:56', 4),
(32, 'Translate pages from Spanish to English', 'I need someone to translate the a great number of pages of a law firm website from Spanish to English.\r\n\r\nLower bids have priority.', 45, 'http://localhost/job_board/img/jobs/translation3.jpg', 1, 17, 6, '2019-01-09 22:59:38', 3),
(33, 'Python and C++ expert', 'Fast paced agency seeking a Python and C++ expert to convert an existing website.', 344, 'http://localhost/job_board/img/jobs/it7.jpg', 1, 21, 1, '2019-01-09 23:04:12', 1),
(34, 'Android developer', 'Project:\r\nOutdoor educational game platform\r\n\r\nScope of work:\r\nCreate an app for Android tablet in landscape mode that gets input from an usb serial device, then post (HTTP POST) the input and render the returned html\r\n\r\nDeliverables:\r\n- app, source code (commented) and instructions to build the app\r\n\r\nSpecial requirements:\r\nThe app needs to read from the usb serial device (will be provided to freelancer for the duration of the job) by using a serial communication library.', 600, 'http://localhost/job_board/img/jobs/it9.jpg', 1, 21, 1, '2019-01-09 23:05:13', 3),
(35, 'Word Document Format Editing', 'I need help making this 2-page word document fit onto 1 page. There are about 26 documents all exactly the same with slightly different numbers but they all need to be on 1 page.', 15, 'http://localhost/job_board/img/jobs/dataentry4.jpg', 1, 5, 4, '2019-01-09 23:08:14', 2),
(36, 'Data Entry Research', 'Looking for a list for data entry/processing role that can take on jobs. I will send a website with basic company information. \r\ndepending on quality of work, deliverable turnaround time, and ability to follow instructions or ask for clarification when unsure. We would like your ability to manage and train others so you can build a team, esquires ability to use Excel, have worked with a VPN, and must start immediately.', 100, 'http://localhost/job_board/img/jobs/writing8.jpg', 1, 5, 3, '2019-01-09 23:09:54', 0),
(37, 'Typing a PDF file into Word', 'We have a pdf document (our own), that was done for us several years ago, and the designer is no longer working in the business.\r\n\r\nSo we need someone who\'s good in Word to re-type the file (with charts and tables) so we can update the form.\r\n\r\nIt\'s a 30 page document.\r\n\r\nFrom time-to-time, we may have other projects similar to this as well.', 35, 'http://localhost/job_board/img/jobs/writing9.jpg', 1, 7, 3, '2019-01-09 23:17:44', 0),
(38, 'Project Manager', 'We are a creative digital agency helping business owners build profitable businesses with Facebook Advertising and Sales Funnels. \r\n\r\nWe currently have a very exciting opportunity for an experienced Project Manager to join our digital team to look after a range of clients. This is a great opportunity for someone who is looking to broaden their digital knowledge across other disciplines in a dynamic digital agency and enjoys working from the comfort of their home in their spare time. We offer a great working environment, with a start-up feel, great conversations and debates on slack and a fantastic opportunity to grow within our evolving and creative business. This role is also for someone who goes an extra mile and is really passionate about growing online businesses. \r\n\r\nWhatâ€™s in it for you: \r\n    > Work on exciting projects \r\n    > Test new cutting-edge digital strategies \r\n    > Help scale a digital agency\r\n    > Learn from great marketers  \r\n    > Work in a relaxed atmosphere with pre-screened clients (no difficult people, only serious businesses, only exciting projects) \r\n    > Grow your knowledge, get certifications and access our huge marketing resource database and plenty of courses \r\n    > Get individual coaching by our agency owner \r\n    > Fully remote work  \r\n    > Flexible hours, plan your own schedule ', 200, 'http://localhost/job_board/img/jobs/business6.jpg', 1, 2, 7, '2019-01-09 23:19:01', 9),
(39, 'Healthcare Content Writer', 'As a Web Content Producer for Progressive Healthcare Companies, you\'ll need to - \r\n\r\n-Determine the best content direction/plan prior to the next period (month)\r\n-Produce a specific amount of words / pages / content each month, in the first 20 days\r\n-Edit all content reviewed by managers and the client\r\n-Publish all approved content by the end of that period\r\n\r\n--------\r\n\r\nContent direction is influenced by - \r\n\r\n-Competitive Marketing Research\r\n-SEO / Keyword Research\r\n-Website & Online Marketing Analytics / Opportunities\r\n-Business Goals / Priorities - regular discussions with website project manager\r\n-Content Opportunities - missing or needed content, or improving existing content\r\n\r\nTypes of content:\r\n\r\n-Educational content\r\n-Scientific research driven content\r\n-Marketing content\r\n-Sales content\r\n-Web Art selection (curation)', 300, 'http://localhost/job_board/img/jobs/writing10.jpg', 1, 2, 3, '2019-01-09 23:20:20', 2),
(40, 'Full Stack Developer', 'The idea is to have a photographer on a tourist place and allow him to upload this pictures to the system using the 4g network from photographers mobile phone.\r\n\r\nAs a web app, it should be able to work on a browser, iphone and android. \r\n\r\nIf you have any ideas, let me know.\r\n\r\nWrite \"photo\" at proposal text to let me know you read everything - proposal without this word won\'t be accepted', 120, 'http://localhost/job_board/img/jobs/it10.png', 1, 21, 1, '2019-01-09 23:22:33', 1),
(41, 'Developer with Planning Skills', 'What we\'re looking for:\r\nAn experienced full stack developer to help kick-start the development of a learning management system that has CRM functionality for to aid in the automation of marketing campaigns.. We need someone to work on a custom LMS and CRM. The project should be built on the Laravel framework.\r\n\r\nTo complete all the deliverables, the right developer will have experience in the following:\r\n  - Experience translating mock-ups and wireframes into front-end code\r\n  - Experience designing websites \r\n  - Experience integrating apps with APIs\r\n\r\nIn your proposal, please share a brief summary of your experience and tell us about a recent full stack web development project you worked on.', 300, 'http://localhost/job_board/img/jobs/it11.jpeg', 1, 8, 1, '2019-01-09 23:23:36', 4),
(42, 'Front end developer', 'We are looking for a front end developer who can work with our existing platform which is a Ruby on Rails and Vue.js application. Our initial projects include:\r\n\r\n- Complete redesign of our administrative portal (from designs that have already been created)\r\n- Refactor our entire public website to be fully responsive\r\n- Keep up with constant public website modifications\r\n- Cross browse our public website \r\n\r\nIt is important that you know how to work with a Rails and Vue.js application but you won\'t be engaged in any backend development work or any Vue.js work. Ideally, the candidate should be detailed oriented.\r\n\r\nRequirements: \r\n- Expertise in web development and web development best practices\r\n- Expertise in working with responsive designs and development\r\n- Knowledge of the Ruby on Rails framework\r\n- Knowledge of working with HAML, SASS, and Pug\r\n- Design fundamentals \r\n- Fluent in web standards and building solutions using semantic markup and CSS\r\n- Knowledge of working with GIT and Git Hub', 500, 'http://localhost/job_board/img/jobs/it.jpg', 1, 8, 1, '2019-01-09 23:25:02', 1),
(43, 'Web Platform Development', 'Looking for a full stack web developer to perform a small task. More details will be provided to the selected freelance. The task consists in creating a white drawing canvas and sign-up form linked to backend (admin).\r\n\r\nWe do not hire separate front and back-end coders. We only hire full-stack coders. Please ensure your skills are high for both front, and back-end work.\r\n\r\nNo agencies - we only work directly with contractors.\r\n\r\nNo outsourcing to someone else.\r\n\r\nREQUIREMENTS:\r\n\r\n- Must be fluent in English\r\n- Expert or experienced working with UI and UX\r\n- Demonstrate the previous projects (portfolio) of similar jobs\r\n- Available for interview/meetings', 250, 'http://localhost/job_board/img/jobs/it6.jpg', 1, 21, 1, '2019-01-09 23:26:33', 1),
(44, 'Shopify Dropshipping eCommerce', 'Looking for an experienced Shopify eCommerce Dropshipping Admin to handle:\r\n\r\n1. setting up the shopify store (we have a store you can clone) | Includes adding apps\r\n2. finding new, hot products by using FB ads research, and other tools\r\n3. adding new products using Oberlo\r\n4. fulfilling orders using Oberlo\r\n5. replying to customer emails in a 24 hour response time\r\n6. handling disputes on Stripe/Shopify\r\n7. running FB ads / scaling FB ad', 300, 'http://localhost/job_board/img/jobs/marketing9.jpg', 1, 12, 5, '2019-01-09 23:28:15', 3),
(45, 'Facebook Ad Manager', 'Seeking an experienced facebook ad manager to manage eCommerce conversion campaigns for established footwear brand. Campaigns will include retargetting, short-term sales campaigns, and new customer acquisition. \r\n\r\nYou will be responsible for developing audiences (several years of data to work with - active pixel), writing ad text & copy, managing and monitoring performance, and analyzing results. Visual components will be provided from your direction (e.g. you tell us what you need and we will provide it).\r\n\r\nCandidates should have proven experience in facebook advertising marketing and a strong track record in conversion campaigns. B2C eCommerce ads experience is a must, preferably with international targeting. \r\n\r\nFluency in English required. \r\nFluency in French and/or German is appreciated but not required.', 220, 'http://localhost/job_board/img/jobs/marketing8.jpg', 1, 12, 5, '2019-01-09 23:29:02', 2),
(46, 'IT Ecommerce website', 'Looking for an SEO expert who can simply deliver results. Website is currently in development, and the ideal person will create and implement a full SEO research report and implement the strategy they create. We simply want to be on page one of Google for certain search terms.', 200, 'http://localhost/job_board/img/jobs/it12.jpg', 1, 21, 1, '2019-01-09 23:30:31', 2),
(47, 'Website creation', 'Looking for a web and mobile optimized site to use in selling an e-commerce product geared toward personal supplements.\r\n\r\nPlus if you\'re experienced in SEO marketing and can hear content to effective ad words campaigns.\r\n\r\nLooking forward to your best proposal.', 305, 'http://localhost/job_board/img/jobs/it13.jpg', 1, 21, 1, '2019-01-09 23:31:40', 1),
(48, 'Video Marketing', 'I\'m currently setting up a drop shipping store and next assistance setting up Facebook, Instagram, Twitter, Pinterest. Will also need advertising videos on drop shipping store and products to go viral.', 150, 'http://localhost/job_board/img/jobs/marketing10.jpg', 1, 22, 5, '2019-01-09 23:34:40', 4),
(49, 'Uploading to eBay, amazon', 'I need someone who is familiar with eBay and Amazon.\r\n\r\nGenerating eBay listings from a list off our manifest.\r\n\r\nTo research footwear off a manifest generating pictures, description and any other knowledge about listings mainly on eBay few are on Amazon. Also wanting to boost social media and other outlets as well if skilled within that area would be a plus.', 225, 'http://localhost/job_board/img/jobs/marketing11.jpeg', 1, 22, 5, '2019-01-09 23:35:55', 2),
(50, 'Translate Marketing Campaign', 'I need someone who is willing to translate my marketing campaign very fast. Looking for your proposals.', 25, 'http://localhost/job_board/img/jobs/marketing4.jpg', 1, 22, 6, '2019-01-09 23:37:03', 8),
(51, 'Marketing (Promos / Listing Optimization) Specialist', 'We are a rapidly growing Ecommerce company in search of a long term employee who can grow with our company. We are looking for a detail oriented team member who can think creatively, compile data in excel, and conduct in depth research.\r\n\r\nThis role will be responsible for the day-to-day optimization and products management. \r\n\r\nWe need someone who can do these tasks but not limited to\r\n\r\nOn amazon promotions (coupons / multi-buy / cross promoting products)\r\nPromotion creation (single use coupon codes / group / url structure) \r\nPromotion tracking\r\nListing optimization tracking (sessions + conversions).\r\nEBC\r\nKeyword tracking + follow up regarding best course of action\r\nGive aways tracking\r\nsocial media promotions\r\nmany chats management preferred\r\nFB campaigns set up also preferred\r\n\r\nNeed to have experience or knowledge in\r\nBasic MS Excel / Google Spreadsheet\r\nSEO Optimization \r\nBachelor degree from accredited university\r\nAble to multi-task and understand the bigger picture\r\nTeam play who is sincere and willing to learn and be part of the team\r\nHigh proficiency in English and good internet connection\r\nExperience in Amazon or Seller Central preferred', 450, 'http://localhost/job_board/img/jobs/marketing3.jpg', 1, 22, 5, '2019-01-09 23:38:03', 5),
(52, 'Native English Writer', 'My partner and I are looking for a native English VA to write health related blog content for us on a full time basis (8 hours a day, 5 days a week). The pay is $550 USD a month. The topics will on lifestyle and later health; to start, the articles will focus mostly on kitchenware products such as home meat slicers, cookware .\r\n\r\nWe\'re looking for a true wordsmith that understands how to do thorough research and write engaging content full of useful information, research, and actionable tips.\r\n\r\nMost likely you know already if you\'re a good writer or not. If you\'re not, please don\'t waste time applying, we will reject you.', 550, 'http://localhost/job_board/img/jobs/marketing12.png', 1, 7, 3, '2019-01-10 10:11:22', 12),
(53, 'C# Developers', 'We have a lot of exciting new features planned and are looking for at least 2 more exceptional people to join our team full time (+30 hours per week).\r\n\r\nOur Technologies:\r\nThe technologies we use are ASP.Net MVC, WebApi, .Net Core, React, TypeScript, SQL Server. We host everything on AWS. \r\n\r\nTo apply for this role you must meet the following criteria:\r\n- **Live in Europe or Russia** \r\n- Able to work full time, during UTC +1/+3 time zone\r\n- Have 5+ years experience with ASP.NET MVC, Javascript & Git\r\n- Be an exceptionally talented developer, able to solve complex problems\r\n\r\nIn addition, any experience with React and Typescript is very highly valued\r\n\r\nThis is a full time role on a large and ongoing project. Shortlisted applicants will be asked to complete a small online skills test.\r\n\r\nThank you for viewing this job and we look forward to hearing from you.', 440, 'http://localhost/job_board/img/jobs/it14.jpg', 1, 21, 1, '2019-01-10 10:07:47', 12),
(54, 'C++ developer', 'C++ | C# | Azure Developer: Must have excellent C++ | C# expertise on Windows platform in developing large C++ software products with expertise in C++ | C#, Design Patterns, XML | JSON | REST Web Services, MS SQL Server database, any NoSQL database, any lexer / parser, etc. Expertise as Azure DevOps and programming with any pubsub queue architecture is highly desired. Expertise in developing Android applications is also desired.', 230, 'http://localhost/job_board/img/jobs/it15.jpg', 1, 8, 1, '2019-01-10 10:08:49', 11),
(55, 'Graphic Design Master', 'I need the best graphic designer. Please, apply.', 350, 'http://localhost/job_board/img/jobs/graphicdesign8.jpeg', 1, 8, 2, '2019-01-18 00:07:34', 10);

-- --------------------------------------------------------

--
-- Table structure for table `jobpostscategories`
--

CREATE TABLE `jobpostscategories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobpostscategories`
--

INSERT INTO `jobpostscategories` (`id`, `category`) VALUES
(1, 'IT'),
(2, 'Graphic Design'),
(3, 'Writing'),
(4, 'Data Entry'),
(5, 'Marketing'),
(6, 'Translation'),
(7, 'Business'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_read` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `topic_id`, `post_creator`, `post_content`, `post_date`, `post_read`) VALUES
(1, 1, 21, 'Hi Denitsa. I wanted to talk to you about the pyton job that I hired you for. Are you available now?', '2019-01-10 17:20:36', 'no'),
(2, 2, 21, 'Hey, Kaloyan. How are you today?', '2019-01-10 17:22:26', 'yes'),
(3, 3, 9, 'Hi Kaloyan. Nice to meet you. Let\'s discuss the job.', '2019-01-10 18:05:29', 'yes'),
(4, 4, 9, 'John, I saw you can edit interviews. Am I right?', '2019-01-10 18:06:26', 'no'),
(5, 5, 21, 'Hi Denitsa. I saw you applied for the Game development job.', '2019-01-10 18:21:45', 'no'),
(6, 2, 3, 'Hi Valeriq. I feel great and I am eager to work.', '2019-01-10 18:22:17', 'yes'),
(7, 6, 8, 'Denitsa, are you good in c++?', '2019-01-10 18:23:54', 'yes'),
(8, 7, 22, 'Hey, how are you?', '2019-01-10 18:40:33', 'no'),
(9, 8, 22, 'Hey, Ivan. Let\'s discuss the details.', '2019-01-10 18:41:34', 'no'),
(10, 9, 22, 'Hey Viktoriq. Let\'s talk.', '2019-01-10 18:47:26', 'no'),
(11, 10, 2, 'Hi Elena. Let\'s talk about business development.', '2019-01-10 18:48:34', 'no'),
(12, 6, 10, 'Hi Maria. I am a gamer. Thanks.', '2019-01-11 12:55:22', 'no'),
(13, 11, 8, 'Hi Kaloyan. When can you talk?', '2019-01-13 20:25:19', 'yes'),
(14, 11, 3, 'Hi Maria. I can talk tomorrow. Thanks.', '2019-01-14 19:03:59', 'yes'),
(15, 11, 8, 'Ok. Let\'s talk tomorrow then. I am available at 10am UTC +2 time zone.', '2019-01-14 19:05:00', 'yes'),
(16, 11, 8, 'Will you be able to make it then?', '2019-01-14 19:05:37', 'yes'),
(17, 12, 17, 'Will you be able to finish the job next week?', '2019-01-14 19:07:36', 'yes'),
(18, 12, 3, 'Yes, Lili, sure. I can do that.', '2019-01-14 19:09:16', 'yes'),
(19, 12, 17, 'Sounds great. Looking forward to see your work.', '2019-01-14 19:11:15', 'yes'),
(20, 11, 3, 'Of course. Count on me.', '2019-01-14 19:12:11', 'yes'),
(21, 2, 21, 'Nice to hear. Let\'s start working.', '2019-01-17 17:56:38', 'yes'),
(22, 5, 21, 'Hey, where are you.', '2019-01-17 17:57:14', 'no'),
(25, 13, 8, 'Hello, when can you start working?', '2019-01-18 02:18:34', 'yes'),
(26, 13, 10, 'Immediately.', '2019-01-18 02:19:05', 'yes'),
(27, 13, 8, 'Fantastic. Will send you details.', '2019-01-18 02:19:33', 'no'),
(28, 12, 3, 'I will send very soon.', '2019-01-20 10:53:39', 'no'),
(29, 3, 3, 'I am available to talk tomorrow.', '2019-01-20 10:54:54', 'no'),
(30, 13, 8, 'Hi Denitsa. I will send details tomorrow.', '2019-01-20 17:47:41', 'no'),
(31, 2, 3, 'Awesome. I am ready.', '2019-01-20 18:03:54', 'no'),
(32, 11, 3, 'Let\'s start tomorrow at 09:00AM?', '2019-01-20 18:05:51', 'no'),
(33, 14, 8, 'Hi John. How are you doing?', '2019-01-20 18:11:30', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_creator` int(11) NOT NULL,
  `topic_participant` int(11) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT '0',
  `topic_replies` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic_title`, `topic_creator`, `topic_participant`, `topic_date`, `topic_reply_date`, `topic_views`, `topic_replies`) VALUES
(1, 'Python and C++ Job', 21, 10, '2019-01-10 17:20:36', '2019-01-10 17:20:36', 4, 0),
(2, 'Full Stack Dev', 21, 3, '2019-01-10 17:22:26', '2019-01-20 18:03:54', 10, 3),
(3, '15 Minute Promo Video', 9, 3, '2019-01-10 18:05:29', '2019-01-20 10:54:54', 6, 1),
(4, 'Edit Video Interviews', 9, 4, '2019-01-10 18:06:26', '2019-01-10 18:06:26', 1, 0),
(5, 'Game Development', 21, 10, '2019-01-10 18:21:45', '2019-01-17 17:57:14', 5, 1),
(6, 'C++ Developer', 8, 10, '2019-01-10 18:23:54', '2019-01-11 12:55:22', 4, 1),
(7, 'Ebay, Amazon', 22, 20, '2019-01-10 18:40:33', '2019-01-10 18:40:33', 1, 0),
(8, 'Video', 22, 6, '2019-01-10 18:41:34', '2019-01-10 18:41:34', 1, 0),
(9, 'eBay', 22, 11, '2019-01-10 18:47:26', '2019-01-10 18:47:26', 1, 0),
(10, 'Business Development', 2, 16, '2019-01-10 18:48:34', '2019-01-10 18:48:34', 1, 0),
(11, 'Woocommerce', 8, 3, '2019-01-13 20:25:19', '2019-01-20 18:05:51', 16, 5),
(12, 'Graphics Designer', 17, 3, '2019-01-14 19:07:36', '2019-01-20 10:53:39', 10, 3),
(13, 'Graphics Design Master', 8, 10, '2019-01-18 02:18:34', '2019-01-20 17:47:41', 7, 3),
(14, 'C++ Person', 8, 4, '2019-01-20 18:11:30', '2019-01-20 18:11:30', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_user_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `hash`, `email`, `firstname`, `lastname`, `category_user_id`, `description`, `active`, `type`, `image`) VALUES
(1, 'vanko', '$2y$10$/GWlh//H7SUWodYM7T1cFeqKUCTZF99DBVWgh7Rg11fqHcSJ6TP4O', '4a7d1ed414474e4033ac29ccb8653d9b', 'vankovankov99@gmail.com', 'Vanko', 'Vankov', 8, NULL, 1, 'admin', 'http://localhost/job_board/img/users/ivan.jpg'),
(2, 'bob', '$2y$10$TDbGbvgiW6ymAsdBpz9CdOHoixGDqDjgLau18Qr.3AlkX9NGDOJ0q', 'b59c67bf196a4758191e42f76670ceba', 'robertsrapidreviews@gmail.com', 'Robert', 'Marceau', 7, 'I am looking to hire a Public Relations (PR) Professional, specializing in public relations, outreach and integrative communications strategies. He should design methods to reach and leverage influencers, write impactful content and foster strong relations with targeted thought leaders and editors across digital and traditional media that are relative to you. \r\n\r\nThe people I am looking for have to be able to take an integrative approach to digital marketing and use tactics designed to create engagement with the target audience and also to garner media attention. My strategies have resulted in featured articles, front page news articles (online and print), top stories in prime television, as well as radio. ', 1, 'employer', 'http://localhost/job_board/img/users/bob.jpg'),
(3, 'kjn', '$2y$10$TAffKSMl06b6Yl7a3zyA9OgP856Q0AkCQlGEvrqifnXQJaR9bOxGq', '934b535800b1cba8f96a5d72f72f1611', 'knikolov4521@gmail.com', 'Kaloyan', 'Nikolov', 1, 'I am a 24-year old hard-working, ambitious person and I am looking forward to working with highly motivated people.\r\n\r\nI have been working as a freelancer for the last 4 years and I really believe that everyone should be location independent in todayâ€™s world. Furthermore, I have been able to gain a lot of knowledge and experience working with people from all around the world. \r\n\r\nWhat is more, I have graduated with a bachelorâ€™s degree in â€œSoftware Internet Technologiesâ€ and I am now studying for a magister degree in â€œSoftware Engineeringâ€. During my 5 years of education I was able to work on a number of projects and get experience in the IT field. Moreover, I have excellent skills in HTML5, CSS, Javascript, PHP, C#, C++, Java, SQL, MySQL, Wordpress and others.\r\n\r\nI have the willingness to improve my skills in the field of IT. The best skill that I possess is my knowledge in HTML, CSS and PHP, but I am always willing to learn new technologies. I really like the fact that you offer training opportunities to encourage us to stay up-to-date with ever-evolving technologies.\r\n\r\nMy passion for programming has been a great valuable asset and main reason to study and become a software engineer. I would like to practice and implement what I have learned in university and apply it in the real world.\r\n\r\nI can adapt very fast to each situation and find solutions to problems. Moreover, I am always ready to maximize my efforts in order to provide an excellent job. Another great asset that I have is my perfectionism. There is no work that I can leave undone. If there is something that has to be done on a tight deadline, I will work overtime in order to provide great results.\r\n\r\nMy communication skills are on a very high level. I am fluent in English, very communicative and I am always looking to exchange ideas with other team workers. Furthermore, I am a great team player and I consider that this is a crucial factor to achieve success. \r\n\r\nAll in all, I believe I have the needed qualification, skills and experience to fit in this online community. I may have some struggles in the beginning, but there is nothing I cannot learn along the way.\r\n\r\nYours sincerely,\r\nKaloyan Nikolov', 1, 'freelancer', 'http://localhost/job_board/img/users/kjn.jpg'),
(4, 'john', '$2y$10$At44MGrtefrQNVEBjmE20eUyqRvkUHnGUr4T5I9J7YU942Is.eLgy', '2be9bd7a3434f7038ca27d1918de58bd', 'john@abv.bg', 'John', 'Smith', 2, NULL, 1, 'freelancer', 'http://localhost/job_board/img/users/john.jpg'),
(5, 'mike', '$2y$10$ktfFAO2fgFJXxh9xbFskXeh90pS4ox1jGMH40dWC5ME9CTHTD9wi6', 'dbc4d84bfcfe2284ba11beffb853a8c4', 'mike@abv.bg', 'Mike', 'Donovan', 3, NULL, 1, 'employer', 'http://localhost/job_board/img/users/mike.jpg'),
(6, 'ivan', '$2y$10$zt1XrhEOfwX6l/yI4mvu8unqvNs46IKR2gSv/u1YYDVLjP0cEQvpO', '6074c6aa3488f3c2dddff2a7ca821aab', 'ivan@abv.bg', 'Ivan', 'Ivanov', 2, 'Dedicated and enthusiastic Graphic Designer with over eight years of experience delivering creative and innovative design solutions. Proven ability to develop projects from concept to final delivery, ensuring that all work is prepared and delivered within budget and time frame. \r\n\r\nI offer a a full service creative design company. We provide visual communication for my clientâ€™s products, events and services. Our goal is to bring awareness to your brand and reach new audiences through our print and digital creative solutions.\r\n\r\nMy specialties include:\r\n\r\nDIGITAL MEDIA DESIGN\r\nServices include responsive website design and development with a focus on\r\nUI (user interface) and UX. (user experience) \r\n\r\nBRANDING\r\nFrom startups to established brands. I work closely with the client\r\nto communicate the brand across a broad spectrum. Also ensuring brand consistency by setting up guidelines and strategy. ', 1, 'freelancer', 'http://localhost/job_board/img/users/ivan.jpg'),
(7, 'jordan', '$2y$10$jRpf8mw8Xh.nhIL4Hn4hMu0dWOGPM99Rvazss2hAww1YGFwsRnxTq', 'e9510081ac30ffa83f10b68cde1cac07', 'jordan@abv.bg', 'Jordan', 'Jordanov', 3, NULL, 1, 'employer', 'http://localhost/job_board/img/users/jordan.jpg'),
(8, 'maria', '$2y$10$CND0SsGSsLdE1L2dAB6/bebarXrdd5IT2T5k4f2tXmyBRo1Gii.K2', 'd79c8788088c2193f0244d8f1f36d2db', 'maria@abv.bg', 'Maria', 'Marieva', 1, 'I am looking to hire people from all over the world.\r\n\r\nSince our establishment, Ive enjoyed sustained growth and strive to make an impact in the world of software development. As mycompany matures weâ€™ve stayed focused on what really matters: attracting and retaining global talent, developing dynamic solutions that leverage the latest technologies and maintaining successful partnerships with our clients.\r\n\r\nI am running a global company, but Icater to specific, local needs. Nothing inspires me more than the challenge of finding the right solution for a complicated problem. Above all, I am dedicated to building unique applications for our clients.\r\n\r\nMy goal isnâ€™t just to create vibrant and media-rich interactive solutions, but also to expand into emerging industries with whatever new technologies the future holds.', 1, 'employer', 'http://localhost/job_board/img/users/maria.jpg'),
(9, 'vesko', '$2y$10$HIBdEw8sHm3Wfj30ChX5pOa5A9mKhTtYGX8WtW9NOC/nJSw/dpDqi', 'cf79ae6addba60ad018347359bd144d2', 'vesko@abv.bg', 'Vesko', 'Veskov', 2, NULL, 1, 'employer', 'http://localhost/job_board/img/users/vesko.jpg'),
(10, 'denitsa', '$2y$10$LemCh1./ZOjFhrlYDmWWm.p5mIFCEJVcVyRLPoK9kmThAzy15Rcm.', 'b0c7ae2316c7e8214fd659e4bc8a0dea', 'denitsa@abv.bg', 'Denitsa', 'Nikolova', 1, 'Thank you for visiting my profile.\r\n\r\nEasy Communication, Fast Speed, High Quality, Perfect Delivery!\r\nThis is my important target in Mobile App Development.\r\n\r\nI am a Highly Dedicated Mobile Developer with 5+ years experience in Objective-C/swift/Apple Xcode, Java/Eclipse/Android Studio, PHP/Web. Excellent at developing and maintaining client/server applications. I am hard-working and fast programmer with good communication skills and a strong UI design skill.\r\n\r\nI can support of following. \r\n- Full time support(40~60 hrs/week) \r\n- Daily progress report and $kype live chat \r\n- Long term relationship contract\r\n\r\nIf you select me as a contractor, I will reply good quality and quality and rapid turnaround.\r\nI will provide service till your satisfaction.\r\nYou won\'t be disappointed.\r\nThank you, Denitsa.', 1, 'freelancer', 'http://localhost/job_board/img/users/denitsa.jpg'),
(11, 'viktoriq', '$2y$10$.EUvOy9Dd7Qq8zP4ePfmluGStOyS6Z7vJeTUFNNCjjoM4DsoLKi8.', 'fa246d0262c3925617b0c72bb20eeb1d', 'viktoriq@abv.bg', 'Viktoriq', 'Viktorova', 5, 'Bring your Business to Life with Facebook and Instagram Video ads\r\n\r\nDrive Awareness and Sales with Videos\r\n\r\nBusinesses likes yours are capturing the attention of their target customers.\r\n\r\nAre you looking for someone who is willing to provide quality work for a very reasonable price?\r\n\r\nAre you looking for someone who is willing to work with you on a regular basis and consistently brings you results?\r\n\r\nAre you looking for someone to double your return on investment?\r\n\r\nIf that is correct, then you have come to the right place!\r\n\r\nI have been working for in the video editing and production space for almost 5 years. I help small businesses and entrepreneurs achieve their goals and grow their business. My clients are so thankful to me that they want to work with me again and again.\r\n\r\nHere are several tips you should take into consideration when making your Facebook and Instagram ads:\r\n\r\n1. Make your video ads as short as humanly possible. Every second counts. You cannot afford to waste a single frame. Although the current format for Facebook and Instagram video ads is 60 seconds, for a lot of people thatâ€™s still too long.\r\n\r\n2. Today, most of the views on Facebook and Instagram happen in silent more. Don\'t make your audio a priority.\r\n\r\n3. Add some fancy design and bold text to your video to catch viewers\' attention.\r\n\r\nNowadays, more and more people are surfing online. As a result, itâ€™s becoming more and more necessary for businesses to maintain a presence there. One of the best ways to do this is to use social media such as Facebook and Instagram, and one of the best ways to get noticed is with a video.\r\n\r\nFacebook users watch more than 4 billion videos a day. Capturing viewersâ€™ attention is getting harder and harder. They are far more likely to scroll down the feed because of impatience. That is why I will share with you the secrets of making videos that capture peopleâ€™s attention.\r\n\r\nThanks and looking forward to working together.', 1, 'freelancer', 'http://localhost/job_board/img/users/viktoriq.jpg'),
(12, 'vanessa', '$2y$10$8FP4nAIMcF64/T3bJEVGauvb90SSWhS8hsKoZKJ1oOOo0aNKG.dwq', '81dc9bdb52d04dc20036dbd8313ed055', 'vanessa@abv.bg', 'Vanessa', 'Simpson', 5, NULL, 1, 'employer', 'http://localhost/job_board/img/users/vanessa.jpg'),
(13, 'gabriela', '$2y$10$0tULFdDePGhDulm2dCRtcO9ib4JjjA1Qnwvo40KPMiPeprCFhfZNC', '1f262a60600e30c026663a7ccbed6bab', 'gabriela@abv.bg', 'Gabriela', 'Gabrielova', 2, NULL, 1, 'freelancer', 'http://localhost/job_board/img/users/gabriela.png'),
(14, 'viktor', '$2y$10$BPfWBXlA.x06PAAdWuoFUuDSZPM3OGzS0c6UtZQ1HiAAm1peIKTrC', '674f3c2c1a8a6f90461e8a66fb5550ba', 'viktor@abv.bg', 'Viktor', 'Viktorov', 7, 'I am a 20-year Public Relations professional with experience in the healthcare, financial, real estate, social services, non-profit and academic sectors. I work with clients on creating communications strategies and objectives to achieve their business goals. Such strategies include strategic plan development, public relations counseling, crisis communications, messaging, marketing, social media planning and media relations. \r\n\r\nI have extensive experience in pitching local, national and online media outlets as well as press release writing, editing, social media management and website development. I have placed client stories in a number of national media outlets, including The Today Show, US News & World Report, Fast Company and more.\r\n\r\nPlease contact me to discuss your communications needs. I look forward to working with you. ', 1, 'freelancer', 'http://localhost/job_board/img/users/viktor.JPG'),
(15, 'jeffrey', '$2y$10$ZRvh5ktsdHkx6BXb0au6CeypB4/dNoMMVSk2VCqf.B/rwnD/A7Q.G', '912e79cd13c64069d91da65d62fbb78c', 'jeffrey@abv.bg', 'Jeffrey', 'Shilder', 1, NULL, 1, 'freelancer', 'http://localhost/job_board/img/users/jeffrey.PNG'),
(16, 'elena', '$2y$10$HUGKmMlEqVfAaLJvFsnsfetWijqRyoUuLZIdCqaBbWn1gI2DmfcPq', 'd93591bdf7860e1e4ee2fca799911215', 'elena@abv.bg', 'Elenka', 'Cankova', 7, 'I create investor ready plans and models for entrepreneurs and startups. My documents help them pitch to investors and potential business partners.\r\n\r\nMany of my clients are founders, organizations and companies seeking to create business and marketing plans, business models, full pitch decks or online presentations.\r\n\r\nAmong my past clients I have financial institutions, crowdfunding site, technology startups, food distribution companies, entertainment ventures and green energy companies, plus many nonprofit organizations, in the US, Canada, Latin America, Africa, Europe, MENA region and Australia. \r\n\r\nMy best clients are the ones with new and disruptive ideas. In my process I ask many questions, do a lot of research, propose new ideas, explore diverse channel of distribution, provide a lot of graphics, create business models, run numbers and create financial projections. At the end, I do everything I can to create useful and powerful documents for my clients.', 1, 'freelancer', 'http://localhost/job_board/img/users/elena.jpg'),
(17, 'lili', '$2y$10$T2HJDlmFlJ3ihZOU5sXwiuqkEobbHl70x5pv347.wTzNzrHrIdS8i', 'e2a7555f7cabd6e31aef45cb8cda4999', 'lili@abv.bg', 'Lili', 'Lilova', 2, NULL, 1, 'employer', 'http://localhost/job_board/img/users/lili.png'),
(18, 'lychka', '$2y$10$ix/K795/PYRBQY6jCvh24eiKPtPCfmK.y45AG3KBjs8ajS0d4xcCS', '83e8ef518174e1eb6be4a0778d050c9d', 'lychka@abv.bg', 'Lychka', 'Lychkova', 5, NULL, 0, 'freelancer', 'http://localhost/job_board/img/users/lychka.jpg'),
(19, 'teodor', '$2y$10$gjjwVDKHrwAQwfqkvGMF9.kcfKpTyA/sEzGTyeIEshGkfDqzY7cqe', '9ca8c9b0996bbf05ae7753d34667a6fd', 'teodor@abv.bg', 'Teodor', 'Teodorov', 4, NULL, 3, 'freelancer', 'http://localhost/job_board/img/users/teodor.jpg'),
(20, 'borqna', '$2y$10$gZCrESApeaVjcHPkXRiHW.T4tNGmQbpar.Ue4mV3dq0M27NhhSlhS', 'f8abea41f08a479ca29e81fe5f2ce6db', 'borqna@abv.bg', 'Borqna', 'Borqnova', 2, NULL, 1, 'freelancer', 'http://localhost/job_board/img/users/borqna.JPG'),
(21, 'valeriq', '$2y$10$O0ddQR.wVgJ1xRc8Rs9G/eG0PFMnBtyE66hBT2KYJ2M/5kcNyjEQm', '751f915c24612ce66dba400a86a0909b', 'valeriq@abv.bg', 'Valeriq', 'Valerieva', 1, 'I am looking for freelancers with about 20 years of experience. These people are highly valued by me for their professionalism and in-depth technical knowledge. \r\n\r\nThey should have competencies are the following technologies:\r\n\r\nLanguages:\r\n- PHP (Zend Framework, CodeIgniter, Symfony, Yii, Laravel, Silex, Doctrine)\r\n- Java (Lucene, Hadoop, Ping, Spring, Netty)\r\n- JavaScript (jQuery, AngularJS, React.js, Dojo, Vue.js, Backbone.js, Ember.js, Node.js)\r\n- Go (BeeGo, go-kit)\r\n- C / C++\r\nand more\r\n\r\nCMS: Wordpress, Joomla, Drupal, Shopify, Magento\r\n\r\nDatabases (storages, caches, queues): MySQL, PostgreSQL, MS SQL Server, Oracle, RabbitMQ, Aerospike, MongoDB, Cassandra, CouchDB, Clickhouse, ElasticSearch, Redis, Memcached, SQLite, Scylla, Hive, Impala, Couchbase Server, Tarantool etc.\r\n\r\nMobile Development: Android, iOS, VR', 1, 'employer', 'http://localhost/job_board/img/users/valeriq.jpg'),
(22, 'traqn', '$2y$10$MOla.2nyZkm/Iw29RsaVjODuzK/K3k1E9I5231ZxTaIHZnhYhr8ki', '11704817e347269b7254e744b5e22dac', 'traqn@abv.bg', 'Traqn', 'Traqnov', 5, NULL, 3, 'employer', 'http://localhost/job_board/img/users/traqn.jpg'),
(23, 'kaloyan', '$2y$10$F9ccfW9j.1kfWTGOk1udh.Od2LKb27ptqtxuaRGCgMEiDWt9w0jQe', '104b34bda6b3814427c5b544eed62097', 'nikolovk94@abv.bg', 'Kaloyan', 'Jivkov', 5, NULL, 2, 'freelancer', 'http://localhost/job_board/img/users/kaloyan.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `jobposts`
--
ALTER TABLE `jobposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `jobpostscategories`
--
ALTER TABLE `jobpostscategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `post_creator` (`post_creator`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_creator` (`topic_creator`),
  ADD KEY `topic_participant` (`topic_participant`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_user_id` (`category_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobposts`
--
ALTER TABLE `jobposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `jobpostscategories`
--
ALTER TABLE `jobpostscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `applications_ibfk_4` FOREIGN KEY (`topic_id`) REFERENCES `jobposts` (`id`);

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contracts_ibfk_3` FOREIGN KEY (`topic_id`) REFERENCES `jobposts` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invitations`
--
ALTER TABLE `invitations`
  ADD CONSTRAINT `invitations_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `jobposts` (`id`),
  ADD CONSTRAINT `invitations_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `jobposts`
--
ALTER TABLE `jobposts`
  ADD CONSTRAINT `jobposts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `jobpostscategories` (`id`),
  ADD CONSTRAINT `jobposts_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_creator`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_creator`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_participant`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`category_user_id`) REFERENCES `jobpostscategories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
