-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 02:25 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pe_analisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa`
--

CREATE TABLE `analisa` (
  `id` int(11) NOT NULL,
  `issue_id` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `week` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `cause` varchar(100) NOT NULL,
  `sample_recieve` varchar(100) NOT NULL,
  `sample_analyze` varchar(100) NOT NULL,
  `report` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `part` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa`
--

INSERT INTO `analisa` (`id`, `issue_id`, `nama`, `week`, `type`, `model`, `place`, `issue`, `cause`, `sample_recieve`, `sample_analyze`, `report`, `status`, `timestamp`, `part`) VALUES
(26, '0130152734', 'Rifki Zulkarnain', '2023-W01', 'HW', 'SM-A042F', 'OQC', 'Flash Light Dim', 'R Chip R1706 slant', '2023-01-03', '2023-01-04', '2023.01.30_15.28.22_TR_OQC_04.01.2023_SM-A042F_Flash Light Dim.xlsx', 'Finish', '2023.01.30_15.28.22_107.102.39.79', 'PE SOLUTION'),
(27, '0130153251', 'Rifki Zulkarnain', '2023-W01', 'HW', 'SM-A135F', 'OQC', 'Speaker No Sound', 'After reheat at chamber, defect cant reproduced again (NDF).', '2023-01-04', '2023-01-05', '2023.01.30_15.33.10_TR_OQC_04.01.2023_SM-A135F_Speaker No Sound.xlsx', 'Finish', '2023.01.30_15.33.10_107.102.39.79', 'PE SOLUTION'),
(28, '0130153551', 'Rifki Zulkarnain', '2023-W01', 'HW', 'SM-A047F', 'OQC', 'LCD Abnormal (noise) after ACT 1H', 'Suspect Assy LCD reliability NG, there are no appearance abnormality.', '2023-01-06', '2023-01-06', '2023.01.30_15.36.57_TR_OQC_06.01.2023_SM-A047F_LCD Abnormal.xlsx', 'Finish', '2023.01.30_15.36.57_107.102.39.79', 'PE SOLUTION'),
(29, '0130153803', 'Rifki Zulkarnain', '2023-W05', 'HW', 'SM-S918BE', 'OQC', 'Wireless charging no function', 'Wireless charging connector not locking (loose)', '2023-01-30', '2023-02-01', '2023.02.03_09.16.21_TR_OQC_01.02.2023_SM-S918B_Wireless Charging No Function.xlsx', 'Finish', '2023.02.03_09.16.21_107.102.39.79', 'PE SOLUTION'),
(30, '0130153827', 'Rifki Zulkarnain', '2023-W05', 'HW', 'SM-S918BE', 'OQC', 'LCD Bright Dot', 'Seem pixel NG (intermittent).\r\nSometime bright dot appear.', '2023-01-30', '2023-01-31', '2023.02.01_13.48.26_TR_OQC_31.01.2023_SM-S918B_Display Bright Dot (updated).xlsx', 'Finish', '2023.02.01_13.48.26_107.102.39.79', 'PE SOLUTION'),
(31, '0130153850', 'Rifki Zulkarnain', '2023-W05', 'HW', 'SM-S918BE', 'OQC', 'Rear Camera 3 Blackdot after zoom 30x', 'Assy camera Tele seem dirty inside', '2023-01-30', '2023-01-31', '2023.02.03_09.18.33_TR_OQC_31.01.2023_SM-S918B_Rear Camera 3 Black Dot.xlsx', 'Finish', '2023.02.03_09.18.33_107.102.39.79', 'PE SOLUTION'),
(32, '0130153917', 'Dita Hapsoro', '2023-W05', 'HW', 'SM-S916BE', 'OQC', 'Charging Error', 'Suspected thermistor error reading actual temperature.\r\nAfter open backglass set work normally -> re', '2023-01-30', '2023-01-31', '2023.01.31_14.09.52_TR_OQC_31012021 SM-S916B Charging Error.xlsx', 'Finish', '2023.01.31_14.09.52_107.102.39.79', 'PE SOLUTION'),
(33, '0130154006', 'Dita Hapsoro', '2023-W05', 'HW', 'SM-S918BE', 'OQC', 'S-PEN No function', 'WACOM IC (U16400) is NG.\r\nReset signal from WACOM IC is abnormal causing abnormal SPEN_VD_3P3 supply', '2023-01-27', '2023-01-31', '2023.01.31_14.05.06_TR_OQC_31012021 SM-S918B SPEN No Function.xlsx', 'Finish', '2023.01.31_14.05.06_107.102.39.79', 'PE SOLUTION'),
(34, '0130154348', 'Rifki Zulkarnain', '2023-W02', 'HW', 'SM-A042F', 'OQC', 'LCD abnormal (vertical line)', 'Assy LCD NG, there are abnormal pixel.', '2023-01-13', '2023-01-13', '2023.01.30_15.44.16_TR_OQC_13.01.2023_SM-A042F_LCD Noise (Abnormal).xlsx', 'Finish', '2023.01.30_15.44.16_107.102.39.79', 'PE SOLUTION'),
(35, '0130154641', 'Rifki Zulkarnain', '2023-W02', 'HW', 'SM-A236E', 'OQC', 'Set Burn', '(HQ analyze) there are physical impact trace at battery jacket alongside burn area.\r\n--> Check point', '2023-01-13', '2023-01-16', '2023.01.30_16.29.52_SEIN?? SDI A23 5G OQC Set ??? ?? ??_230119.pptx', 'Finish', '2023.01.30_16.29.52_107.102.39.79', 'PE SOLUTION'),
(36, '0130155027', 'Rifki Zulkarnain', '2023-W05', 'HW', 'SM-S911BE', 'OQC', 'Gyroscope sensor Fail', 'Gyro IC NG (PLM: P230201-02979)', '2023-01-30', '2023-02-07', '2023.02.08_10.35.23_TR_OQC_08.02.2023_SM-S911B_Gyroscope Sensor Fail.xlsx', 'Finish', '2023.02.08_10.35.23_107.102.39.79', 'PE SOLUTION'),
(37, '0130155253', 'Rifki Zulkarnain', '2023-W02', 'HW', 'SM-T220', 'OQC', 'LCD horizontal line', 'Dirty line inside LCD window', '2023-01-13', '2023-01-13', '2023.01.30_15.53.18_TR_OQC_13.01.2023_SM-T220N_LCD Horizontal Line.xlsx', 'Finish', '2023.01.30_15.53.18_107.102.39.79', 'PE SOLUTION'),
(38, '0130155532', 'Rifki Zulkarnain', '2023-W05', 'HW', 'SM-A235F', 'OQC', 'Watchdog reset', 'AP NG', '2023-01-16', '2023-01-16', '2023.01.30_15.56.01_TR_OQC_13.01.2023_SM-A235F_Watchdog Reset During ACT 1Hr.xlsx', 'Finish', '2023.01.30_15.56.01_107.102.39.79', 'PE SOLUTION'),
(39, '0130155726', 'Rifki Zulkarnain', '2023-W03', 'HW', 'SM-S918BE', 'OQC', 'Rear camera wide no focus', 'Assy camera wide NG', '2023-01-16', '2023-01-17', '2023.01.30_15.57.48_TR_OQC_17.01.2023_SM-S918B_Rear Camera Wide No Focus.xlsx', 'Finish', '2023.01.30_15.57.48_107.102.39.79', 'PE SOLUTION'),
(40, '0130160047', 'Rifki Zulkarnain', '2023-W03', 'HW', 'SM-S918BE', 'OQC', 'Double Tap display no function', 'assy touch panel NG', '2023-01-19', '2023-01-20', '2023.01.30_16.02.02_TR_OQC_20.01.2023_SM-S918B_Double Tap Display No Function.xlsx', 'Finish', '2023.01.30_16.02.02_107.102.39.79', 'PE SOLUTION'),
(41, '0130160424', 'Rifki Zulkarnain', '2023-W03', 'HW', 'SM-S918BE', 'OQC', 'Rear camera portrait AF abnormal', 'Camera module NG --> feedback to MCNEX', '2023-01-18', '2023-01-20', '2023.01.30_16.04.50_TR_OQC_20.01.2023_SM-S918B_Rear Camera Potrait AF Abnormal.xlsx', 'Finish', '2023.01.30_16.04.50_107.102.39.79', 'PE SOLUTION'),
(43, '0130160634', 'Rifki Zulkarnain', '2023-W03', 'HW', 'SM-S918BE', 'OQC', 'Rear camera tele reddish', 'During simulation, defect cant reproduce (NDF)', '2023-01-18', '2023-01-18', '2023.01.30_16.07.07_TR_OQC_20.01.2023_SM-S918B_Rear Camera Tele Reddish.xlsx', 'Finish', '2023.01.30_16.07.07_107.102.39.79', 'PE SOLUTION'),
(44, '0130161147', 'Rifki Zulkarnain', '2023-W03', 'HW', 'SM-S918BE', 'OQC', 'Video AF operating defect', 'suspect AP IC NG (PLM: P230203-05305)\r\nassy PBA NG, suspect Video block at AP problem --> send to HQ', '2023-01-19', '2023-02-07', '', 'Finish', '2023.02.07_10.25.53_107.102.39.79', 'PE SOLUTION'),
(45, '0130162239', 'Rifki Zulkarnain', '2023-W04', 'HW', 'SM-A042F', 'OQC', 'Front camera Flare', 'Camera lens dirty seem like touched/glue from tape.', '2023-01-23', '2023-01-23', '2023.01.30_16.23.16_TR_OQC_23.01.2023_SM-A042F_Front Camera Flare.xlsx', 'Finish', '2023.01.30_16.23.16_107.102.39.79', 'PE SOLUTION'),
(46, '0130162524', 'Rifki Zulkarnain', '2023-W04', 'HW', 'SM-A042F', 'OQC', 'LCD Ghost touch', 'LCD connector broken, its may lead to intermittent/abnormal connection.', '2023-01-30', '2023-01-23', '2023.01.30_16.25.41_TR_OQC_23.01.2023_SM-A042F_LCD Ghost Touch.xlsx', 'Finish', '2023.01.30_16.25.41_107.102.39.79', 'PE SOLUTION'),
(47, '0130162752', 'Rifki Zulkarnain', '2023-W04', 'HW', 'SM-S916BE', 'OQC', 'SIM1 no detect', 'SIM socket soldering crack', '2023-01-20', '2023-01-23', '2023.01.30_16.28.07_TR_OQC_23.01.2023_SM-S916B_SIM Card No Detect.xlsx', 'Finish', '2023.01.30_16.28.07_107.102.39.79', 'PE SOLUTION'),
(48, '0130163609', 'Rifki Zulkarnain', '2023-W04', 'HW', 'SM-S916BE', 'OQC', 'Rear camera Video vertical line', 'Assy camera Main 50M NG', '2023-01-24', '2023-01-24', '2023.01.30_16.36.35_TR_OQC_24.01.2023_SM-S916B_Rear Camera Video Vertical Line.xlsx', 'Finish', '2023.01.30_16.36.35_107.102.39.79', 'PE SOLUTION'),
(49, '0131071651', 'Budi Supriatna', '2023-W05', 'MECHA', 'SM-S918', 'OQC', 'LCD mung at cam hole area', 'Material octa crack (global issue)', '2023-01-30', '2023-01-30', '2023.01.31_07.16.51_[SM-S918] Analyze Report_OQC Mass Inspection Defect_LCD Mung_30-Jan-23.pdf', 'Finish', '2023.01.31_07.17.16_107.102.39.234', 'MECHA'),
(50, '0131073952', 'Yuki Astika Putrabagia', '2023-W02', 'MECHA', 'SM-S916', 'OQC', 'Back Glass Lifting (OQC Waterflooding LQV Stage)', ' B/Glass lifting is caused by screw of Sub PBA gap', '2023-01-12', '2023-01-13', '2023.01.31_07.40.22_[SM-S916]_Analyze Report_QOC Waterflooding_Back Glass Lifting_LQV_13.01.2023.pdf', 'Finish', '2023.01.31_07.40.22_107.102.39.66', 'MECHA'),
(51, '0131075220', 'santono', '2023-W02', 'HW', 'SM-M236B', 'PROCESS', 'Sub6_NR_n41 TX, SUB6 RX & GSM TX POWER  NG', 'BACK GLASS NG', '2023-01-12', '2023-01-13', '2023.01.31_07.59.13_TR_InProcess_13.01.2023_SM-M236B_GetSub6VfsTest, NRn41 Tx Power, GSM900 TX Power', 'Finish', '2023.01.31_07.59.13_107.102.39.78', 'Etc.'),
(52, '0131075904', 'Yuki Astika Putrabagia', '2023-W02', 'MECHA', 'SM-T220', 'PROCESS', 'LCD Crack', 'PQC give sample to PE not full set, only Assy Front and not include Back Cover \r\nNot found damage, b', '2023-01-13', '2023-01-13', '2023.01.31_08.00.24_[SM-T220] Analyze Report_In Line Process_LCD Crack_16.01.2023.docx', 'Finish', '2023.01.31_08.00.24_107.102.39.66', 'MECHA'),
(53, '0131075922', 'Budi Supriatna', '2023-W01', 'MECHA', 'SM-S916', 'PROCESS', 'WPI Fail', 'RCV Sealing rubber dirty (Worker mistake)', '2023-01-06', '2023-01-06', '2023.01.31_07.59.22_[SM-S916] Analyze Report_LQV In Process Defect_WPI Fail_06-Jan-23.pdf', 'Finish', '2023.01.31_08.02.45_107.102.39.234', 'MECHA'),
(54, '0131080140', 'Yuki Astika Putrabagia', '2023-W05', 'MECHA', 'SM-S918', 'OQC', 'S-Pen Deep', 'S-Pen Deep is caused by distance S-Pen with end of hole S-Pen at NG set is closer compared to OK set', '2023-01-19', '2023-01-20', '2023.01.31_08.02.10_[SM-S918]_Analyze Report_QOC AQI Inspection_S-Pen Deep_20.01.2023.pdf', 'Finish', '2023.01.31_08.02.10_107.102.39.66', 'MECHA'),
(56, '0131080404', 'Yuki Astika Putrabagia', '2023-W03', 'MECHA', 'SM-S911', 'OQC', 'Back Glass Gap', 'Backglass Gap is caused by SUS locking part of Rear Mid Assy not locking into Rear Top hole', '2023-01-19', '2023-01-20', '2023.01.31_08.04.22_[SM-S911]_Analyze Report_QOC AQI Inspection_Backglass Gap_20.01.2023.pdf', 'Finish', '2023.01.31_08.04.22_107.102.39.66', 'MECHA'),
(57, '0131080829', 'Budi Supriatna', '2023-W01', 'MECHA', 'SM-A336', 'PROCESS', 'WPI Fail', 'Cam window leakage caused cam window tape less attach/ less press (material NG)', '2023-01-05', '2023-01-05', '2023.01.31_08.08.29_[SM-A336] Analyze Report_In Process Defect_WPI Fail_05-Jan-23.pdf', 'Finish', '2023.01.31_08.08.47_107.102.39.234', 'MECHA'),
(58, '0131131111', 'Yuki Astika Putrabagia', '2023-W03', 'MECHA', 'SM-S918', 'OQC', 'Window Camera Dirty', 'Window Camera Dirty is suspected caused by raw material (Set 1) and abnormal handling (Set 2)', '2023-01-19', '2023-01-20', '2023.01.31_13.11.39_[SM-S918]_Analyze Report_QOC AQI Inspection_Window Camera Dirty_20.01.2023.pdf', 'Finish', '2023.01.31_13.11.39_107.102.39.66', 'MECHA'),
(59, '0201101824', 'Yuki Astika Putrabagia', '2023-W04', 'MECHA', 'SM-S918', 'OQC', 'Back Glass Dirty', 'The dirty looks like black line inside Backglass coating (Material NG)', '2023-01-24', '2023-01-25', '2023.02.01_10.19.19_[SM-S918]_Analyze Report_QOC AQI Inspection_Backglass Dirty_25.01.2023.pdf', 'Finish', '2023.02.01_10.19.19_107.102.39.66', 'MECHA'),
(60, '0201102136', 'Yuki Astika Putrabagia', '2023-W04', 'MECHA', 'SM-S911', 'OQC', 'Rear Camera Dirty', 'Actual defect is Window Camera Dirty. Window Camera Dirty is caused by thick black line inside Windo', '2023-01-24', '2023-01-25', '2023.02.01_10.21.56_[SM-S911]_Analyze Report_QOC AQI Inspection_Rear Camera Dirty_25.01.2023.pdf', 'Finish', '2023.02.01_10.21.56_107.102.39.66', 'MECHA'),
(61, '0201165443', 'Santono', '2023-W04', 'HW', 'SM-A736B', 'PROCESS', 'Sub6_NR_n5 DRX Fail', 'ASSY Case Front OCTA NG\r\nLine antenna RF broken on the Case Front OCTA', '2023-01-23', '2023-01-23', '2023.02.01_16.55.34_TR_INprocess_23.01.2023_A736B_ Sub6_NR_n5 DRX fail.xlsx', 'Finish', '2023.02.01_16.55.34_107.102.39.78', 'PE SOLUTION'),
(62, '0203073219', 'Yuki Astika Putrabagia', '2023-W04', 'MECHA', 'SM-X200', 'OQC', 'LCD Bubble', 'LCD Bubble is caused by Bubble inside inner sheet LCD. It suspected potential occur at Vendor', '2023-01-25', '2023-01-26', '2023.02.03_07.33.46_[SM-X200]_Analyze Report_QOC AQI SHC_LCD Bubble_26.01.2023.pdf', 'Finish', '2023.02.03_07.33.46_107.102.39.66', 'MECHA'),
(63, '0203092325', 'Dita Hapsoro', '2023-W05', 'HW', 'SM-A135F', 'OQC', 'Ghost touch', 'TSP panel NG', '2023-02-02', '2023-02-02', '2023.02.03_09.23.45_TR_OQC_02022023 SM-A135F Ghost Touch.xlsx', 'Finish', '2023.02.03_09.23.45_107.102.39.79', 'PE SOLUTION'),
(64, '0203092652', 'Rifki Zulkarnain', '2023-W04', 'HW', 'SM-A135F', 'OQC', 'Macro camera noise', 'Camera Macro module NG', '2023-01-25', '2023-01-25', '2023.02.03_09.27.17_TR_OQC_25.01.2023_SM-A135F_Rear Camera 4 Noise (Macro).xlsx', 'Finish', '2023.02.03_09.27.17_107.102.39.79', 'PE SOLUTION'),
(65, '0203093101', 'Rifki Zulkarnain', '2023-W04', 'HW', 'SM-X200', 'OQC', 'LCD white spot', 'cant reproduce (NDF)', '2023-01-25', '2023-01-26', '2023.02.03_09.31.20_TR_OQC_26.01.2023_SM-X200_LCD White Spot.xlsx', 'Finish', '2023.02.03_09.31.20_107.102.39.79', 'PE SOLUTION'),
(66, '0203093255', 'Rifki Zulkarnain', '2023-W04', 'HW', 'SM-A042F', 'OQC', 'Rear Camera Black Spot', 'Cant reproduce at lab, seem there are moving particle inside lens.', '2023-01-25', '2023-01-26', '2023.02.03_09.33.14_TR_OQC_26.01.2023_SM-A042F_Rear Camera Black Spot.xlsx', 'Finish', '2023.02.03_09.33.14_107.102.39.79', 'PE SOLUTION'),
(67, '0203093518', 'Dita Hapsoro', '2023-W05', 'HW', 'SM-S918BE', 'OQC', 'SPEN No function', 'Reset signal from WACOM IC abnormal (IC NG)', '2023-01-27', '2023-01-31', '2023.02.03_09.35.42_TR_OQC_31012021 SM-S918B SPEN No Function.xlsx', 'Finish', '2023.02.03_09.35.42_107.102.39.79', 'PE SOLUTION'),
(68, '0203093821', 'Dita Hapsoro', '2023-W05', 'HW', 'SM-S916BE', 'OQC', 'Charging error after ACT', 'suspect system error after ACT, when B/Glass open for more detail analyze, set charging function ok ', '2023-01-30', '2023-01-31', '2023.02.03_09.38.42_TR_OQC_31012021 SM-S916B Charging Error.xlsx', 'Finish', '2023.02.03_09.38.42_107.102.39.79', 'PE SOLUTION'),
(69, '0203094413', 'Rifki Zulkarnain', '2023-W05', 'HW', 'SM-S918BE', 'OQC', 'Front camera blackdot', 'dirty inside camera lens', '2023-01-31', '2023-02-01', '2023.02.03_09.44.30_TR_OQC_01.02.2023_SM-S918B_Front Camera Black Dot.xlsx', 'Finish', '2023.02.03_09.44.30_107.102.39.79', 'PE SOLUTION'),
(70, '0203094542', 'Rifki Zulkarnain', '2023-W05', 'HW', 'SM-A042F', 'OQC', 'Front camera flare', 'camera lens dirty glue (W/M)', '2023-01-31', '2023-02-01', '2023.02.03_09.45.57_TR_OQC_01.02.2023_SM-A042F_Front Camera Flare.xlsx', 'Finish', '2023.02.03_09.45.57_107.102.39.79', 'PE SOLUTION'),
(71, '0203094741', 'Rifki Zulkarnain', '2023-W05', 'HW', 'SM-S918BE', 'OQC', 'Rear camera vertical line', 'Wide camera module NG', '2023-01-30', '2023-01-31', '2023.02.03_09.47.55_TR_OQC_31.01.2023_SM-S918B_Rear Camera Vertical Line.xlsx', 'Finish', '2023.02.03_09.47.55_107.102.39.79', 'PE SOLUTION'),
(72, '0203095159', 'Rifki Zulkarnain', '2023-W05', 'HW', 'SM-S911BE', 'OQC', 'Rear camera no entry', 'NDF (after chamber process, camera can work normally)', '2023-01-30', '2023-02-01', '2023.02.03_09.52.27_TR_OQC_01.02.2023_SM-S911B_Camera No Entry.xlsx', 'Finish', '2023.02.03_09.52.27_107.102.39.79', 'PE SOLUTION'),
(73, '0203095335', 'Dita Hapsoro', '2023-W05', 'HW', 'SM-A042F', 'OQC', 'Flash lamp no function', 'LED NG ', '2023-02-02', '2023-02-02', '2023.02.03_09.53.51_TR_OQC_02022023 SM-A042F Flash Lamp No Function.xlsx', 'Finish', '2023.02.03_09.53.51_107.102.39.79', 'PE SOLUTION'),
(74, '0207103414', 'Rifki Zulkarnain', '2023-W05', 'HW', 'SM-S916BE', 'OQC', 'Rear camera preview noise', 'Assy OLED NG, feedback to SDC', '2023-02-02', '2023-02-03', '2023.02.07_10.43.05_TR_OQC_03.02.2023_SM-S916B_Rear Camera Noise (Abnormal Display).xlsx', 'Finish', '2023.02.07_10.43.05_107.102.39.79', 'PE SOLUTION'),
(75, '0207103454', 'Dita Hapsoro', '2023-W05', 'HW', 'SM-A042F', 'OQC', 'Flash lamp no function', 'Flash LED NG', '2023-02-02', '2023-02-02', '2023.02.07_10.41.36_TR_OQC_02022023 SM-A042F Flash Lamp No Function.xlsx', 'Finish', '2023.02.07_10.41.36_107.102.39.79', 'PE SOLUTION'),
(76, '0207103527', 'Rifki Zulkarnain', '2023-W05', 'HW', 'SM-S918BE', 'OQC', 'Rear camera video noise', 'assy PBA NG, suspect Video block at AP problem --> send to HQ for further analyze (Chang-Yong Shin).', '2023-02-03', '2023-02-07', '', 'Finish', '2023.02.07_10.40.49_107.102.39.79', 'PE SOLUTION'),
(77, '0207103608', 'Rifki Zulkarnain', '2023-W05', 'HW', 'SM-S911BE', 'OQC', 'Rear camera wide no focus', 'Camera wide NG, feedback to Partron', '2023-02-02', '2023-02-03', '2023.02.07_10.39.33_TR_OQC_03.02.2023_SM-S911B_Rear Camera Wide No Focus.xlsx', 'Finish', '2023.02.07_10.39.33_107.102.39.79', 'PE SOLUTION'),
(78, '0207103632', 'Rifki Zulkarnain', '2023-W06', 'HW', 'SM-S918BE', 'OQC', 'No Power', 'after AC AQI, set no power again,\r\nse table to power on using power key+Vol down pressed around 10s ', '2023-02-06', 'N/A', '2023.02.08_08.33.08_TR_OQC_07.02.2023_SM-S918B_No Power.xlsx', 'Progress', '2023.02.10_16.10.21_107.102.39.228', 'PE SOLUTION'),
(79, '0207103720', 'Rifki Zulkarnain', '2023-W06', 'HW', 'SM-S918BE', 'OQC', 'Rear camera preview noise on low light', 'Rear camera 3 (12M) NG.\r\nFeedback to MCNEX', '2023-02-07', '2023-02-07', '2023.02.08_08.40.35_TR_OQC_07.02.2023_SM-S918B_Rear Camera Low Light Noise.xlsx', 'Finish', '2023.02.08_08.40.35_107.102.39.79', 'PE SOLUTION'),
(80, '0207103757', 'Rifki Zulkarnain', '2023-W06', 'HW', 'SM-S916BE', 'OQC', 'No power', 'IC Direct charge overheat -> Direct Charge IC NG', '2023-02-07', '2023-02-10', '2023.02.10_15.27.07_TR_OQC_10.02.2023_SM-S916B_No Power.xlsx', 'Finish', '2023.02.10_15.27.07_107.102.39.79', 'PE SOLUTION'),
(81, '0207154444', 'Rifki Zulkarnain', '2023-W06', 'HW', 'GT-E1215', 'OQC', 'Loopback no function', 'MIC path pattern cut', '2023-02-07', '2023-02-07', '2023.02.08_08.41.27_TR_OQC_07.02.2023_GT-E1215_Loopback NG (No Sound).xlsx', 'Finish', '2023.02.08_08.41.27_107.102.39.79', 'PE SOLUTION'),
(83, '0208151439', 'Rifki Zulkarnain', '2023-W06', 'HW', 'SM-S918BE', 'OQC', 'Camera no Entry', 'Front Camera Module NG', '2023-02-08', '2023-02-10', '2023.02.10_16.09.22_TR_OQC_10.02.2023_SM-S918B_Camera No Entry.xlsx', 'Finish', '2023.02.10_16.09.22_107.102.39.228', 'PE SOLUTION'),
(84, '0208151501', 'Rifki Zulkarnain', '2023-W06', 'HW', 'SM-S918BE', 'OQC', 'LCD Bright dot', 'Assy OLED NG', '2023-02-08', '2023-02-10', '2023.02.10_15.26.02_TR_OQC_10.02.2023_SM-S918B_Display Bright Dot.xlsx', 'Finish', '2023.02.10_15.26.02_107.102.39.79', 'PE SOLUTION'),
(86, '0210075503', 'Santono', '2023-W06', 'HW', 'SM-S916BE', 'OQC', 'Gyroscope sensor fail', 'IC Gyro sensor NG', '2023-02-08', '2023-02-10', '2023.02.10_11.09.11_TR_OQC_10.02.2023_SM-S916B_Gyroscope OIS Sensor Fail.xlsx', 'Finish', '2023.02.10_11.09.11_107.102.39.79', 'PE SOLUTION'),
(87, '0210075601', 'Dita Hapsoro', '2023-W06', 'HW', 'SM-S918BE', 'OQC', 'No Power', 'VPH_PWR short to GND --> IC CAM PMIC NG.', '2023-02-09', '2023-02-13', '2023.02.13_16.28.29_TR_OQC_13022023 SM-S918B No Power.xlsx', 'Finish', '2023.02.13_16.28.29_107.102.39.79', 'PE SOLUTION'),
(88, '0215070043', 'Rifki Zulkarnain', '2023-W07', 'HW', 'SM-A236E', 'OQC', 'Front Camera Fail', 'Assy VT camera NG, feedback to MCNEX', '2023-02-14', '2023-02-14', '2023.02.15_07.01.04_TR_OQC_14.02.2023_SM-A236E_Camera Fail.xlsx', 'Finish', '2023.02.15_07.01.04_107.102.39.79', 'PE SOLUTION');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(100) NOT NULL,
  `part` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `level`, `part`) VALUES
(1, 'Endri Susanto', 'Endri', 'endri.s@samsung.com', 'c81e728d9d4c2f636f067f89cc14862c', 'member', 'PE SOLUTION'),
(7, 'Aulia AM', 'Aulia', 'aulia.am@samsung.com', '217afbdf14895c01f29175b51979bc8c', 'super user', 'PE SOLUTION'),
(8, 'Yuki Astika Putrabagia', 'Yuki A', 'yuki.astika@samsung.com', '2535c90dba3b00b16d845d052f9359e7', 'member', 'MECHA'),
(10, 'Budi Supriatna', 'Budi', 'b.supriatna@samsung.com', 'd287693a28e4fcd1b22aaab29f245994', 'member', 'MECHA'),
(11, 'Rifki Zulkarnain', 'Rifki', 'rifki126@gmail.com', '387b55ea8370ecbaf3dad6590aefacb5', 'member', 'PE SOLUTION'),
(12, 'Teguh Supriatman', 'teguhom', 'teguhom@samsung.com', 'a400c1cb7c2be10318fb8e80f7a2ed52', 'super user', 'MECHA'),
(13, 'Santono', 'Santono', 'santono@samsung.com', '65c17c54834dde66a2ceefa9e02aa0ca', 'member', 'PE SOLUTION'),
(14, 'Dita Hapsoro', 'dita.h', 'dita.h@samsung.com', 'eee46de97813775b64aa456d743ca557', 'member', 'PE SOLUTION'),
(15, 'Rifki Zulkarnain', 'rifki', 'rifki.z@samsung.com', '387b55ea8370ecbaf3dad6590aefacb5', 'member', 'PE SOLUTION');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisa`
--
ALTER TABLE `analisa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisa`
--
ALTER TABLE `analisa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
