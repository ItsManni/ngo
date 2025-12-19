-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2025 at 10:00 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a17404c5_dayabhawnafoundation_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `ID` int(11) NOT NULL,
  `Banner` varchar(256) NOT NULL DEFAULT '',
  `BannerUrl` varchar(256) NOT NULL DEFAULT '#',
  `Feature` int(11) NOT NULL DEFAULT '0',
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `ID` int(11) NOT NULL,
  `BlogName` varchar(250) NOT NULL,
  `Url` varchar(100) NOT NULL DEFAULT '',
  `BlogImg` varchar(250) NOT NULL,
  `ShortDescription` varchar(500) NOT NULL DEFAULT '',
  `Category` varchar(200) NOT NULL DEFAULT '',
  `BlogDescription` text NOT NULL,
  `MetaTitle` varchar(250) NOT NULL DEFAULT '',
  `MetaDescription` varchar(250) NOT NULL DEFAULT '',
  `OGTitle` varchar(256) NOT NULL DEFAULT '',
  `OGDescription` varchar(256) NOT NULL DEFAULT '',
  `OGImage` varchar(256) NOT NULL DEFAULT '',
  `Tags` varchar(500) NOT NULL DEFAULT '',
  `Status` varchar(100) NOT NULL DEFAULT '',
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`ID`, `BlogName`, `Url`, `BlogImg`, `ShortDescription`, `Category`, `BlogDescription`, `MetaTitle`, `MetaDescription`, `OGTitle`, `OGDescription`, `OGImage`, `Tags`, `Status`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(1, 'The ROI of DTF', 'the-roi-of-dtf', '22808-1BlogImg-Attachment.webp', 'Buying the right DTF printing solution can set your shop up for a quick ROI and future profits. Here are some things to consider when choosing your DTF printer.', 'custamization', '<p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">In the past few years, there’s been a dramatic transition in the way custom apparel is being printed as many producers switch to using direct-to-film, or DTF, printing, alongside or instead of more traditional technologies such as dye-sublimation and screen printing.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><a href=\"https://www.rolanddga.com/products/printers/versastudio-by-20\" style=\"color: rgb(0, 118, 190);\">DTF printing</a> allows users to cost-effectively produce vibrant, durable designs for customized apparel on-demand. As a result, more small businesses and shop owners are bringing DTF capability in-house to better satisfy their customers and diversify their revenue streams.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">We talked with Roland DGA Application Specialist Mike Davis about what to consider when purchasing a DTF solution, and how new users and experienced shop owners alike can use this technology to maximize their efficiency, productivity, and profitability.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><img alt=\"Sports jersey with number 10 and colored stripes.\" src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/20250214-roi-of-dtf/800x540_ty-sportswear.jpg?h=533&w=800&rev=08b47cd0effc4feb88d08b55e0399554&hash=B39748E61136D3E43CCC0905933BD639\" style=\"display: block; height: auto; width: 800px;\"></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Why are so many small businesses and shops adding DTF production?</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><strong style=\"font-weight: bold;\">Mike Davis:</strong> Creators and print shop owners that don’t currently offer in-house custom apparel are realizing that they’re missing out on profits… and possibly customers. They may be choosing not to offer apparel, or they may be sending it out. Outsourcing brings its own challenges, including a reduced ability to control timing and quality, and of course lower profitability.<br>While shop owners may want to offer apparel in-house, in many cases, their demand level may not be high enough to support an investment in the equipment, supplies, and training needed for traditional options like screen printing or dye-sublimation.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">DTF printing technology is an efficient, cost-effective, and easy-to-use technology – one that requires essentially the same skill level as printing decals. For shops that are printing and transferring 50-75 shirts a day, a desktop DTF printer like the <a href=\"https://www.rolanddga.com/products/printers/versastudio-by-20\" style=\"color: rgb(0, 118, 190);\">VersaSTUDIO BY-20</a> is a great option.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Shops that produce a larger volume of apparel or that want to sell gang sheets may need to consider a production DTF machine such as the <a href=\"https://www.rolanddga.com/products/printers/ty-300\" style=\"color: rgb(0, 118, 190);\">TY-300</a> that can print larger quantities more rapidly.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><img alt=\"Gang sheet of designs for Vipers baseball team apparel.\" src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/20250214-roi-of-dtf/800x540_viper-gang-sheet.jpg?rev=805ce47989594fb7a398e1114cb2a293&hash=90F094B695DDFC6131332268D85AB064\" style=\"display: block; height: auto; width: 800px;\"></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">What kind of ROI can DTF users anticipate?</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">A shop owner’s ROI will vary depending on what they are printing, however, on average, they should be able to net close to $500 - $1,000 profit per hour with a desktop DTF machine like the BY-20. With a larger and more powerful DTF printer like the <a rel=\"noopener noreferrer\" href=\"https://www.rolanddga.com/products/printers/ty-300#ty300roi\" target=\"_blank\" style=\"color: rgb(0, 118, 190);\">TY-300</a>, users can potentially generate over $4,500 profit per hour.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Gang sheets printed on the <a rel=\"noopener noreferrer\" href=\"https://www.rolanddga.com/products/printers/versastudio-by-20#by20roi\" target=\"_blank\" style=\"color: rgb(0, 118, 190);\">BY-20</a> desktop DTF printer with several images on them can produce at least $100 in profit per sheet, if the user is selling the transfer on a completed blank item. As an example: Say a sports team would like some apparel. On one gang sheet measuring 16” x 20”, which prints in about 10 minutes, you can provide graphics for a player’s jersey with a name and number on the back and logo on the front, six 4” x 4” pocket logos for coaches’ shirts, and three 3” x 3” logos for players’ hats.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">You can sell these items for a considerable profit. A typical player’s jersey with front and back graphics is valued at about $25. Coaches’ dry-fit shirts with a left chest graphic also go for about $25. Hats with a graphic can be sold for about $12 each.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Additionally, many shop owners these days are selling gang sheets alone, saving time, labor costs, and the inventory expense of applying graphics to apparel in-house.  If you are selling gang sheets, the wholesale price would likely be up to $12 a sheet.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">These are margins that can really contribute to your bottom line.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><img alt=\"Roland DG TY-300 DTF printer with printed media.\" src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/20250214-roi-of-dtf/800x540_ty-printer.jpg?h=533&w=800&rev=1c9edfb107a24ccb92b91ea7f96e7c24&hash=0B1F2A62AE4BB1A3568B626ACDA7F63E\" style=\"display: block; height: auto; width: 800px;\"></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">What should shop owners consider when evaluating DTF equipment?</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Here are five important considerations for evaluating DTF systems:</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><strong style=\"font-weight: bold;\">Production capability</strong> – How much can the printer produce in a day? Shops that need to produce 50-75 shirts a day, on average, should consider a desktop DTF machine. Those who need higher levels of output for retail or wholesale should consider a production DTF printer. Most brand-name production machines print one roll of film, which is approximately 328 feet, in a day.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><strong style=\"font-weight: bold;\">Power requirements </strong>– While DTF printers usually have a very low power draw, the shaker oven may require 220V service. Your dealer will be able to walk you through each specific device’s power requirements.<br><strong style=\"font-weight: bold;\"></strong></p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><strong style=\"font-weight: bold;\">Space needs</strong> – A desktop device like the Roland DG VersaSTUDIO BY-20 DTF printer requires only a 2’ x 4’ tabletop to accommodate the printer, supplies, and a laptop. Most production systems have substantially larger footprints. The TY-300 with a heater/shaker unit, for example, needs a space that’s about 9’ x 13’.<br><strong style=\"font-weight: bold;\"></strong></p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><strong style=\"font-weight: bold;\">Running costs</strong> – Maintenance and running costs for DTF printers can vary widely. The TY-300, for example, offers greater ink efficiency and fewer maintenance requirements than printers from other manufacturers, resulting in lower overall running costs.<br><strong style=\"font-weight: bold;\"></strong></p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><strong style=\"font-weight: bold;\">Reliability</strong> – Since printers are often critical to a business’s profitability, I recommend buying a name-brand DTF printer that comes with technical support and a manufacturer’s warranty. Printers made by some overseas manufacturers and refurbished printers – even those resold in the U.S. – often don’t provide the support, software, or replacement parts that may be needed over the lifetime of your printer. Roland DGA, on the other hand, backs its printers with a warranty and plenty of support through its network of dealers and technicians.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><img alt=\"Roland DG BY-20 DTF printer with printed media.\" src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/20250214-roi-of-dtf/800x540_by20-machine.jpg?rev=87166b76c3f34843a49ec0d5fb829e82&hash=BE5470EC2F4E4A052C30CC4F4875FDD7\" style=\"display: block; height: auto; width: 800px;\"></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">What types of material can DTF prints be applied to?</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">DTF prints provide tremendous versatility. They can be used on most textiles, including natural and synthetic fabrics. Specifically, they can be applied to Tri blends (fabrics made from cotton, rayon, and polyester) as well as to 100% polyester, 100% cotton, cotton canvas, twill, and denim.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Also, unlike dye-sublimation, DTF prints can be applied to dark fabrics.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><img alt=\"Black t-shirt with DTF-printed graphic on upholstered seat.\" src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/20250214-roi-of-dtf/800x540_ty-festival-graphic-tee.jpg?rev=d649fd6dd1714d14b23497a10c38f417&hash=4AD565A55FE15AE9DFE54DC46135F8CE\" style=\"display: block; height: auto; width: 800px;\"></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">How durable are DTF prints? Can they be stored for later use?</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">DTF transfers, when properly applied, are very durable and have been found to last 50 or more washes. DTF prints can also be stored for later use. Most people can print them, put them aside, and transfer them six months later. I have personally transferred prints that are a year old with good results. The caveat is that they have to be produced properly and stored properly.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\"><img alt=\"Black baseball cap with DTF-printed Reyn graphic.\" src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/20250214-roi-of-dtf/800x540_reyn-cap.jpg?rev=f023e486687b47baa376f8473b246ccc&hash=5E39344C1DFD6263C72C5C22907D5DFF\" style=\"display: block; height: auto; width: 800px;\"></h2><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">How sustainable is DTF production?</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">DTF is a great option for sustainability. Using DTF, shop owners can print on demand or transfer on demand, which vastly reduces waste and extra inventory. Most shop owners can simply stock apparel blanks and wait for on-demand requests or print several transfers that are ready to apply.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">What do you see ahead for the DTF market?</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">This technology is where the market is going. More and more PSPs are adding DTF capability, and those that aren’t are outsourcing to other shops that produce DTF prints. Screen printers are also adding DTF for short runs and sampling. Today’s DTF printers are more intuitive and efficient than ever, providing users with versatile, vibrant, on-demand production capability.</p>', 'The ROI of DTF | Roland', 'Buying the right DTF printing solution can set your shop up for a quick ROI and future profits.', 'The ROI of DTF | Roland', 'Buying the right DTF printing solution can set your shop up for a quick ROI and future profits.', '', '', 'Published', '2025-03-13', '11:23:31', 'admin@dayabhawnafoundation.com', 1),
(2, 'DG DIMENSE Delivers Innovative Solutions from Lithuania to the World', 'dg-dimense-delivers-innovative-solutions-from-lithuania-to-the-world', '56288-2BlogImg-Attachment.webp', 'Get a behind-the-scenes look at DG DIMENSE\'s facilities and unique print production capabilities.', 'roland', '<p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">We recently visited DG DIMENSE, a Lithuanian joint venture with Roland DG established in October 2023.&nbsp;<a href=\"https://www.rolanddg.com/en/blog/231010-dg-dimense-foundation-ceremony\" style=\"color: rgb(0, 118, 190);\">(Click here for details of the founding ceremony.)</a>&nbsp;</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">This company offers a unique digital printing solution,&nbsp;<a href=\"https://www.rolanddga.com/products/printers/dimensor-s-printer\" style=\"color: rgb(0, 118, 190);\">DIMENSE</a>, featuring three-dimensional embossing, or texture printing, for&nbsp;<a href=\"https://www.rolanddga.com/industry/interior-design\" style=\"color: rgb(0, 118, 190);\">interior design printing</a>&nbsp;applications. We explored their headquarters where they produce their unique products, and visited their gallery where the latest technology can be experienced firsthand.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Unique product development and manufacturing</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">DG DIMENSE’s headquarters is located about 7.5 miles from the center of Vilnius, the capital of Lithuania. The site features two buildings: an office and a factory where approximately 50 employees work in research and development, sales and marketing, production, and design. From here, DG DIMENSE’s unique DIMENSE digital printing solution is distributed globally.</p><div class=\"row\" style=\"margin-top: 0px; margin-right: calc(-6px); margin-left: calc(-6px); color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><div class=\"col-md-12\" style=\"flex-basis: auto; width: 783.75px; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_02.jpg?rev=9cdaf59a972f4700860779efe6251b5b&amp;hash=E8A52C9B143BC0365D4C47B9B82A56FD\" alt=\"Various wallpapers\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">Various wallpapers decorate the conference room.</figcaption></figure></div></div><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">The office’s conference rooms and workspaces are decorated with wallpapers, art pieces, and building materials that utilize DIMENSE technology. These spaces feature works that combine color printing with embossing, use embossing in concrete molds, apply fabrics to embossed surfaces to create unique textures, and include glitter applied through digital printing. These designs demonstrate textures and effects that were previously difficult to achieve with conventional techniques.</p><div class=\"row\" style=\"margin-top: 0px; margin-right: calc(-6px); margin-left: calc(-6px); color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><div class=\"col-md-6\" style=\"flex-basis: auto; width: 391.875px; max-width: 100%; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_03.jpg?rev=505ef465abce45f4ad3724b55a778f94&amp;hash=154AEF7F86FF0852C6EB59AFB8DEFD4B\" alt=\"Japanese-style artwork\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">A work combining embossing and color printing.</figcaption></figure></div><div class=\"col-md-6\" style=\"flex-basis: auto; width: 391.875px; max-width: 100%; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_04.jpg?rev=6749bbaada0447fd9affd980e173b8e0&amp;hash=D8BA1F49155D374F09B9588C2F3E3D4B\" alt=\"Embossed wallpaper\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">Office walls decorated with embossed wallpapers.</figcaption></figure></div></div><div class=\"row\" style=\"margin-top: 0px; margin-right: calc(-6px); margin-left: calc(-6px); color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><div class=\"col-md-6\" style=\"flex-basis: auto; width: 391.875px; max-width: 100%; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_05.jpg?rev=93c34dac11884a7aacdd787a18a20b13&amp;hash=B8179016B80A6EA8E0AA86A3AC0831AB\" alt=\"Printed sample\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">Fabric pressed onto embossing, creating a unique texture, with potential applications in wallpapers and furniture.</figcaption></figure></div><div class=\"col-md-6\" style=\"flex-basis: auto; width: 391.875px; max-width: 100%; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_06.jpg?rev=841c2a46438d4aebb868b74c0bd508d7&amp;hash=B1E0840CC11C1BCC9EBD6A092626E058\" alt=\"Glitter artwork\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">A vibrant piece with glitter applied through digital printing.</figcaption></figure></div></div><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">DIMENSE’s digital printing solution creates a three-dimensional effect</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">DG DIMENSE excels in chemical technology, developing and manufacturing environmentally friendly, PVC-free wallpaper materials and specialized inks. We toured the factory within DG DIMENSE’s headquarters where these products, inks, and various wallpaper materials are produced.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">The DIMENSE solution uses special media that foams when heated. The Dimensor S inkjet printer is equipped with both structural ink (clear) and water-based ink (CMYK). After printing on the material, the printer’s on-board heater applies heat, causing the areas without structural ink to foam, thereby allowing for the simultaneous creation of textured designs and color printing.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">The DIMENSE solution has been showcased at exhibitions worldwide, garnering significant attention. The technology expands the possibilities of digital printing, enabling designs that can be enjoyed both visually and tactilely through embossing effects. It is being used in various ways for interior design printing, including for the production of wallpapers, interior decoration, posters, and art.</p><div class=\"row\" style=\"margin-top: 0px; margin-right: calc(-6px); margin-left: calc(-6px); color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><div class=\"col-md-6\" style=\"flex-basis: auto; width: 391.875px; max-width: 100%; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_07.jpg?rev=885d44056b4d4278ab654a6bf52618f6&amp;hash=6DCF235B4CBBFBA96E0CADD3E690379F\" alt=\"The Dimensor S\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">The Dimensor S inkjet printer.</figcaption></figure></div><div class=\"col-md-6\" style=\"flex-basis: auto; width: 391.875px; max-width: 100%; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_08.jpg?rev=e5b9981e96d64fb8ac6eacdce9bb2f7a&amp;hash=4B249BCC9D00B2EB7125401F712FCFDE\" alt=\"In-house wallpaper production\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">Environmentally friendly wallpaper materials manufactured in-house.</figcaption></figure></div></div><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Experience cutting-edge technology and design in the gallery</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">DG DIMENSE offers a wide range of wallpaper designs utilizing their interior design printing technology. Their gallery in central Vilnius is located in a boutique-lined area, providing new interior design ideas to trend-conscious visitors. In the gallery, visitors can see and touch wallpapers featuring unique embossing, experiencing their texture and color firsthand. Digital printing allows for unique designs not bound by traditional repetitive patterns, and examples of these bold designs are also on display.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">The gallery regularly hosts workshops and events with designers and creators. Information is also shared through the&nbsp;<a href=\"https://www.dimensedecor.com/\" style=\"color: rgb(0, 118, 190);\">website</a>.</p><div class=\"row\" style=\"margin-top: 0px; margin-right: calc(-6px); margin-left: calc(-6px); color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><div class=\"col-md-6\" style=\"flex-basis: auto; width: 391.875px; max-width: 100%; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_09.jpg?rev=643a00feb2ea4a78b7331baf5fd77e65&amp;hash=31453A4C05F1C3474893612244C747F1\" alt=\"The gallery\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">The gallery in central Vilnius.</figcaption></figure></div><div class=\"col-md-6\" style=\"flex-basis: auto; width: 391.875px; max-width: 100%; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_10.jpg?rev=d5935da872ae45cc816d1f604b128cb2&amp;hash=879432DC143BAC2464C1083B5BF91F36\" alt=\"Graphic works\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">Displayed wallpapers and graphic works, including a piece using embossing on a concrete mold (foreground).</figcaption></figure></div></div><div class=\"row\" style=\"margin-top: 0px; margin-right: calc(-6px); margin-left: calc(-6px); color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><div class=\"col-md-6\" style=\"flex-basis: auto; width: 391.875px; max-width: 100%; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_11.jpg?rev=9b6fe183297843268d5e1119e8be9dbd&amp;hash=31D67373E4285DECA4DF5366C30AC36A\" alt=\"Touchable samples\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">Visitors can experience the textures and feel of the designs.</figcaption></figure></div><div class=\"col-md-6\" style=\"flex-basis: auto; width: 391.875px; max-width: 100%; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_12.jpg?rev=530f75638f5e41e2ac496cda9f9d1e5c&amp;hash=F9D064B3DE15CC2569B2CA45D87A9590\" alt=\"Wallpaper samples\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">The gallery showcases a variety of wallpaper designs and colors.</figcaption></figure></div></div><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Expanding DIMENSE solutions worldwide</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">This visit reaffirmed the unique technology and potential of DIMENSE. Recently, the Embassy of Japan in Lithuania adopted DIMENSE for its wall decorations. Additionally, in 2024 DG DIMENSE opened a gallery in Miami, Florida, actively expanding its presence outside of Lithuania. DG DIMENSE will continue to advance into new markets and drive technological innovation, leveraging the extensive global network of Roland DG Group to provide solutions for customers around the world.</p><div class=\"row\" style=\"margin-top: 0px; margin-right: calc(-6px); margin-left: calc(-6px); color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><div class=\"col-md-6\" style=\"flex-basis: auto; width: 391.875px; max-width: 100%; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_13.jpg?rev=340149eaca304fe599199c93fb1b49ea&amp;hash=DFCA6E1CBE3CAC165869001C239D3A3B\" alt=\"Visit from Roland DG President Tanabe\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">Roland DG President Tanabe visited the DG DIMENSE headquarters in July.&nbsp;</figcaption></figure></div><div class=\"col-md-6\" style=\"flex-basis: auto; width: 391.875px; max-width: 100%; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_15.jpg?rev=7d951ec7deef420eb9f52a089db1c42a&amp;hash=DC91FE4CCF775FDBBF8B3528B87F7FAD\" alt=\"Ambassador Tetsu Ozaki and President Tanabe\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">President Tanabe observed the wall decorations at the Embassy of Japan in Lithuania and met Ambassador Tetsu Ozaki.&nbsp;</figcaption></figure></div></div><div class=\"row\" style=\"margin-top: 0px; margin-right: calc(-6px); margin-left: calc(-6px); color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><div class=\"col-md-12\" style=\"flex-basis: auto; width: 783.75px; padding-right: calc(var(--bs-gutter-x)*.5); padding-left: calc(var(--bs-gutter-x)*.5);\"><figure style=\"margin-bottom: 0px;\"><img src=\"https://image.rolanddga.com/-/media/roland/images/blog/2025/2025-dgdimense-office-and-gallery/240830_dg_dimense_office_and_gallery_17.jpg?rev=943d3f06290640329cfca82153d06ddb&amp;hash=76ADDA31D9CA1C6800D16C0BFFE231FD\" alt=\"Group photo with DG DIMENSE staff\" class=\"img-fluid\" style=\"display: block;\"><figcaption class=\"text-secondary m-2 p-2\" style=\"line-height: 1.2; color: rgb(108, 117, 125) !important;\">Building camaraderie with the DG DIMENSE team at the gallery.</figcaption></figure></div></div>', 'DG DIMENSE Delivers Innovative Solutions from Lithuania to the World | Roland', 'A behind-the-scenes look at DG DIMENSE&#39;s facilities and capabilities.', 'DG DIMENSE Delivers Innovative Solutions from Lithuania to the World | Roland', 'A behind-the-scenes look at DG DIMENSE&#39;s facilities and capabilities.', '', '', 'Published', '2025-03-13', '11:39:06', 'admin@dayabhawnafoundation.com', 1),
(3, 'Gang Sheets and ROI', 'gang-sheets-and-roi', '54849-3BlogImg-Attachment.webp', 'DTF is a popular and easy-to-use technology for creating custom apparel. Roland DGA\'s Mike Davis breaks down the return you can earn with in-house production.', 'signage', '<p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">As any business owner knows, finding ways to maximize your production efficiency is incredibly important to being successful. DTF printing has become a popular way to create custom apparel due to its versatility, durability, and vibrant results. Starting a DTF business can be very profitable, especially if you consider optimizing your output by printing multiple graphics on one sheet.<br><br>We talked with Roland DGA Application Specialist Mike Davis about how to incorporate gang sheets to maximize your DTF printing efficiency, your productivity, and your profit.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><img alt=\"Gang sheet of graphics for Vipers Baseball team.\" src=\"https://image.rolanddga.com/-/media/roland/images/blog/2024/gang-sheets-and-roi-for-dtf/vipers-gang-sheet_800x533_800x533_20241125_v01_dg.jpg?rev=2c654c5bd2d645118697851f35558afd&hash=AC4849DCEE51E7ADA86BB3F99EE0E390\" style=\"display: block; height: 533px; width: 800px;\"></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Would you start by defining what a \"gang sheet\" is for those who may not be familiar with the term?</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">A gang sheet is a term taken from the early days of the transfer business when customers paid for prints by the sheet. A gang sheet is a single sheet of film where multiple designs, logos, or graphics are placed so that they can be printed together, rather than printed separately. Using gang sheets minimizes wasted film, reduces overall production time, and allows you to produce multiple items in a single pass.<br><br>For DTF printing, using gang sheets can be particularly advantageous, as each sheet can contain a variety of sizes and graphics, which is ideal for custom apparel orders that require multiple design placements (like front and back logos) or variations of a single design.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><img alt=\"Player\'s shirt with Vipers and 25 across the front.\" src=\"https://image.rolanddga.com/-/media/roland/images/blog/2024/gang-sheets-and-roi-for-dtf/vipers-t-2-_800x533_800x533_20241125_v01_dg.jpg?rev=db93b254436e4f8eaca5d032e7aa5a55&hash=1558830BC23C93F93E0A122976C23479\" style=\"display: block; height: auto; width: 800px;\"></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">How do you set up a gang sheet?</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">The width of the gang sheet is typically the maximum media width for the printer, and the length is up to the user to determine. When you have your dimensions, you fill the space with as many graphics as possible. For example, on one 16” x 18” gang sheet, I could place one 11” x 11” image, six 4” x 4” images, and three 3” x 3” images.</p><p><img alt=\"Baseball hat with stylized V graphics.\" src=\"https://image.rolanddga.com/-/media/roland/images/blog/2024/gang-sheets-and-roi-for-dtf/vipers-hat_800x533_800x533_20241125_v01_dg.jpg?rev=415a96217d724617b15ec5f79e52888f&hash=03D9538FC343213537B0944890F85648\" style=\"display: block; height: auto; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px; width: 800px;\"><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"> </span></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">How does using gang sheets affect printing time?</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">A 16” x 18” gang sheet takes about 10 minutes to print, no matter how many graphics it contains. By optimizing the print area to contain the maximum number of graphics, you speed up your overall production time. It’s just more bang for your buck.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><img alt=\"Towel with Vipers logo in the corner.\" src=\"https://image.rolanddga.com/-/media/roland/images/blog/2024/gang-sheets-and-roi-for-dtf/vipers-towel_800x533_800x533_20241125_v01_dg.jpg?rev=e66d9caee19f4c27b54b9894827efee6&hash=F2156C0B554235B76C15AC8813ADAA61\" style=\"display: block; height: auto; width: 800px;\"></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Are there other advantages to using gang sheets?</h2><p><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Gang sheets can also help in setting up production runs. Users can print all the graphics needed for one family or one order by putting them all on one gang sheet.</span><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">The way the industry is going, people are printing more apparel for a wider range of events and occasions. In addition to team apparel, there are also family reunion shirts, fun run shirts, and corporate apparel. Here are some cases where organizing graphics on gang sheets is especially helpful.</span><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><strong style=\"font-weight: bold; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Custom Apparel Orders: </strong><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">For businesses catering to small orders with multiple variations, gang sheets enable you to print various logos, names, and sizes on a single sheet, saving material and setup time.</span><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><strong style=\"font-weight: bold; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Bulk Branding:</strong><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"> Companies that order branded apparel in bulk will often need logos of various sizes. Gang sheets allow print shops to fulfill these orders efficiently without multiple setups.</span><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><strong style=\"font-weight: bold; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Special Events:</strong><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"> Event planners may request specific designs for various items, like hats, shirts, and bags. Gang sheets let you consolidate all the graphics for a particular event on one sheet for easy production.</span><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><img alt=\"Shirt with Vipers Baseball graphic on the front.\" src=\"https://image.rolanddga.com/-/media/roland/images/blog/2024/gang-sheets-and-roi-for-dtf/vipers-baseball-t_800x533_800x533_20241125_v01_dg.jpg?rev=aa5e17568d9446a9895f52748f937551&hash=9DCFC2D445E39DB07877321B662EFCB9\" style=\"display: block; height: auto; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px; width: 800px;\"><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">How much space should users leave between graphics on a gang sheet?</h2><p><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">The amount of space left between graphics is up to the user to determine. I personally prefer to leave .5 inches between each graphic to allow for easy contour cutting and removal of graphics. Some sources that will print gang sheets for you will specify .25-.5 inches between graphics.</span><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">What additional features should people bear in mind when considering their DTF options in the market?</h2><p><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">It’s very important that before buying a DTF machine, people have an accurate understanding of their production needs. Anyone who wants to produce 50-75 shirts a day on average, which can go up as high as 80 or even 100 shirts a day, should consider a desktop machine like the </span><a href=\"https://www.rolanddga.com/products/printers/versastudio-by-20\" style=\"color: rgb(0, 118, 190); font-family: proxima-nova, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Roland DG VersaSTUDIO BY-20</a><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">. These machines can easily keep up with the needs of a shop doing that type of volume.</span><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">If you are looking to wholesale or retail your printed transfers, you really should consider investing in a production machine. For wholesaling and retailing, you may need to print 300 feet of film a day – an output level which requires a production machine.</span><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">It’s important also to know that one person with a DTF printer will find it challenging to finish more than 100 shirts in an 8-hour day. Even with a production machine it’s a lot of work.</span><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><img alt=\"Gang sheet with multiple graphics with words, logos, and designs.\" src=\"https://image.rolanddga.com/-/media/roland/images/blog/2024/gang-sheets-and-roi-for-dtf/other-gang-sheet_800x533_20241125_v01_dg.jpg?rev=1923c2f96aff4286aecf3e406712bca2&hash=3E62537A84C0BD49776E2C7644DFB6EC\" style=\"display: block; height: auto; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px; width: 800px;\"><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">What kind of ROI can users earn with their DTF production using gang sheets?</h2><p><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Depending on the size of the gang sheet you use and your equipment, you can print very profitably using gang sheets. For example, by printing a 16” x 18” gang sheet on the BY-20, which prints in about 10 minutes, you can provide several custom apparel items for a sports team and sell these items for a considerable profit.</span><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">A player’s jersey is valued at about $25 for front and back graphics. Hats with a team logo are sold for about $12 each. Coaches’ dry-fit shirts with a left chest graphic go for about $25. Here is a link to a </span><a rel=\"noopener noreferrer\" href=\"https://www.rolanddga.com/products/printers/versastudio-by-20#grid-container-galleryprofit\" target=\"_blank\" style=\"color: rgb(0, 118, 190); font-family: proxima-nova, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">chart on the Roland DGA website listing the estimated costs and profit</a><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"> for some commonly personalized items.  </span><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"><br style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"></p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 32px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Where can users learn more about DTF production and the Roland DG BY-20?</h2><p><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">The</span><a rel=\"noopener noreferrer\" href=\"https://www.rolanddga.com/products/printers/versastudio-by-20\" target=\"_blank\" style=\"color: rgb(0, 118, 190); font-family: proxima-nova, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\"> Roland DGA website</a><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\"> is a good place to start. There we explain the capabilities of the Roland DG VersaSTUDIO BY-20 DTF printer, workflow guides, answer commonly asked questions, and provide access to knowledge base articles, Roland TV videos, and user forums. You can also connect with a Roland DG certified dealer on the </span><a rel=\"noopener noreferrer\" href=\"https://www.rolanddga.com/products/printers/versastudio-by-20\" target=\"_blank\" style=\"color: rgb(0, 118, 190); font-family: proxima-nova, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">website</a><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">, or by clicking </span><a href=\"https://www.rolanddga.com/dealers\" style=\"color: rgb(0, 118, 190); font-family: proxima-nova, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">here</a><span style=\"color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">.</span></p>', 'Gang Sheets and ROI | Roland', 'Using gang sheets is an easy way to increase your efficiency and productivity with DTF printing.', 'Gang Sheets and ROI | Roland', 'Using gang sheets is an easy way to increase your efficiency and productivity with DTF printing.', '', '', 'Published', '2025-03-13', '11:46:26', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `ID` int(11) NOT NULL,
  `CategoryName` varchar(256) NOT NULL DEFAULT '',
  `Url` varchar(256) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`ID`, `CategoryName`, `Url`, `IsActive`) VALUES
(1, 'Printer Cutter', 'printer-cutter', 1),
(2, 'Solvent Printer', 'solvent-printer', 1),
(3, 'Eco Solvent Printer', 'eco-solvent-printer', 1),
(4, 'Customization', 'custamization', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `ID` int(11) NOT NULL,
  `BranchName` varchar(256) NOT NULL,
  `Manager` varchar(256) NOT NULL DEFAULT '-1',
  `CreatedDate` varchar(50) NOT NULL,
  `CreatedTime` varchar(50) NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID` int(11) NOT NULL,
  `Client` varchar(256) NOT NULL DEFAULT '',
  `ClientUrl` varchar(256) NOT NULL DEFAULT '#',
  `OtherUrl` varchar(256) NOT NULL DEFAULT '#',
  `Feature` int(11) NOT NULL DEFAULT '0',
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID`, `Client`, `ClientUrl`, `OtherUrl`, `Feature`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(2, '64259-2Client-Attachment.svg', 'https://www.rolanddga.com/', 'https://downloadcenter.rolanddg.com/', 1, '2025-04-29', '17:04:28', 'admin@dayabhawnafoundation.com', 1),
(3, '58163-3Client-Attachment.svg', 'https://www.coloreel.com/', 'https://www.coloreel.com/', 2, '2025-04-29', '17:04:56', 'admin@dayabhawnafoundation.com', 1),
(4, '48968-4Client-Attachment.svg', 'https://colorjetgroup.com/', 'https://www.colorjetgroup.com/textile/downloads', 3, '2025-04-29', '17:06:57', 'admin@dayabhawnafoundation.com', 1),
(5, '31078-5Client-Attachment.svg', 'https://dgshape.com/', 'https://downloadcenter.rolanddg.com/', 4, '2025-04-29', '17:07:22', 'admin@dayabhawnafoundation.com', 1),
(6, '71515-6Client-Attachment.svg', 'https://www.procam-software.com/', 'https://www.procam-software.com/', 5, '2025-04-29', '17:08:06', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `custom_code`
--

CREATE TABLE `custom_code` (
  `ID` int(11) NOT NULL,
  `HeaderCode` text NOT NULL,
  `BodyCode` text NOT NULL,
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_code`
--

INSERT INTO `custom_code` (`ID`, `HeaderCode`, `BodyCode`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(1, '<!-- Google Tag Manager -->\r\n    <script>\r\n    (function(w, d, s, l, i) {\r\n        w[l] = w[l] || [];\r\n        w[l].push({\r\n            \'gtm.start\': new Date().getTime(),\r\n            event: \'gtm.js\'\r\n        });\r\n        var f = d.getElementsByTagName(s)[0],\r\n            j = d.createElement(s),\r\n            dl = l != \'dataLayer\' ? \'&l=\' + l : \'\';\r\n        j.async = true;\r\n        j.src =\r\n            \'https://www.googletagmanager.com/gtm.js?id=\' + i + dl;\r\n        f.parentNode.insertBefore(j, f);\r\n    })(window, document, \'script\', \'dataLayer\', \'GTM-5KTBVK2P\');\r\n    </script>\r\n    <!-- End Google Tag Manager -->', '<!-- Google Tag Manager -->\r\n    <script>\r\n    (function(w, d, s, l, i) {\r\n        w[l] = w[l] || [];\r\n        w[l].push({\r\n            \'gtm.start\': new Date().getTime(),\r\n            event: \'gtm.js\'\r\n        });\r\n        var f = d.getElementsByTagName(s)[0],\r\n            j = d.createElement(s),\r\n            dl = l != \'dataLayer\' ? \'&l=\' + l : \'\';\r\n        j.async = true;\r\n        j.src =\r\n            \'https://www.googletagmanager.com/gtm.js?id=\' + i + dl;\r\n        f.parentNode.insertBefore(j, f);\r\n    })(window, document, \'script\', \'dataLayer\', \'GTM-5KTBVK2P\');\r\n    </script>\r\n    <!-- End Google Tag Manager -->', '2024-12-13', '11:50:35', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL DEFAULT '',
  `Email` varchar(255) NOT NULL DEFAULT '',
  `Phone` varchar(20) NOT NULL DEFAULT '',
  `DonationType` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Amount` varchar(256) NOT NULL DEFAULT '',
  `Message` varchar(500) NOT NULL DEFAULT '',
  `Payment_ID` varchar(256) NOT NULL DEFAULT '',
  `Order_ID` varchar(256) NOT NULL DEFAULT '',
  `Status` varchar(50) NOT NULL DEFAULT '',
  `Payment_Date` varchar(50) NOT NULL DEFAULT '',
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`ID`, `Name`, `Email`, `Phone`, `DonationType`, `Amount`, `Message`, `Payment_ID`, `Order_ID`, `Status`, `Payment_Date`, `CreatedDate`, `CreatedTime`, `IsActive`) VALUES
(5, 'Manish Sharma', 'its4sharmaji@gmail.com', '08433098391', '', '1000', '', 'pay_QoIbOJ1JFkAyFo', 'order_QoIb8oBfvI6Fum', 'captured', '2025-07-02 18:33:05', '2025-07-02', '18:32:32', 1),
(6, 'Manish Sharma', 'its4sharmaji@gmail.com', '08433098391', '', '1000', '', 'pay_QqH8KoHcvV6QxB', 'order_QqH8COSMvDkXYK', 'captured', '2025-07-07 18:24:55', '2025-07-07', '18:24:27', 1),
(7, 'saurabh', 'saurabhj504@gmail.com', '8933965468', '', '10', '', '', '', 'pending', '', '2025-07-10', '16:06:49', 1),
(8, 'saurabh', 'saurabhj504@gmail.com', '8933965468', '', '10', '', '', '', 'pending', '', '2025-07-10', '16:06:50', 1),
(9, 'saurabh', 'saurabhj504@gmail.com', '8933965468', '', '10', '', 'pay_QrQOjh6IQEjpa4', 'order_QrQOCviDoNibEq', 'captured', '2025-07-10 16:07:55', '2025-07-10', '16:06:52', 1),
(10, 'Om', 'omavichal@gmail.com', '6391588588', '', '500', '', 'pay_Qrg3BCMRETOVpz', 'order_Qrg1lZZ8O5OcWh', 'captured', '2025-07-11 07:26:23', '2025-07-11', '07:24:42', 1),
(11, 'Manish Sharma', 'its4sharmaji@gmail.com', '8433098391', '???? ????', '11', 'Suite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301\r\nSuite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301', '', '', 'pending', '', '2025-07-16', '19:09:09', 1),
(12, 'Manish Sharma', 'its4sharmaji@gmail.com', '8433098391', '???? ????', '11', 'Suite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301\r\nSuite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301', '', '', 'pending', '', '2025-07-16', '19:22:01', 1),
(13, 'Manish Sharma', 'its4sharmaji@gmail.com', '8433098391', '???? ????', '11', 'Suite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301\r\nSuite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301', '', '', 'pending', '', '2025-07-16', '19:24:53', 1),
(14, 'Manish Sharma', 'its4sharmaji@gmail.com', '8433098391', 'मानव सेवा', '11', 'Suite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301\r\nSuite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301', '', '', 'pending', '', '2025-07-16', '19:27:20', 1),
(15, 'Manish Sharma', 'its4sharmaji@gmail.com', '8433098391', 'मानव सेवा', '1', 'Suite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301\r\nSuite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301', 'pay_Qtr2u5kUwWw0Tp', 'order_Qtr2InM6k6Slym', 'captured', '2025-07-16 19:59:22', '2025-07-16', '19:28:51', 1),
(16, 'abhishek', 'jain.abhishek347@gmail.com', '9993158005', 'औषधि दान', '1', 'test', '', '', 'pending', '', '2025-07-17', '07:57:44', 1),
(17, 'abhishek', 'jainabhishek347@gmail.com', '9993158005', 'औषधि दान', '1', 'test', 'pay_Qu3rNIIKDC617l', 'order_Qu3qwsfpThSfIx', 'captured', '2025-07-17 08:01:51', '2025-07-17', '08:01:07', 1),
(18, 'Manish Sharma', 'its4sharmaji@gmail.com', '8433098391', 'गौ अस्पताल', '111', 'Suite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301\r\nSuite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301', '', '', 'pending', '', '2025-07-20', '08:06:19', 1),
(19, '???????? ?????? ', 'Siddhantgupta11738@gmail.com', '9369618654', 'खिचड़ी वितरण', '1500', 'Jhansi ', '', '', 'pending', '', '2025-07-21', '12:17:48', 1),
(20, 'Adarsh jain', 'jparas23826@gmail.com', '7415173641', 'गौ अस्पताल', '10', 'Gaisabad damoh mp', '', '', 'pending', '', '2025-08-06', '04:56:25', 1),
(21, 'Adarsh jain', 'jparas23826@gmail.com', '7415173641', 'गौ अस्पताल', '10', 'Gaisabad damoh mp', '', '', 'pending', '', '2025-08-06', '04:56:26', 1),
(22, 'Adarsh jain', 'jparas23826@gmail.com', '7415173641', 'गौ अस्पताल', '10', 'Gaisabad damoh mp', '', '', 'pending', '', '2025-08-06', '04:56:28', 1),
(23, 'Arham jain', '82.choral.nemesis@icloud.com', '9725901902', 'गौ अस्पताल', '1000', '', '', '', 'pending', '', '2025-08-10', '02:50:48', 1),
(24, 'Mahaveer Jain', 'mahaveerjain_85@yahoo.co.in', '9725901902', 'गौ अस्पताल', '5000', 'A-53, Sundivine 1, Gota, Ahmedabad', 'pay_R3TWrLBchQqZ26', 'order_R3TUdh7f3bMcCm', 'captured', '2025-08-10 03:00:06', '2025-08-10', '02:57:03', 1),
(25, 'Ahana Jain', 'mahaveerjain_85@yahoo.co.in', '9725901902', 'औषधि दान', '5000', 'A-53, Sundivine-1, Gota, Ahemdabad', 'pay_R3TaeQU9WfWoCq', 'order_R3TaLAphxQ9pyn', 'captured', '2025-08-10 03:03:30', '2025-08-10', '03:02:27', 1),
(26, 'Mahaveer Jain', 'mahaveerjain_85@yahoo.co.in', '9725901902', 'खिचड़ी वितरण', '1500', 'A-53, Sundivine-1, GOta, Ahemdabad', 'pay_R3TfEIC0LM6hjM', 'order_R3Tf3Vl2PMUXvF', 'captured', '2025-08-10 03:08:00', '2025-08-10', '03:06:54', 1),
(27, 'Manish Sharma', 'its4sharmaji@gmail.com', '8433098391', 'गौ अस्पताल', '1', 'Delhi', 'pay_R855L0Zvrk6k21', 'order_R85580WDBnHtzr', 'captured', '2025-08-21 18:37:06', '2025-08-21', '18:19:15', 1),
(28, 'Manish Sharma', 'its4sharmaji@gmail.com', '8433098391', 'औषधि कक्ष ₹1 लाख', '10', 'Suite B 04, C, 104, C Block, Sector 65, Noida, Uttar Pradesh 201301', '', '', 'pending', '', '2025-09-01', '13:43:40', 1),
(29, 'Arun Appaso Patil', 'arunpatil19@gmail.com', '8390905451', 'औषधि दान', '51000', 'F1004 , Zen Estate, Kharadi , Pune, Maharashtra, INDIA-411014', '', '', 'pending', '', '2025-10-02', '05:45:21', 1),
(30, 'Arun Appaso Patil', 'arunpatil19@gmail.com', '8390905451', 'औषधि दान', '51000', 'F1004, Zen Estate, Kharadi, Pune, Maharashtra, INDIA-411014', 'pay_ROV15E6ojosRCn', 'order_ROV0dM6hDWeSp7', 'captured', '2025-10-02 06:05:49', '2025-10-02', '06:05:04', 1),
(31, 'Arun Appaso Patil', 'arunpatil19@gmail.com', '8390905451', 'औषधि दान', '51000', 'F1004, Zen Estate, Kharadi, Pune, Maharashtra, INDIA-411014', '', '', 'pending', '', '2025-10-02', '06:15:45', 1),
(32, 'pushpendra', 'vmdroneshooter001@gmail.com', '9005419336', 'खिचड़ी वितरण', '1500', 'jhansi', '', '', 'pending', '', '2025-10-04', '03:20:10', 1),
(33, 'Om', 'omavichal@gmail.com', '9521554008', 'मानव सेवा', '1500', 'Hu', '', '', 'pending', '', '2025-10-04', '03:21:03', 1),
(34, 'jgu', 'vmdroneshooter001@gmail.com', '7309588588', 'खिचड़ी वितरण', '1500', 'near gandhi college kushmoda raja colony', '', '', 'pending', '', '2025-10-04', '03:21:05', 1),
(35, 'jgu', 'vmdroneshooter001@gmail.com', '7309588588', 'खिचड़ी वितरण', '1500', 'near gandhi college kushmoda raja colony', '', '', 'pending', '', '2025-10-04', '03:21:50', 1),
(36, 'jgu', 'vmdroneshooter001@gmail.com', '7309588588', 'खिचड़ी वितरण', '1500', 'near gandhi college kushmoda raja colony', '', '', 'pending', '', '2025-10-04', '03:22:08', 1),
(37, 'Test', 'test@mail.com', '8863756336', 'औषधि दान', '10', 'test', '', '', 'pending', '', '2025-10-11', '15:28:33', 1),
(38, 'Test', 'test@mail.com', '8863756336', 'औषधि दान', '10', 'test', '', '', 'pending', '', '2025-10-11', '15:28:35', 1),
(39, 'Krishant Yadav', 'atrcpit2pk@gmail.com', '7887476762', 'औषधि दान', '250', 'At Anwarde bk.\r\nChopda', '', '', 'pending', '', '2025-10-12', '08:00:31', 1),
(40, 'Krishant Yadav', 'atrcpit2pk@gmail.com', '7887476762', 'औषधि दान', '250', 'At Anwarde bk.\r\nChopda', '', '', 'pending', '', '2025-10-12', '08:00:33', 1),
(41, 'Krishant Yadav', 'atrcpit2pk@gmail.com', '7887476762', 'औषधि दान', '250', 'At Anwarde bk.\r\nChopda', '', '', 'pending', '', '2025-10-12', '08:01:21', 1),
(42, 'Archi', 'aarchij722@gmail.com', '8318415797', 'गौ अस्पताल', '1', '', '', '', 'pending', '', '2025-10-13', '17:44:49', 1),
(43, 'Shreya jain ', 'shreyajain255315@gmail.com', '8839019269', 'गौ अस्पताल', '25', 'Universal homes chikitsak nagar ', 'pay_RT36Fl8c4vh1LT', 'order_RT36D72RNTPZVs', 'captured', '2025-10-13 18:02:22', '2025-10-13', '18:01:56', 1),
(44, 'Parul jain', 'jain.dr.parul@gmail.com', '9926459259', 'औषधि किट ₹250', '250', 'Padmakar nagar\r\nLIG- 11', 'pay_RUAF4IduYKw6a6', 'order_RUAEvwB1M4cTBs', 'captured', '2025-10-16 13:40:48', '2025-10-16', '13:40:02', 1),
(45, 'Parul Jain', 'jain.dr.parul@gmail.com', '9926459259', 'औषधि किट ₹1000', '1000', 'Padmakar nagar\r\nLIG- 11', '', '', 'pending', '', '2025-10-16', '13:43:37', 1),
(46, 'Archi ', 'aarchij722@gmail.com', '8318415797', 'औषधि दान', '20', '', '', '', 'pending', '', '2025-10-18', '16:09:07', 1),
(47, 'Archi', 'aarchij722@gmail.com', '8318415797', 'खिचड़ी वितरण', '20', '', '', '', 'pending', '', '2025-10-18', '16:10:17', 1),
(48, 'Testing ', 'testing@gmail.com', '8888888888', 'तुला दान 75 kg', '3000', '', '', '', 'pending', '', '2025-10-27', '02:35:45', 1),
(49, 'pushpendra', 'ihack093@gmail.com', '9005419336', 'भूसा /पौष्टिक आहार ₹500', '500', 'gou seva ', '', '', 'pending', '', '2025-10-28', '06:00:46', 1),
(50, 'Om', 'omavichal@gmail.com', '9977004152', 'औषधि दान', '100', 'Jhansi ', '', '', 'pending', '', '2025-10-29', '10:22:00', 1),
(51, '????????', 'Siddhantgupta11738@gmail.com', '9277440474', 'औषधि कक्ष ₹1 लाख', '5000', 'Nandu colony', '', '', 'pending', '', '2025-10-29', '12:16:33', 1),
(52, 'testing', '', '8528525656', 'भूसा /पौष्टिक आहार ₹500', '500', '', '', '', 'pending', '', '2025-10-30', '16:37:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `ID` int(11) NOT NULL,
  `Title` varchar(256) NOT NULL DEFAULT '',
  `Link` text NOT NULL,
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(100) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`ID`, `Title`, `Link`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(2, 'test', 'aaaaaaaaaa', '2025-01-07', '14:22:08', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `EventName` varchar(250) NOT NULL DEFAULT '',
  `Url` varchar(100) NOT NULL DEFAULT '',
  `EventImg` varchar(250) NOT NULL DEFAULT '',
  `EventStartDate` varchar(50) NOT NULL,
  `EventEndDate` varchar(50) NOT NULL,
  `EventBooth` varchar(256) NOT NULL DEFAULT '',
  `EventDescription` text NOT NULL,
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `EventName`, `Url`, `EventImg`, `EventStartDate`, `EventEndDate`, `EventBooth`, `EventDescription`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(7, 'Sign India Delhi 2023', 'sign-india-delhi-2023', '2025-03-13-7EventImg-Attachment.jpg', '2025-03-16', '2025-03-22', 'Hall No. 14A, Booth No. A12', 'OKI\'s Pro1040 Label Printer helps businesses to capture more attention through\r\n                            creative labels. This four colour narrow format label printer is easy to set up and\r\n                            requires minimal training to use. Built to meet the needs of customers who desire\r\n                            a wider choice of label designs, yet print a lower print-volume to reduce stock and\r\n                            wastage, the OKI Pro1040 prints in CMYK, enabling creativity and flexibility in label\r\n                            designs across a range of materials.', '2025-03-13', '13:49:13', 'admin@dayabhawnafoundation.com', 1),
(8, 'Media Expo, Delhi 2023', 'media-expo-delhi-2023', '2025-03-13-8EventImg-Attachment.jpg', '2025-03-23', '2025-03-25', 'Hall No. 14A, Booth No. A120', 'Media Expo, Delhi 2023', '2025-03-13', '13:50:38', 'admin@dayabhawnafoundation.com', 1),
(9, 'Gift World Expo', 'gift-world-expo', '2025-03-13-9EventImg-Attachment.jpg', '2025-03-20', '2025-03-22', 'Hall No. 14A, Booth No. A12', 'OKI\'s Pro1040 Label Printer helps businesses to capture more attention through\r\n                            creative labels. This four colour narrow format label printer is easy to set up and\r\n                            requires minimal training to use. Built to meet the needs of customers who desire\r\n                            a wider choice of label designs, yet print a lower print-volume to reduce stock and\r\n                            wastage, the OKI Pro1040 prints in CMYK, enabling creativity and flexibility in label\r\n                            designs across a range of materials.', '2025-03-13', '13:52:04', 'admin@dayabhawnafoundation.com', 1),
(10, 'Sign India Delhi 2023', 'sign-india-delhi-2023', '2025-03-13-7EventImg-Attachment.jpg', '2025-03-16', '2025-03-22', 'Hall No. 14A, Booth No. A12', 'OKI\'s Pro1040 Label Printer helps businesses to capture more attention through\r\n                            creative labels. This four colour narrow format label printer is easy to set up and\r\n                            requires minimal training to use. Built to meet the needs of customers who desire\r\n                            a wider choice of label designs, yet print a lower print-volume to reduce stock and\r\n                            wastage, the OKI Pro1040 prints in CMYK, enabling creativity and flexibility in label\r\n                            designs across a range of materials.', '2025-03-13', '13:49:13', 'admin@dayabhawnafoundation.com', 1),
(11, 'Gift World Expo', 'gift-world-expo', '2025-03-13-9EventImg-Attachment.jpg', '2025-03-16', '2025-03-22', 'Hall No. 11, J-117', 'OKI\'s Pro1040 Label Printer helps businesses to capture more attention through\r\n                            creative labels. This four colour narrow format label printer is easy to set up and\r\n                            requires minimal training to use. Built to meet the needs of customers who desire\r\n                            a wider choice of label designs, yet print a lower print-volume to reduce stock and\r\n                            wastage, the OKI Pro1040 prints in CMYK, enabling creativity and flexibility in label\r\n                            designs across a range of materials.', '2025-03-13', '13:52:04', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `ID` int(11) NOT NULL,
  `Url` varchar(256) NOT NULL DEFAULT '',
  `Title` varchar(256) NOT NULL DEFAULT '',
  `FeatureImage` varchar(256) NOT NULL DEFAULT '',
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ID`, `Url`, `Title`, `FeatureImage`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(1, 'gift-world-expo-2019', 'Gift World Expo 2019', '86832-1FeatureImage-Attachment.jpg', '2025-03-24', '11:57:14', 'admin@dayabhawnafoundation.com', 1),
(2, 'sign-india-chennai-2019', 'Sign India Chennai 2019', '45266-2FeatureImage-Attachment.jpg', '2025-03-24', '11:56:59', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_image`
--

CREATE TABLE `gallery_image` (
  `ID` int(11) NOT NULL,
  `Title` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `GalleryID` int(11) NOT NULL DEFAULT '-1',
  `GalleryImage` varchar(256) NOT NULL DEFAULT '',
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery_image`
--

INSERT INTO `gallery_image` (`ID`, `Title`, `GalleryID`, `GalleryImage`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(1, 'Image -1', -1, '9341_gallery_image_1.webp', '2025-10-05', '23:20:01', '1', 1),
(2, 'imgage-3', -1, '33370_gallery_image_2.webp', '2025-10-05', '23:20:39', '1', 1),
(3, 'Image-3', -1, '22853_gallery_image_3.webp', '2025-10-05', '23:21:51', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_video`
--

CREATE TABLE `gallery_video` (
  `ID` int(11) NOT NULL,
  `Title` varchar(256) NOT NULL DEFAULT '',
  `VideoCode` text NOT NULL,
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_video`
--

INSERT INTO `gallery_video` (`ID`, `Title`, `VideoCode`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(4, 'Video-1', 'cPHqxQLY9cE?si=yMDMlqGdpWz3aHfM', '2025-10-05', '23:27:34', '1', 1),
(5, '2', 'embed/ZpOlCz7UKX0?si=VznQJd_4OzyMaVVb', '2025-10-05', '23:28:01', '1', 1),
(6, '3', 'VO22gFA7Zdg?si=RfNBmek-ck9hBPAb', '2025-10-05', '23:28:25', '1', 1),
(7, '4', 'HSDKscNvEYE?si=nlhZoGJPJ7KIi6qC', '2025-10-05', '23:29:13', '1', 1),
(8, '5', 'lsLnjpFIx1I?si=fDqWV3Y5znmBBDRu', '2025-10-05', '23:30:45', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `join_us`
--

CREATE TABLE `join_us` (
  `ID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL DEFAULT '',
  `Email` varchar(100) NOT NULL DEFAULT '',
  `PhoneNumber` varchar(256) NOT NULL DEFAULT '',
  `Message` varchar(500) NOT NULL DEFAULT '',
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `join_us`
--

INSERT INTO `join_us` (`ID`, `Name`, `Email`, `PhoneNumber`, `Message`, `CreatedDate`, `CreatedTime`, `IsActive`) VALUES
(1, 'Manish Sharma', 'its4sharmaji@gmail.com', '08433098391', 'qqq', '2025-07-01', '23:32:02', 1),
(2, 'abhishek jain', 'jain.abhishek347@gmail.com', '9993158005', 'test', '2025-07-17', '13:35:29', 1),
(3, 'Abhay partap singh', 'jksofficelucknow@gmail.com', '8172810614', 'Humko app ke sath join hona hh or gau mata ko bachna hh', '2025-09-07', '10:47:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_pr`
--

CREATE TABLE `news_pr` (
  `ID` int(11) NOT NULL,
  `Heading` varchar(250) NOT NULL DEFAULT '',
  `Url` varchar(100) NOT NULL DEFAULT '',
  `NewsBanner` varchar(500) NOT NULL,
  `NewsDate` varchar(50) NOT NULL,
  `NewsDescription` text NOT NULL,
  `NewsContent` text NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending',
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_pr`
--

INSERT INTO `news_pr` (`ID`, `Heading`, `Url`, `NewsBanner`, `NewsDate`, `NewsDescription`, `NewsContent`, `Status`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(1, 'Apsom Infotex to Showcase Latest Innovations at Print Pack 2025', 'apsom-infotex-to-showcase-latest-innovations-at-print-pack-2025', '81497-1NewsBanner-Attachment.jpg', '2025-03-29', 'Apsom Infotex, a leading name in the printing solutions industry, is proud to announce its participation in Print Pack 2025, taking place from February 1-5, 2025, at India Expo Centre & Mart, Greater Noida.', '<div class=\"row\" style=\"margin-top: 0px; margin-right: -15px; margin-left: -15px; transition: 0.5s; color: rgb(51, 51, 51); font-family: Rubik, sans-serif;\"><div class=\"col-md-12 text-center\" style=\"margin-top: 0px; padding-right: 15px; padding-left: 15px; transition: 0.5s; float: left; width: 877.5px;\"><p class=\"lead\" style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; font-size: 14px; line-height: 1.7; color: rgb(0, 0, 0); text-align: justify;\">Explore Roland’s cutting-edge digital printing solutions at Booth I 30, Hall 14</p><p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7;\"><span style=\"transition: 0.5s; font-weight: 700;\">Noida, January 22, 2025:</span> Apsom Infotex, a leading name in the printing solutions industry, is proud to announce its participation in Print Pack 2025, taking place from February 1-5, 2025, at India Expo Centre & Mart, Greater Noida.</p></div></div><div class=\"row\" style=\"margin-top: 0px; margin-right: -15px; margin-left: -15px; transition: 0.5s; color: rgb(51, 51, 51); font-family: Rubik, sans-serif;\"><div class=\"col-md-12\" style=\"margin-top: 0px; padding-right: 15px; padding-left: 15px; transition: 0.5s; float: left; width: 877.5px;\"><h2 style=\"margin-top: 20px; margin-bottom: 10px; transition: 0.5s; font-size: 30px;\">Key Products on Display</h2><div class=\"panel panel-default\" style=\"margin-bottom: 20px; transition: 0.5s; border: 1px solid rgb(221, 221, 221); border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 1px;\"><div class=\"panel-heading\" style=\"padding: 10px 15px; transition: 0.5s; border-bottom: 1px solid rgb(221, 221, 221); border-top-left-radius: 3px; border-top-right-radius: 3px; background-color: rgb(245, 245, 245); border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-left-color: rgb(221, 221, 221);\"><span style=\"transition: 0.5s; font-weight: 700;\">VersaSTUDIO BN-20A & TrueVIS VG3 Large Format Inkjet Printer Cutter</span></div><div class=\"panel-body\" style=\"transition: 0.5s;\"><p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7;\">Designed for small and medium businesses, packaging professionals, label manufacturers, and branding agencies, these printers combine high-precision print-and-cut technology with flexibility. They handle various sizes, shapes, and materials effortlessly, delivering exceptional results with unparalleled accuracy.</p></div></div><div class=\"panel panel-default\" style=\"margin-bottom: 20px; transition: 0.5s; border: 1px solid rgb(221, 221, 221); border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 1px;\"><div class=\"panel-heading\" style=\"padding: 10px 15px; transition: 0.5s; border-bottom: 1px solid rgb(221, 221, 221); border-top-left-radius: 3px; border-top-right-radius: 3px; background-color: rgb(245, 245, 245); border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-left-color: rgb(221, 221, 221);\"><span style=\"transition: 0.5s; font-weight: 700;\">Roland Benchtop UV Flatbed Printer MO 240 & Desktop UV Flatbed Printer BD 8</span></div><div class=\"panel-body\" style=\"transition: 0.5s;\"><p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7;\">These versatile printers produce high-quality prints on diverse items like phone covers, cosmetic cases, fashion accessories, sports memorabilia, and electronic items. They support direct printing and UV DTF transfers, enabling effortless customization.</p></div></div><div class=\"panel panel-default\" style=\"margin-bottom: 20px; transition: 0.5s; border: 1px solid rgb(221, 221, 221); border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 1px;\"><div class=\"panel-heading\" style=\"padding: 10px 15px; transition: 0.5s; border-bottom: 1px solid rgb(221, 221, 221); border-top-left-radius: 3px; border-top-right-radius: 3px; background-color: rgb(245, 245, 245); border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-left-color: rgb(221, 221, 221);\"><span style=\"transition: 0.5s; font-weight: 700;\">AP 640 Latex Printer</span></div><div class=\"panel-body\" style=\"transition: 0.5s;\"><p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7;\">Renowned for its revolutionary Latex printing technology, the AP 640 delivers superior print quality and durability. Ideal for signage, wallpapers, backlit displays, and retail branding, it’s perfect for eco-conscious businesses aiming to minimize their environmental footprint.</p></div></div><div class=\"panel panel-default\" style=\"margin-bottom: 20px; transition: 0.5s; border: 1px solid rgb(221, 221, 221); border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 1px;\"><div class=\"panel-heading\" style=\"padding: 10px 15px; transition: 0.5s; border-bottom: 1px solid rgb(221, 221, 221); border-top-left-radius: 3px; border-top-right-radius: 3px; background-color: rgb(245, 245, 245); border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-left-color: rgb(221, 221, 221);\"><span style=\"transition: 0.5s; font-weight: 700;\">ER 641 Eco-Solvent Printer</span></div><div class=\"panel-body\" style=\"transition: 0.5s;\"><p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7;\">Part of Roland’s DGXPRESS range, this roll-to-roll printer excels in productivity, high print quality, and cost-effectiveness, making it a standout choice for institutional printing needs.</p></div></div></div></div><div class=\"row\" style=\"margin-top: 0px; margin-right: -15px; margin-left: -15px; transition: 0.5s; color: rgb(51, 51, 51); font-family: Rubik, sans-serif;\"><div class=\"col-md-12\" style=\"margin-top: 0px; padding-right: 15px; padding-left: 15px; transition: 0.5s; float: left; width: 877.5px;\"><h2 style=\"margin-top: 20px; margin-bottom: 10px; transition: 0.5s; font-size: 30px;\">Commitment to Innovation</h2><p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7;\">Apsom Infotex’s presence at Print Pack 2025 underscores its commitment to providing state-of-the-art printing technologies. These innovations are designed to meet the evolving needs of various industries and help businesses stay competitive.</p><h2 style=\"margin-top: 20px; margin-bottom: 10px; transition: 0.5s; font-size: 30px;\">Join Us at Print Pack 2025</h2><p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7;\">Visit Apsom Infotex from February 1-5, 2025, at Booth I 30, Hall 14, India Expo Centre & Mart, Greater Noida, to explore these cutting-edge solutions and meet our expert team.</p></div></div>', 'Published', '2025-03-19', '12:09:59', 'admin@dayabhawnafoundation.com', 1),
(2, 'Apsom Infotex and RollsRoller AB announce Sales and Distribution Partnership', 'apsom-infotex-and-rollsroller-ab-announce-sales-and-distribution-partnership', '53840-2NewsBanner-Attachment.png', '2025-04-15', 'Noida, Uttar Pradesh, India - Apsom Infotex Limited is a master distributor to leading global brands in the Large Format Digital Inkjet Printer market. RollsRoller AB is the leading', '<p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7; font-family: Rubik, sans-serif;\">Noida, Uttar Pradesh, India - Apsom Infotex Limited is a master distributor to leading global brands in the Large Format Digital Inkjet Printer market. RollsRoller AB is the leading manufacturer and supplier of products and services for flatbed laminators. The company’s proprietary and patented RollsRoller Flatbed applicator is recognized internationally. This state-of-the-art Flatbed applicator from the Swedish-based RollsRoller AB will be distributed in India through an extensive network of Apsom Infotex Limited.</p><p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7; font-family: Rubik, sans-serif;\">RollsRoller Flatbed applicator poses a technological shift in the sign and printing industry. The company has grown rapidly and established sales in more than 70 countries through an efficient distribution system.</p><p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7; font-family: Rubik, sans-serif;\">Some of the largest and most successful companies in the world like Roland DG, Procam, Rowmark, ColorJet, and many others have mandated Apsom to promote, distribute, and support their products. The pan India distribution infrastructure, with offices across major cities in India, makes Apsom Infotex, the perfect distribution partner for the RollsRoller Flatbed applicator.</p><p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7; font-family: Rubik, sans-serif;\">RollsRoller provides technological innovation to the customers of the Flatbed applicator. The company offers a range of Flatbed applicators ranging from the entry-level to the premium segment, as per the demand of the market. These Flatbed applicators are user-friendly and within few hours, an amateur can produce finished signs of all sizes with perfect results without any assistance. These Flatbed applicators offer a high and quick Return on Investment (ROI) as you start earning from the very first day itself.</p><p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7; font-family: Rubik, sans-serif;\">The RollsRoller Flatbed applicator saves time thus helping the customer reorganize their production process. This leads to being lucrative for the customers because RollsRoller increases the production capacity. As compared to the traditional application by hand or a roll-to-roll laminator, where results are often unreliable and there is wastage, the RollsRoller Flatbed applicator yields high-quality results every time. No creases or bubbles lead to reduced wastage and consistent high quality.</p><p style=\"margin-top: 10px; margin-bottom: 2px; transition: 0.5s; color: rgb(0, 0, 0); text-align: justify; line-height: 1.7; font-family: Rubik, sans-serif;\">Apsom Infotex says, “RollsRoller is certainly the path to increased profitability, a tool that will save you time and make you money.\" Apsom Infotex, adding another feather to its cap, is now the official distributor of RollsRoller Flatbed laminators in India. This will not only ensure a wider reach for RollsRoller AB in India but it will garner trust from all the stakeholders because of the 25 years of legacy that has been built by Apsom Infotex Limited.</p><hr style=\"margin-top: 20px; margin-bottom: 20px; transition: 0.5s; border-top: 1px solid rgb(238, 238, 238); background-color: rgb(204, 204, 204); color: rgb(51, 51, 51); font-family: Rubik, sans-serif;\"><h3 style=\"margin-top: 20px; margin-bottom: 10px; transition: 0.5s; color: rgb(51, 51, 51); font-size: 24px; font-family: Rubik, sans-serif;\">RollsRoller Application</h3><div class=\"row\" style=\"margin-top: 0px; margin-right: -15px; margin-left: -15px; transition: 0.5s; color: rgb(51, 51, 51); font-family: Rubik, sans-serif;\"><div class=\"col-md-6\" style=\"margin-top: 0px; padding-right: 15px; padding-left: 15px; transition: 0.5s; float: left; width: 438.75px;\"><img src=\"https://www.apsom.com/upload/blog/rolls-roller-application.PNG\" class=\"img-responsive\" style=\"margin-bottom: -4px; transition: 0.5s; border: 0px; height: auto; display: block;\"></div></div>', 'Published', '2025-04-07', '12:06:53', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `SevayeID` int(11) NOT NULL DEFAULT '-1',
  `SevayeSubcategoryID` int(11) NOT NULL DEFAULT '-1',
  `Name` varchar(255) NOT NULL DEFAULT '',
  `Images` varchar(255) NOT NULL DEFAULT '',
  `Ammount` varchar(100) NOT NULL DEFAULT '',
  `Priority` int(11) NOT NULL DEFAULT '50',
  `CreatedDate` varchar(100) NOT NULL DEFAULT '',
  `CreatedTime` varchar(100) NOT NULL DEFAULT '',
  `CreatedBy` varchar(100) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `SevayeID`, `SevayeSubcategoryID`, `Name`, `Images`, `Ammount`, `Priority`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(1, 1, 1, 'एम्बुलेन्स ₹14.50 लाख', '93581-Product.webp', '1450000', 0, '2025-08-01', '23:26:46', 'admin@dayabhawnafoundation.com', 1),
(2, 1, -1, 'औषधि कक्ष ₹1 लाख', '7298-Product.webp', '100000', 6, '2025-08-01', '23:38:32', 'admin@dayabhawnafoundation.com', 1),
(3, 3, -1, 'औषधि कक्ष ₹1 लाखdsdsd', '30954-Product.webp', '44151544', 50, '2025-08-01', '23:42:57', 'admin@dayabhawnafoundation.com', 0),
(4, 5, -1, '1 दिन', '35263-Product.webp', '1500', 50, '2025-08-02', '22:26:38', 'admin@dayabhawnafoundation.com', 1),
(5, 5, -1, '7 दिन', '11688-Product.webp', '7000', 50, '2025-08-02', '22:27:25', 'admin@dayabhawnafoundation.com', 1),
(6, 5, -1, '15 दिन', '88161-Product.webp', '15000', 50, '2025-08-02', '22:27:48', 'admin@dayabhawnafoundation.com', 1),
(7, 5, -1, '30 दिन', '87896-Product.webp', '30000', 50, '2025-08-02', '22:28:21', 'admin@dayabhawnafoundation.com', 1),
(8, 1, -1, 'प्रवेश द्वार ₹3 लाख', '90061-Product.webp', '300000', 1, '2025-08-15', '19:55:17', 'admin@dayabhawnafoundation.com', 1),
(9, 1, -1, 'मुख्य अस्पताल भवन ₹11 लाख', '20956-Product.webp', '1100000', 2, '2025-08-15', '19:56:12', 'admin@dayabhawnafoundation.com', 1),
(10, 1, -1, 'ऑपरेशन कक्ष ₹2.50 लाख', '77233-Product.webp', '250000', 4, '2025-08-15', '19:59:27', 'admin@dayabhawnafoundation.com', 1),
(11, 1, -1, 'भूसा घर ₹8 लाख', '13358-Product.webp', '800000', 24, '2025-08-15', '20:00:58', 'admin@dayabhawnafoundation.com', 1),
(12, 1, -1, 'गौ विश्राम गृह ₹8 लाख', '41014-Product.webp', '800000', 5, '2025-08-15', '20:05:55', 'admin@dayabhawnafoundation.com', 1),
(13, 1, -1, 'स्टाफ रुम (3) ₹6 लाख', '50397-Product.webp', '600000', 19, '2025-08-15', '20:07:18', 'admin@dayabhawnafoundation.com', 1),
(14, 1, -1, 'बाइक ₹1 लाख', '99168-Product.webp', '100000', 9, '2025-08-15', '20:09:32', 'admin@dayabhawnafoundation.com', 1),
(15, 1, -1, 'तार फेंसिंग ₹5 लाख', '66173-Product.webp', '500000', 18, '2025-08-15', '20:10:36', 'admin@dayabhawnafoundation.com', 1),
(16, 1, -1, 'जल संग्रहण ₹1.5 लाख', '21335-Product.webp', '150000', 10, '2025-08-15', '20:11:09', 'admin@dayabhawnafoundation.com', 1),
(17, 1, -1, 'हरा चारा कुट्टी मशीन ₹50 हजार प्रति', '21836-Product.webp', '50000', 12, '2025-08-15', '20:11:45', 'admin@dayabhawnafoundation.com', 1),
(18, 1, -1, 'कूलर (3) ₹50 हजार प्रति', '95970-Product.webp', '50000', 13, '2025-08-15', '20:14:03', 'admin@dayabhawnafoundation.com', 1),
(19, 1, -1, 'लाइट ₹2.50 लाख', '19214-Product.webp', '250000', 14, '2025-08-15', '20:14:44', 'admin@dayabhawnafoundation.com', 1),
(20, 1, -1, 'कैमरा ₹1 लाख', '69561-Product.webp', '100000', 15, '2025-08-15', '20:15:28', 'admin@dayabhawnafoundation.com', 1),
(21, 1, -1, 'जल व्यवस्था ₹1.50 लाख', '13300-Product.webp', '150000', 15, '2025-08-15', '20:16:18', 'admin@dayabhawnafoundation.com', 1),
(22, 1, -1, 'साइन बोर्ड ₹1.50 लाख', '73833-Product.webp', '150000', 25, '2025-08-15', '20:17:28', 'admin@dayabhawnafoundation.com', 1),
(23, 1, 2, 'तुलादान ₹21 हजार', '9655-Product.webp', '21000', 0, '2025-08-15', '20:17:59', 'admin@dayabhawnafoundation.com', 1),
(24, 1, -1, 'पक्षी अस्पताल भवन ₹2.50 लाख', '94296-Product.webp', '250000', 23, '2025-08-15', '20:20:35', 'admin@dayabhawnafoundation.com', 1),
(25, 1, -1, 'उपचार उपकरण ₹1 लाख', '74876-Product.webp', '100000', 7, '2025-08-15', '20:21:19', 'admin@dayabhawnafoundation.com', 1),
(26, 1, -1, 'काऊ बेड 100 नग ₹4000 प्रति', '12800-Product.webp', '40000', 8, '2025-08-15', '20:25:50', 'admin@dayabhawnafoundation.com', 1),
(27, 1, -1, '1 फ्रिज ₹80 हजार', '45302-Product.webp', '80000', 20, '2025-08-15', '20:26:54', 'admin@dayabhawnafoundation.com', 1),
(28, 1, -1, '1 स्ट्रेचर ₹50 हजार', '77351-Product.webp', '50000', 21, '2025-08-15', '20:27:41', 'admin@dayabhawnafoundation.com', 1),
(29, 1, -1, '1 पशु रसोई घर ₹3 लाख', '11635-Product.webp', '300000', 16, '2025-08-15', '20:28:20', 'admin@dayabhawnafoundation.com', 1),
(30, 1, -1, '5 अलमारी ₹1.25 लाख', '19172-Product.webp', '125000', 0, '2025-08-15', '20:29:38', 'admin@dayabhawnafoundation.com', 0),
(31, 1, -1, 'भक्ति संगीत ₹1 सेट 1लाख', '9915-Product.webp', '100000', 22, '2025-08-15', '20:30:06', 'admin@dayabhawnafoundation.com', 1),
(32, 8, -1, 'औषधि किट ₹250', '30651-Product.jpg', '250', 1, '2025-10-02', '21:17:41', 'admin@dayabhawnafoundation.com', 1),
(33, 8, -1, 'औषधि किट ₹500', '58205-Product.jpg', '500', 2, '2025-10-02', '21:21:39', 'admin@dayabhawnafoundation.com', 1),
(34, 8, -1, 'औषधि किट ₹1000', '16519-Product.jpg', '1000', 3, '2025-10-02', '21:22:17', 'admin@dayabhawnafoundation.com', 1),
(35, 8, -1, 'औषधि किट ₹1500', '2895-Product.jpg', '1500', 4, '2025-10-02', '21:23:02', 'admin@dayabhawnafoundation.com', 1),
(36, 8, -1, 'औषधि किट ₹2000', '66634-Product.jpg', '2000', 5, '2025-10-02', '21:23:29', 'admin@dayabhawnafoundation.com', 1),
(37, 8, -1, 'औषधि किट ₹5000', '80085-Product.jpg', '5000', 6, '2025-10-02', '21:23:59', 'admin@dayabhawnafoundation.com', 1),
(38, 1, 1, 'एम्बुलैंस सेवा ₹1100', '58642-Product.webp', '1100', 0, '2025-10-02', '21:34:18', 'admin@dayabhawnafoundation.com', 1),
(39, 1, 1, 'एम्बुलैंस सेवा ₹2100', '96018-Product.webp', '2100', 0, '2025-10-02', '21:35:47', 'admin@dayabhawnafoundation.com', 1),
(40, 1, 1, 'एम्बुलैंस सेवा ₹3100', '82045-Product.webp', '3100', 0, '2025-10-02', '21:39:50', 'admin@dayabhawnafoundation.com', 1),
(41, 1, 1, 'एम्बुलैंस सेवा ₹5000', '26113-Product.webp', '5000', 0, '2025-10-02', '21:40:12', 'admin@dayabhawnafoundation.com', 1),
(42, 1, 1, 'एम्बुलैंस सेवा ₹7000', '77834-Product.webp', '7000', 0, '2025-10-02', '21:40:42', 'admin@dayabhawnafoundation.com', 1),
(43, 1, 1, 'एम्बुलैंस सेवा ₹11000', '7268-Product.webp', '11000', 0, '2025-10-02', '21:41:38', 'admin@dayabhawnafoundation.com', 1),
(45, 1, 3, 'भूसा /पौष्टिक आहार ₹500', '78642-Product.webp', '500', 0, '2025-10-13', '21:58:38', 'admin@dayabhawnafoundation.com', 1),
(46, 1, 3, 'भूसा /पौष्टिक आहार ₹1000', '83932-Product.webp', '1000', 0, '2025-10-13', '21:59:43', 'admin@dayabhawnafoundation.com', 1),
(47, 1, 3, 'भूसा /पौष्टिक आहार ₹2100', '62836-Product.webp', '2100', 0, '2025-10-13', '22:00:15', 'admin@dayabhawnafoundation.com', 1),
(48, 1, 3, 'भूसा /पौष्टिक आहार ₹3100', '1113-Product.webp', '3098', 0, '2025-10-13', '22:00:47', 'admin@dayabhawnafoundation.com', 1),
(49, 1, 3, 'भूसा /पौष्टिक आहार ₹5000', '3984-Product.webp', '5000', 0, '2025-10-13', '22:01:53', 'admin@dayabhawnafoundation.com', 1),
(50, 5, -1, '10 व्यक्ति', '71617-Product.webp', '400', 50, '2025-10-13', '22:03:21', 'admin@dayabhawnafoundation.com', 1),
(51, 5, -1, '20  व्यक्ति', '92567-Product.webp', '800', 50, '2025-10-13', '22:06:29', 'admin@dayabhawnafoundation.com', 1),
(52, 5, -1, '50  व्यक्ति', '38614-Product.webp', '2000', 50, '2025-10-13', '22:07:05', 'admin@dayabhawnafoundation.com', 1),
(53, 5, -1, '100 व्यक्ति', '19299-Product.webp', '4000', 50, '2025-10-13', '22:07:34', 'admin@dayabhawnafoundation.com', 1),
(54, 1, 2, 'तुला दान 25 kg', '17355-Product.webp', '1000', 0, '2025-10-13', '22:16:14', 'admin@dayabhawnafoundation.com', 1),
(55, 1, 2, 'तुला दान 50 kg', '9570-Product.webp', '2000', 0, '2025-10-13', '22:16:52', 'admin@dayabhawnafoundation.com', 1),
(56, 1, 2, 'तुला दान 75 kg', '30175-Product.webp', '3000', 0, '2025-10-13', '22:17:33', 'admin@dayabhawnafoundation.com', 1),
(57, 1, 2, 'तुला दान 100 kg', '98664-Product.webp', '4000', 0, '2025-10-13', '22:18:03', 'admin@dayabhawnafoundation.com', 1),
(58, 1, 0, 'ऑफिस एव संत बावन 11 लाख रु', '37345-Product.jpg', '1100000', 17, '2025-11-02', '15:07:39', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seopages`
--

CREATE TABLE `seopages` (
  `ID` int(11) NOT NULL,
  `PageName` varchar(250) NOT NULL DEFAULT '',
  `Url` varchar(250) NOT NULL DEFAULT '',
  `PageContent` text NOT NULL,
  `MetaTitle` varchar(250) NOT NULL DEFAULT '',
  `MetaDescription` varchar(250) NOT NULL DEFAULT '',
  `MetaKeywords` varchar(250) NOT NULL DEFAULT '',
  `OGTitle` varchar(200) NOT NULL DEFAULT '',
  `OGDescription` varchar(256) NOT NULL DEFAULT '',
  `OGImage` varchar(256) NOT NULL DEFAULT '',
  `CreatedDate` varchar(50) NOT NULL,
  `CreatedTime` varchar(50) NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seopages`
--

INSERT INTO `seopages` (`ID`, `PageName`, `Url`, `PageContent`, `MetaTitle`, `MetaDescription`, `MetaKeywords`, `OGTitle`, `OGDescription`, `OGImage`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(1, 'about-us', 'about-us', '', 'About Apsom', 'About Apsom', 'About Apsom', 'About Apsom', 'About Apsom', '62948-1OGImage-Attachment.png', '2025-04-30', '16:39:53', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sevaye`
--

CREATE TABLE `sevaye` (
  `ID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL DEFAULT '',
  `Image` varchar(100) NOT NULL DEFAULT '',
  `PageUrl` varchar(100) NOT NULL DEFAULT '#',
  `CreatedDate` varchar(100) NOT NULL DEFAULT '',
  `CreatedTime` varchar(100) NOT NULL DEFAULT '',
  `CreatedBy` varchar(100) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sevaye`
--

INSERT INTO `sevaye` (`ID`, `Name`, `Image`, `PageUrl`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(1, 'आचार्य विद्यासागर गौ अस्पताल', 'uploads/sevaye/1753980859_service1.webp', 'hospital', '2025-07-31', '22:24:19', 'admin@dayabhawnafoundation.com', 1),
(2, 'jbjbj', 'uploads/sevaye/1753982345_Screenshot-2025-06-13-145219.webp', '#', '2025-07-31', '22:49:05', 'admin@dayabhawnafoundation.com', 0),
(3, 'भगवान श्री राम पक्षी अस्पताल', 'uploads/sevaye/1753983162_service2.webp', '#', '2025-07-31', '23:02:42', 'admin@dayabhawnafoundation.com', 1),
(4, 'dsdds', 'uploads/sevaye/1753983199_Screenshot-2025-07-05-150318.webp', '#', '2025-07-31', '23:03:19', 'admin@dayabhawnafoundation.com', 0),
(5, 'अन्नदानम्', 'uploads/sevaye/1754153486_service3.webp', 'annadanam', '2025-08-02', '22:21:26', 'admin@dayabhawnafoundation.com', 1),
(6, 'abc', 'uploads/sevaye/1754155323_20250802_1703_Red Push Button_remix_01k1n8rh89ephsfz6kfg7rtyga.png', 'sssss', '2025-08-02', '22:52:03', 'admin@dayabhawnafoundation.com', 0),
(7, 'मानव सेवा', 'uploads/sevaye/1755267701_service4.webp', 'human-service', '2025-08-15', '19:51:41', 'admin@dayabhawnafoundation.com', 1),
(8, 'औषधि दान', 'uploads/sevaye/1759419559_औषधि दान.jpg', 'medicine-donation', '2025-10-02', '21:09:19', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sevaye_subcategory`
--

CREATE TABLE `sevaye_subcategory` (
  `ID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `SubcategoryName` varchar(255) NOT NULL,
  `SubcategoryImage` varchar(255) DEFAULT NULL,
  `Priority` int(11) NOT NULL DEFAULT '0',
  `CreatedDate` date DEFAULT NULL,
  `CreatedTime` time DEFAULT NULL,
  `CreatedBy` varchar(100) DEFAULT NULL,
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sevaye_subcategory`
--

INSERT INTO `sevaye_subcategory` (`ID`, `CategoryID`, `SubcategoryName`, `SubcategoryImage`, `Priority`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(1, 1, 'एम्बुलैंस सेवा', 'uploads/sevaye_subcategory/1761528182_82045-Product.jpg', 1, '2025-10-27', '06:53:02', 'admin@dayabhawnafoundation.com', 1),
(2, 1, 'तुला दान', 'uploads/sevaye_subcategory/1761528516_9570-Product.webp', 3, '2025-10-27', '06:58:36', 'admin@dayabhawnafoundation.com', 1),
(3, 1, 'भूसा /पौष्टिक आहार', 'uploads/sevaye_subcategory/1761528567_78642-Product.webp', 2, '2025-10-27', '06:59:27', 'admin@dayabhawnafoundation.com', 1),
(4, 8, 'औषधि किट', 'uploads/sevaye_subcategory/1762072299_औषधि.jpg', 1, '2025-11-02', '14:01:39', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staticpages`
--

CREATE TABLE `staticpages` (
  `ID` int(11) NOT NULL,
  `PageName` varchar(250) NOT NULL DEFAULT '',
  `Url` varchar(250) NOT NULL DEFAULT '',
  `PageContent` text NOT NULL,
  `MetaTitle` varchar(250) NOT NULL DEFAULT '',
  `MetaDescription` varchar(250) NOT NULL DEFAULT '',
  `MetaKeywords` varchar(250) NOT NULL DEFAULT '',
  `OGTitle` varchar(200) NOT NULL DEFAULT '',
  `OGDescription` varchar(256) NOT NULL DEFAULT '',
  `OGImage` varchar(256) NOT NULL DEFAULT '',
  `CreatedDate` varchar(50) NOT NULL,
  `CreatedTime` varchar(50) NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staticpages`
--

INSERT INTO `staticpages` (`ID`, `PageName`, `Url`, `PageContent`, `MetaTitle`, `MetaDescription`, `MetaKeywords`, `OGTitle`, `OGDescription`, `OGImage`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(2, 'Privacy Policy', 'privacy-policy', '<p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\">BACKGROUND OF PERSONAL INFORMATION PROTECTION POLICY OF COLORJET GROUP.</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\"><br>Colorjet Group (hereinafter referred to as “Colorjet Group”) handles various information, including our technical information and information provided by customers, as a supplier who can provide the total solution. With this in mind, Colorjet Group has strived to establish and fully enforce an information management system in order to respect the value of the said information.<br>Considering such background, Colorjet Group will attempt to create rules and establish a management system for the personal information protection in Colorjet Group, as well as set a privacy policy and spread it among board members and employees. Moreover, Colorjet Group will take measures to make the privacy policy easily accessible to the general public.<br>Colorjet Group will strive to protect personal information appropriately based on this policy.</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\"><br>COLORJET GROUP PERSONAL INFORMATION PROTECTION POLICY</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\"><br>1.&nbsp;&nbsp; &nbsp;Establish rules for managing personal information protection and make continual improvements Colorjet Group will make sure that executive staff and workers recognize the importance of personal information protection, and will establish rules for personal information management to appropriately use and protect personal information and ensure that the management system is put in execution. These rules will be maintained and improved continually.<br>2.&nbsp;&nbsp; &nbsp;Collect, use and provide personal information and forbid the use of such information for purposes other than the original intent While carefully considering the personal information is entrusted to us in our company activities, Colorjet Group will handle such information appropriately by establishing a management system for personal information protection for each type of business, and also by following our rules for collecting, using or providing personal information. In addition, Colorjet Group will not use such information for purposes other than the original intent and will implement appropriate measures for it.<br>3.&nbsp;&nbsp; &nbsp;Implement safety measures and correct problems<br>To ensure the correctness and safety of personal information, in accordance with the rules for information Security, Colorjet Group will implement various measures such as managing access to personal information, restricting the means for transporting personal information outside the company and preventing incorrect access from outside the company, and strive to prevent the leakage, loss or destruction of personal information. In addition, when any problems regarding safety measures are found, Colorjet Group will identify the cause to take corrective measures.<br>4.&nbsp;&nbsp; &nbsp;Follow laws and norms<br>Colorjet Group will follow the Indian laws, guidelines and other norms for the handling of personal information. Also, Colorjet Group will confirm our rules with personal information management to such laws, guidelines and other norms.<br>5.&nbsp;&nbsp; &nbsp;Respect a person’s rights regarding his or her personal information<br>When a person makes a request to disclose, correct or delete his or her own personal information, seeks to prevent the use or provision of such information, or gives any complaints or requires consultation, Colorjet Group will respond with sincerity, respecting the person’s rights related to that personal information.</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\"><br>SCOPE OF APPLICATION</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\">This document, \"About Personal Information Protection\", establishes the handling of all personal information by Colorjet Group in the company activities.</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\"><br>PERSONAL INFORMATION</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\">Colorjet Group protects and manages the personal information with the greatest care and the best effort based on the \"Colorjet Group Privacy Policy\". In this document, \"Personal information\" is the information below that can be used to identify specific persons.<br>1.&nbsp;&nbsp; &nbsp;Information provided by the person to Colorjet Group by entering in “Inquiry form” or other forms.<br>2.&nbsp;&nbsp; &nbsp;Information provided by the person to Colorjet Group through any method other than the above.</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\"><br>INFORMATION PROVIDED BY PERSON TO COLORJET GROUP THROUGH ANY METHOD OTHER THAN THE ABOVE.</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\"><br>1.&nbsp;&nbsp; &nbsp;In relation to Colorjet Group’s main business activities for electrical machinery parts, information communication machinery parts, electronic parts manufacturing, and the information service, Colorjet Group will collect and use personal information only to achieve each purpose. When Colorjet Group requires a person to provide his/her personal information, we will clearly state the purpose of the use beforehand to obtain the consent of the person.<br>2.&nbsp;&nbsp; &nbsp;Colorjet Group will not provide personal information to a third party without first obtaining the prior consent from the person, except the circumstances under certain conditions.<br>3.&nbsp;&nbsp; &nbsp;When required to do so for business activities in which Colorjet Group is co-operating with Colorjet Group group companies, Colorjet Group may provide such group companies with personal information such as names, workplace or home addresses, telephone numbers, fax numbers, e-mail addresses, etc.</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\">REQUEST TO DISCLOSE PERSONAL INFORMATION OR RAISING COMPLAINTS</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\"><br>When a person wants to request to disclose, correct, add, delete, stop usage, stop provision to a third party, or notify the purpose of usage of his/her personal information (hereinafter referred to as “disclose and so on”) held by Colorjet Group, or wants to raise complaints, the person is requested to follow the predefined procedures to make such a request.</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\"><br>OTHER IMPORTANT MATTERS</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\"><br>1.&nbsp;&nbsp; &nbsp;Request to the person about the provision of personal information, acquisition of prior consent, and personal information protection<br>2.&nbsp;&nbsp; &nbsp;Notification on the handling of \"About Personal Information Protection\"<br>3.&nbsp;&nbsp; &nbsp;Notes about the usage of cookies and Web beacons on website<br>4.&nbsp;&nbsp; &nbsp;When a person contacts Colorjet Group by telephone, the conversation may be recorded to aid accurate replies and research.</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\"><br>CONTACT INFORMATION</p><p style=\"color: rgb(33, 37, 41); font-family: Lato-Regular; font-size: 16px;\"><br>For inquiries about this document except the request to disclose and so on of personal information and the raising complaints, please contact us in the following way.qq<br>Contact by mail | ColorJet India Limited : A6&amp;7, Sector 83, Noida-201305</p>', 'privacy -policy', 'privacy-policy   ddddqqq', 'privacy-policy  ddddddddddaaaa cddweww', 'ttt', 'ttt', '', '2024-12-23', '15:01:43', 'admin@dayabhawnafoundation.com', 1),
(3, 'Cookies Policy', 'cookies-policy', '<p data-start=\"93\" data-end=\"133\"><strong data-start=\"93\" data-end=\"133\">Date of Last Revision: 19th Feb 2025</strong></p><p data-start=\"135\" data-end=\"167\"><strong data-start=\"135\" data-end=\"167\">Effective Date: 1st Feb 2025</strong></p><h3 data-start=\"169\" data-end=\"188\">1. Introduction</h3><p data-start=\"189\" data-end=\"502\">We, <strong data-start=\"193\" data-end=\"202\">Apsom</strong>, employ cookies and other tracking technologies on our site <a rel=\"noopener\" target=\"_new\" data-start=\"263\" data-end=\"311\" href=\"https://www.apsom.com/\">https://www.apsom.com/</a> to enhance your user experience, improve our services, and provide personalized solutions. This policy outlines how we use cookies, the types we use, and how you can manage your preferences.</p><h3 data-start=\"504\" data-end=\"528\">2. What Are Cookies?</h3><p data-start=\"529\" data-end=\"720\">Cookies are small text files stored on your device when you visit a website. They help us remember your preferences, analyze site performance, and personalize our services to meet your needs.</p><h3 data-start=\"722\" data-end=\"752\">3. Types of Cookies We Use</h3><ul data-start=\"753\" data-end=\"1367\">\r\n<li data-start=\"753\" data-end=\"896\"><strong data-start=\"755\" data-end=\"776\">Essential Cookies</strong>: These are necessary for basic website functionalities, including secure login, appointment scheduling, and navigation.</li>\r\n<li data-start=\"897\" data-end=\"1055\"><strong data-start=\"899\" data-end=\"933\">Analytical/Performance Cookies</strong>: These help us understand how visitors use our site, enabling us to improve the user experience (e.g., Google Analytics).</li>\r\n<li data-start=\"1056\" data-end=\"1187\"><strong data-start=\"1058\" data-end=\"1080\">Functional Cookies</strong>: These remember your preferences (e.g., selected services, language settings) for a customized experience.</li>\r\n<li data-start=\"1188\" data-end=\"1367\"><strong data-start=\"1190\" data-end=\"1223\">Marketing/Advertising Cookies</strong>: These track your activity to display relevant content, promotions, or advertisements related to our offerings, such as services and solutions.</li>\r\n</ul><h3 data-start=\"1369\" data-end=\"1394\">4. How We Use Cookies</h3><p data-start=\"1395\" data-end=\"1413\">We use cookies to:</p><ul data-start=\"1415\" data-end=\"1665\">\r\n<li data-start=\"1415\" data-end=\"1470\">Enhance the performance and usability of the website.</li>\r\n<li data-start=\"1471\" data-end=\"1521\">Analyze visitor behavior to refine our services.</li>\r\n<li data-start=\"1522\" data-end=\"1578\">Personalize content based on your interests and needs.</li>\r\n<li data-start=\"1579\" data-end=\"1665\">Deliver relevant ads or promotions regarding our services, solutions, and offerings.</li>\r\n</ul><h3 data-start=\"1667\" data-end=\"1693\">5. Third-Party Cookies</h3><p data-start=\"1694\" data-end=\"1965\">We may use third-party services such as Google Analytics, Meta (Facebook) Ads, and other marketing tools to monitor website activity and enhance our services. These third parties have their own privacy policies, and we recommend reviewing them for additional information.</p><h3 data-start=\"1967\" data-end=\"2006\">6. Managing Your Cookie Preferences</h3><p data-start=\"2007\" data-end=\"2033\">You can manage cookies by:</p><ul data-start=\"2035\" data-end=\"2256\">\r\n<li data-start=\"2035\" data-end=\"2096\">Adjusting your browser settings to block or delete cookies.</li>\r\n<li data-start=\"2097\" data-end=\"2169\">Using our website\'s cookie consent tool to customize your preferences.</li>\r\n<li data-start=\"2170\" data-end=\"2256\">Opting out of targeted ads through third-party websites (e.g., Google Ads settings).</li>\r\n</ul><h3 data-start=\"2258\" data-end=\"2293\">7. Modifications to This Policy</h3><p data-start=\"2294\" data-end=\"2433\">We reserve the right to update this Cookies Policy periodically. Any changes will be reflected on this page with the updated revision date.</p><h3 data-start=\"2435\" data-end=\"2452\">8. Contact Us</h3><p data-start=\"2453\" data-end=\"2544\">If you have any questions or concerns about our use of cookies, feel free to contact us at:</p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p data-start=\"2546\" data-end=\"2571\"><strong data-start=\"2546\" data-end=\"2555\">Email</strong>: <a data-start=\"2557\" data-end=\"2571\" rel=\"noopener\">info@apsom.com</a></p>', 'Cookies Policy', 'Cookies Policy', 'Cookies Policy', 'Cookies Policy', 'Cookies Policy', '', '2025-03-12', '15:18:07', 'admin@dayabhawnafoundation.com', 1),
(4, 'Terms of use', 'terms-of-use', '<p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Please read the following terms and conditions of use (the \"Terms and Conditions\") which govern your use of, and access to, the \"Website\" located at&nbsp;<a href=\"https://www.rolanddga.com/\" style=\"color: rgb(0, 118, 190);\">http://www.rolanddga.com</a>, including but not limited to its message boards, (referred to herein as the \"Service\") and your relationship with Roland DGA Corporation and all individuals and companies associated with this Website, including their successors in interests and assigns (collectively referred to as \"Roland DG\" or \"We\").</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Your use of this Service means that you accept and agree to the Terms and Conditions. If you do not agree, do not use the Service.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">We may change the Terms and Conditions from time to time and at any time without notice to you, by posting such changes on this Website. By using the Service following any modifications to these Terms and Conditions, you agree to be bound by any such modifications to the Terms and Conditions.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">If you do not have legal capacity to enter into the agreement created by these Terms and Conditions, you cannot use the Service unless and until Roland DG receives the consent of your parent or legal guardian.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Warranty Disclaimer</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">By using the Service, including any software and content contained therein, you agree that your use of the Service is entirely at your own risk. The Service is provided to you as a convenience to provide information relating to, and to discuss, Roland DG products and related resources, but we do not guarantee the accuracy or completeness of such information. THE SERVICE IS PROVIDED \"AS IS,\" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION, ANY WARRANTY FOR INFORMATION, DATA, SOFTWARE, TOOLS, SERVICES, OR UNINTERRUPTED ACCESS. SPECIFICALLY, THE SERVICE DISCLAIMS ANY AND ALL WARRANTIES, INCLUDING, BUT NOT LIMITED TO: (i) ANY WARRANTIES CONCERNING THE AVAILABILITY, RELIABILITY, ACCURACY, USEFULNESS, CONTENT, TIMELINESS, OR SECURITY OF INFORMATION OR SERVICES; AND (ii) ANY WARRANTIES OF TITLE, WARRANTY OF NON-INFRINGEMENT, WARRANTIES OF MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE. THIS DISCLAIMER OF LIABILITY APPLIES TO ANY DAMAGES OR INJURY CAUSED BY ANY FAILURE OF PERFORMANCE, ERROR, OMISSION, INTERRUPTION, DELETION, DEFECT, DELAY IN OPERATION OR TRANSMISSION, COMPUTER VIRUS, COMMUNICATION LINE FAILURE, THEFT OR DESTRUCTION OR UNAUTHORIZED ACCESS TO, ALTERATION OF, OR USE OF RECORD, WHETHER FOR BREACH OF CONTRACT, TORT, NEGLIGENCE, OR UNDER ANY OTHER CAUSE OF ACTION. ANY MATERIAL DOWNLOADED OR OTHERWISE OBTAINED THROUGH THE USE rOF THE SERVICE IS DONE AT YOUR OWN RISK AND YOU ARE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM OR LOSS OF DATA THAT RESULTS FROM THE DOWNLOAD OF ANY SUCH MATERIAL. NO ADVISE OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU FROM Roland DG THROUGH OR FROM THE SERVICE SHALL CREATE ANY WARRANTY NOT EXPRESSLY STATED IN THESE TERMS AND CONDITIONS.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Limitation of Liability</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">NEITHER Roland DG NOR ANY OF ITS EMPLOYEES, AGENTS, SUCCESSORS, ASSIGNS, AFFILIATES, OR CONTENT OR SERVICE PROVIDERS SHALL BE LIABLE TO YOU OR ANY THIRD PARTY FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL OR EXEMPLARY DAMAGES, INCLUDING BUT NOT LIMITED TO DAMAGES FOR LOSS OF PROFITS, GOODWILL, USE, DATA OR OTHER INTANGIBLE LOSSES (EVEN IF Roland DG HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES), ARISING OUT OF (i) YOUR USE OF THE SERVICE, (ii) INABILITY TO GAIN ACCESS TO OR USE THE SERVICE, (iii) THE COST OF PROCUREMENT OF SUBSTITUTE GOODS AND SERVICES RESULTING FROM ANY GOODS, DATA, INFORMATION OR SERVICES PURCHASED OR OBTAINED OR MESSAGES RECEIVED OR TRANSACTIONS ENTERED INTO VIA THE SERVICE, (iv) UNAUTHORIZED ACCESS TO OR MODIFICATION OF YOUR TRANSMISSIONS OR DATA, (v) STATEMENTS OR CONDUCT OF Roland DG OR ANY THIRD PARTY ON THE SERVICE, OR (vi) OUT OF ANY BREACH OF ANY WARRANTY.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">BECAUSE SOME STATES DO NOT ALLOW THE EXCLUSION OR LIMITATION OF LIABILITY FOR CONSEQUENTIAL OR INCIDENTAL DAMAGES, THE ABOVE LIMITATION MAY NOT APPLY TO YOU. IN SUCH STATES, THE RESPECTIVE LIABILITY OF Roland DG, ITS EMPLOYEES, AGENTS, SUCCESSORS, ASSIGNS, AFFILIATES, AND CONTENT OR SERVICE PROVIDERS IS LIMITED TO THE MAXIMUM EXTENT PERMITTED BY SUCH STATE LAW.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Your Use of the Service</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Your ability to use the Service is subject to you adhering to all Terms and Conditions at all times. Except as may otherwise be provided for under the Website, we do not grant you a license to any content, features or materials you may access via the Service, including without limitation any trademarks, registered trademarks, service marks, copyrightable material or any other intellectual property included in the Service. Except as may otherwise be provided for under the Website, you may not for any purpose download or save a copy of any of the Service\'s screens or \"content\" (which includes information, data, software, photographs, graphics, and all other materials expressed in whatever format), nor modify them, or any portion thereof, except as otherwise provided in these Terms and Conditions. You may, however, print a copy of the content on this Website for your sole personal use or records, and access the Service on a single computer, provided that you do not (and do not allow any third party to) (i) distribute, copy, modify, create a derivative work of or based on, reverse engineer, reverse assemble or otherwise attempt to discover any source code, content or any portion of the Service, or (ii) sell, rent, loan, assign, sublicense, grant a security interest in or otherwise transfer any right s or to the content or Service.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Registration Requirements</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">You may be required to register before you are permitted access to certain portions of the Service. To register, and to maintain your status as a registered user, you must provide, and update as necessary, the requested registration information, which must be current, accurate, complete and truthful at all times. If we have reasonable grounds to believe that your registration information is not current, accurate, complete or truthful, we may without notice suspend or terminate your access to the Service, including terminating your access to any information you may have stored on the Service.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Proprietary Rights</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">The Service and any software used in connection with the Service contains proprietary and confidential information that is protected by applicable intellectual property and other laws, which you may not infringe upon or use in any manner except as expressly permitted under these Terms and Conditions. Roland DG is the owner and/or authorized user of any trademark, registered trademark and/or service mark appearing on the Service, and is the copyright owner or licensee of the content and/or information on the Website, unless otherwise indicated. If you make other use of this Website, except as expressly permitted under the Terms and Conditions, you may violate copyright and other laws of the United States and/or other countries, as well as applicable state laws and may be subject to liability for such unauthorized use. Our use of any trademarks, registered trademarks, service marks, copyrightable material or any other intellectual property found on this Website, does not convey to you any license or other authorization to such marks or materials.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Third Party Provided Content</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Certain information contained on this Website, as well as reference materials or links to other sites, are provided for general informational purposes only, and are not intended to be relied upon for any purpose. Neither Roland DG nor any of its data or content providers shall be liable for any errors or delays in the content, or for any actions taken in reliance thereon, nor does Roland DG warrant that the content is accurate, complete or truthful.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">You further acknowledge that by using the Service, you may access content which you might consider offensive, indecent or objectionable. It is your responsibility to evaluate, assess, and bear any risk, associated with the use of any content. Roland DG is not liable for any content, including but not limited to any errors or omissions in any content or for any loss, damage or injury of any kind resulting from your, or any other party\'s, use of content distributed or otherwise made available via the Service.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">User Conduct On the Service</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">You acknowledge and agree that you must: (a) provide for your own access to the World Wide Web and pay any service fees associated with such access, and (b) provide all equipment necessary for you to make such connection to the World Wide Web, including a computer, software, a modem and a working telephone line.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">While using the Service, you may not:<br>1. upload, post, publish, transmit, reproduce, e-mail, or distribute in any way, any content obtained through the Service which is protected by copyright, or other proprietary or intellectual property right, or derivative works with respect thereto, without obtaining the express written permission of the copyright, trademark or patent owner or other rights holder and of Roland DG; or<br>2. upload, post, publish, reproduce, e-mail, transmit or distribute in any way, any content that you do not have a right to make available under any law or under contractual or fiduciary relationships; or<br>3. upload, post, publish, reproduce, transmit, e-mail or distribute in any way any component of the Service itself or derivative works with respect thereto, as the Service is copyrighted as a collective work under U.S. copyright laws; or<br>4. upload, post, publish, reproduce, e-mail, transmit or distribute in any way via the Service any content that infringes any patent, trademark, trade secret, copyright or other proprietary rights of any party; or<br>5. upload, post, publish or transmit via the Service any unlawful, fraudulent, libelous, defamatory, obscene, pornographic, profane, threatening, abusive, false, harassing, tortuous, vulgar, invasive (of another\'s privacy), hateful, or racially, ethically or otherwise objectionable information of any kind, including without limitation any transmissions constituting or encouraging conduct that may constitute illegal activity, constitute a criminal offense, give rise to civil liability, or otherwise violate any local, state, national or foreign law, including without limitation the U.S. export laws and regulations; or<br>6. upload, post, publish, transmit, reproduce, e-mail, distribute or in any way exploit any content obtained through the Service for commercial purposes (other than as expressly permitted by the provider of such content); or<br>7. restrict, interfere with, or inhibit any other user from using and enjoying the Service; or<br>8. post or transmit any advertisements, solicitations, chain letters, pyramid schemes, investment opportunities or schemes or other unsolicited commercial communication (except as otherwise expressly permitted by the Service) or engage in spamming or flooding; or<br>9. impersonate any other person or entity, or misrepresent your affiliation with any other person or entity; or<br>10. post or transmit any information or software into the Service which contains a virus, trojan horse, worm or other harmful component; or<br>11. harm minors in any way; or<br>12. forge headers or otherwise manipulate identifiers in order to disguise the origin of any content transmitted through the Service; or<br>13. collect or store personal data about other users for any purpose; or<br>14. intentionally or unintentionally violate any applicable local, state, national or international law.<br>Available Content:<br>You acknowledge that all content accessed through the Service is the sole responsibility of the individual party that posts such content. This means that you, and not Roland DG, are entirely responsible for all content that you upload, post, e-mail, transmit or otherwise distribute via the Service. Further, Roland DG has no responsibility to you with respect to content uploaded, posted, e-mailed, transmitted or otherwise distributed to you via the Services by other parties.<br><br>We do not pre-screen or have an obligation to monitor the content posted by you, or any other party, on the Service. You acknowledge and agree, however, that we do, in our sole discretion, retain the right to monitor the Service and remove or move any content made available via the Service. We also may disclose any information as we may deem necessary or appropriate to satisfy any law, regulation or other governmental request, to operate the Service properly, to protect Roland DG, its customers, or users of the Website. We will not intentionally monitor or disclose any private electronic-mail message which you have directed specifically and solely to Roland DG, unless required by law. We reserve the right to refuse to post or to remove any information or materials, in whole or in part, that we, in our sole and absolute discretion, deem to be unacceptable, undesirable, inappropriate or in violation of these Terms and Conditions.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Submissions</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">All information and content made available via the Service, including but not limited to all content posted on the Website\'s message boards, shall be deemed and remain the property of Roland DG, and we shall be free to use, for any purpose (including commercial exploitation), any ideas, concepts, know-how or techniques contained in any information or content which any user makes available through this Website. Roland DG shall not be subject to any obligations of confidentiality regarding submitted information, except as agreed by Roland DG or required by law.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Links from and to the Service</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">You acknowledge and agree that Roland DG and any of its Website co-branding providers have no responsibility for the accuracy or availability of information provided by linked Websites (if any). Links to external Websites do not constitute an endorsement by Roland DG or its Website co-branding providers of the sponsors of such sites or the content, products, advertising or other materials presented on such sites. We do not author, edit, or monitor these pages or links. You acknowledge and agree that we are not responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with your use of or reliance on any such content, goods or services available on such external Websites or resources.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Failure to Comply With Terms and Conditions and Termination</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">You acknowledge and agree that we may deny you access to all or part of the Service without prior notice if you engage in any conduct or activities that we, in our sole and absolute discretion, believe violate any of these Terms and Conditions, violate the rights of Roland DG, or is otherwise inappropriate for continued access.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">You agree to indemnify and hold Roland DG and its affiliates harmless from any and all claims, liabilities, costs and expenses, including reasonable attorneys\' fees, arising in any way from your use of the Service or the placement or transmission of any message, information, software or other materials through the Service by you or any users of your account or related to any violation of these Terms and Conditions by you or any users of your account.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Miscellaneous</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">We reserve the right to change any information on this Website, including but not limited to terminating the Service or revising and/or deleting features or other information without prior notice to you. Accessing certain links within this Website, if any, may provide you with access to third party websites for which we assume no responsibility of any kind for the content, availability or otherwise. (See \"Links from and to the Service\" above.) The content of this Website may vary depending upon your browser functionality and limitations.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">You and Roland DG each agree to submit to the personal and exclusive jurisdiction of the courts located within the State of California. The Terms and Conditions and the relationship between you and Roland DG shall be governed by the laws of the State of California, without regard to its conflict of law provisions. Notwithstanding the foregoing, you agree to comply with all local rules, in whatever jurisdiction, including those outside of the United States, regarding online conduct and the use of personal information. You further agree to comply with all applicable laws regarding the transmission of data exported from the country in which you reside and from which your access to the Service originated.</p><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">The failure of Roland DG to exercise or enforce any right or provision of the Terms and Conditions shall not constitute a waiver of such right or provision. If any provision of the Terms and Conditions is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give effect to the parties intentions as reflected in the provision, and the other provisions of the Terms and Conditions shall remain in full force and effect.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Copyright Notice</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">Copyright @ 2015 Roland DGA Corporation. All rights reserved.</p><h2 style=\"margin-top: 27px; margin-bottom: 13.5px; font-size: 48px; font-family: proxima-nova, Arial, sans-serif; color: rgb(33, 37, 41);\">Trademarks</h2><p style=\"margin-bottom: 13.5px; color: rgb(33, 37, 41); font-family: proxima-nova, Arial, sans-serif; font-size: 18px;\">BIZTOOLS, Built with Precision. Backed with Passion., CAMM-1, ColorChoice, COLORIP, CutChoice, Do More, Eco-SOLiNK, Eco-Solvent, EZ Engrave, EZ-SCAN, HeatWave, Hi-Fi JET, MM (logo), Metaza Mark, Pixform, PRO MILL, ProMeasure, Reverse Modeling, Quadralign, Roland DG, SelectColor, SketchMate, SignMate, SOLINK, SOL iNK, SOLJET, SRP, STIKA, V8 Variable Droplet * 8 color (artwork), VersaCAMM, VersaWorks.</p>', '', '', '', '', '', '', '2025-03-12', '15:19:05', 'admin@dayabhawnafoundation.com', 1),
(5, 'Privacy Statement', 'privacy-statement', '<p><h2>Privacy Statement</h2>\r\nColorjet Group (hereinafter referred to as “Colorjet Group”) handles various information, including our technical information and information provided by customers, as a supplier who can provide the total solution. With this in mind, Colorjet Group has strived to establish and fully enforce an information management system in order to respect the value of the said information.\r\n</p><p>Considering such background, Colorjet Group will attempt to create rules and establish a management system for the personal information protection in Colorjet Group, as well as set a privacy policy and spread it among board members and employees. Moreover, Colorjet Group will take measures to make the privacy policy easily accessible to the general public.\r\nColorjet Group will strive to protect personal information appropriately based on this policy.</p>', 'Privacy Statement', 'Privacy Statement', 'Privacy Statement', '', '', '', '2025-05-06', '13:56:49', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `ID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL DEFAULT '',
  `Designation` varchar(250) NOT NULL DEFAULT '',
  `ProfileImg` varchar(250) NOT NULL DEFAULT '',
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `ID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL DEFAULT '',
  `StarRating` varchar(50) NOT NULL DEFAULT '',
  `Description` text NOT NULL,
  `UserImage` varchar(256) NOT NULL DEFAULT '',
  `ApprovalStatus` enum('Approved','Rejected','Pending') NOT NULL DEFAULT 'Pending',
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`ID`, `Name`, `StarRating`, `Description`, `UserImage`, `ApprovalStatus`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(6, 'माननीय पूर्व गृह मंत्री , नरोत्तम जी मिश्रा', '5', 'दया भावना का कार्य दतिया जिले  में  सबसे सुंदर  और  सही मायने  में  हो  रहा  है  । ऐसा अद्भुत कार्य भारत के प्रत्येक प्रदेश में होना चाहिए', '94689-6UserImage-Attachment.jpeg', 'Approved', '2025-08-21', '23:27:37', 'admin@dayabhawnafoundation.com', 1),
(7, 'माननीय नितिन गडकरी, राजमार्ग मंत्री, भारत सरकार', '5', 'दया भावना फाउंडेशन के ट्रस्टी द्वारा भेट कर के , भारत के प्रत्येक फोर लाइन  सिक्स लाइन पर अस्पताल निर्माण बाबत चर्चा की', '24202-7UserImage-Attachment.jpeg', 'Approved', '2025-08-21', '23:28:43', 'admin@dayabhawnafoundation.com', 1),
(8, 'माननीय  मुख्यमंत्री योगी आदित्यनाथ जी', '5', 'दया भावना फाउंडेशन के कार्य से परिचय करवाया , तथा उत्तर प्रदेश में गौ अस्पताल संबंधी चर्चाएं  की', '72866-8UserImage-Attachment.jpeg', 'Approved', '2025-08-21', '23:29:56', 'admin@dayabhawnafoundation.com', 1),
(9, 'माननीय विधान परिषद अध्यक्ष कुंवर मानवेंद्र सिंह ठाकुर', '5', 'दया भावना फाउंडेशन के अस्पताल भारत वर्ष में निर्माण  हो रहे  है  , वह प्रशंसनीय है', '36866-9UserImage-Attachment.jpeg', 'Approved', '2025-08-21', '23:30:18', 'admin@dayabhawnafoundation.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `CenterID` int(11) NOT NULL DEFAULT '-1',
  `Email` varchar(50) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `UserType` varchar(50) NOT NULL,
  `CreatedDate` varchar(50) NOT NULL,
  `CreatedTime` varchar(50) NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `CenterID`, `Email`, `Password`, `UserType`, `CreatedDate`, `CreatedTime`, `IsActive`) VALUES
(1, -1, 'admin@dayabhawnafoundation.com', 'd93591bdf7860e1e4ee2fca799911215', 'System Admin', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `ID` int(11) NOT NULL,
  `CenterID` int(11) NOT NULL DEFAULT '-1',
  `Name` varchar(100) NOT NULL DEFAULT '',
  `Mobile` varchar(50) NOT NULL DEFAULT '',
  `Email` varchar(50) NOT NULL DEFAULT '',
  `UserType` varchar(100) NOT NULL DEFAULT '',
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`ID`, `CenterID`, `Name`, `Mobile`, `Email`, `UserType`, `CreatedDate`, `CreatedBy`, `IsActive`) VALUES
(1, -1, 'Admin', '6390255255', 'admin@dayabhawnafoundation.com', 'System Admin', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_details`
--

CREATE TABLE `volunteer_details` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Occupation` varchar(100) DEFAULT NULL,
  `Mobile` varchar(15) NOT NULL,
  `Country` varchar(100) DEFAULT 'India',
  `Pincode` varchar(10) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Address` text,
  `Consent` tinyint(1) DEFAULT '1',
  `IsActive` tinyint(1) DEFAULT '1',
  `CreatedDate` date DEFAULT NULL,
  `CreatedTime` time DEFAULT NULL,
  `CreatedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer_details`
--

INSERT INTO `volunteer_details` (`ID`, `Name`, `Email`, `Occupation`, `Mobile`, `Country`, `Pincode`, `State`, `City`, `Address`, `Consent`, `IsActive`, `CreatedDate`, `CreatedTime`, `CreatedBy`) VALUES
(1, 'testing', 'rohitmaurya137@gmail.com', 'Other', '8948945680', 'India', '274001', 'Uttar Pradesh', 'Deoria', 'Majhawaliya thana khukhundoo\r\nKhukhundoo', 1, 0, '2025-10-02', '22:59:49', 'admin@dayabhawnafoundation.com');

-- --------------------------------------------------------

--
-- Table structure for table `website_info`
--

CREATE TABLE `website_info` (
  `ID` int(11) NOT NULL,
  `Facebook` varchar(256) NOT NULL DEFAULT '',
  `Instagram` varchar(256) NOT NULL DEFAULT '',
  `LinkedIn` varchar(256) NOT NULL DEFAULT '',
  `Youtube` varchar(256) NOT NULL DEFAULT '',
  `Twiter` varchar(256) NOT NULL DEFAULT '',
  `Hotline` varchar(256) NOT NULL DEFAULT '',
  `Email` varchar(256) NOT NULL DEFAULT '',
  `WhatsApp` varchar(256) NOT NULL DEFAULT '',
  `CreatedDate` varchar(50) NOT NULL DEFAULT '',
  `CreatedTime` varchar(50) NOT NULL DEFAULT '',
  `CreatedBy` varchar(50) NOT NULL DEFAULT '',
  `IsActive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website_info`
--

INSERT INTO `website_info` (`ID`, `Facebook`, `Instagram`, `LinkedIn`, `Youtube`, `Twiter`, `Hotline`, `Email`, `WhatsApp`, `CreatedDate`, `CreatedTime`, `CreatedBy`, `IsActive`) VALUES
(1, 'https://www.facebook.com/', '#', 'https://www.linkedin.com/company/', 'https://www.youtube.com/channel/', 'https://twitter.com/', '+91 6390255255', 'dayabhawnafoundation@gmail.com', '917309588588', '2025-07-03', '23:37:54', 'admin@dayabhawnafoundation.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `custom_code`
--
ALTER TABLE `custom_code`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gallery_video`
--
ALTER TABLE `gallery_video`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `join_us`
--
ALTER TABLE `join_us`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `news_pr`
--
ALTER TABLE `news_pr`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seopages`
--
ALTER TABLE `seopages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sevaye`
--
ALTER TABLE `sevaye`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sevaye_subcategory`
--
ALTER TABLE `sevaye_subcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staticpages`
--
ALTER TABLE `staticpages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `volunteer_details`
--
ALTER TABLE `volunteer_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `website_info`
--
ALTER TABLE `website_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `custom_code`
--
ALTER TABLE `custom_code`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery_image`
--
ALTER TABLE `gallery_image`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery_video`
--
ALTER TABLE `gallery_video`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `join_us`
--
ALTER TABLE `join_us`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news_pr`
--
ALTER TABLE `news_pr`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `seopages`
--
ALTER TABLE `seopages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sevaye`
--
ALTER TABLE `sevaye`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sevaye_subcategory`
--
ALTER TABLE `sevaye_subcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staticpages`
--
ALTER TABLE `staticpages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `volunteer_details`
--
ALTER TABLE `volunteer_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website_info`
--
ALTER TABLE `website_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
