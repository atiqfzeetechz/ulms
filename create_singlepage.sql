CREATE TABLE IF NOT EXISTS `singlepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `Text` text,
  `name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `about` text,
  `Image1` varchar(255) DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO singlepage (type, Text, name, mobile_number, about, Image1) VALUES 
('history', 'जागृति हायर सेकेंडरी स्कूल की स्थापना शिक्षा के क्षेत्र में एक नई दिशा देने के लिए की गई थी। यह संस्थान गुणवत्तापूर्ण शिक्षा प्रदान करने के लिए प्रतिबद्ध है।', '', '', '', ''),
('intention', 'हमारा उद्देश्य छात्रों को सर्वोत्तम शिक्षा प्रदान करना और उन्हें भविष्य के लिए तैयार करना है। हम चाहते हैं कि हमारे छात्र न केवल शैक्षणिक रूप से बल्कि नैतिक रूप से भी मजबूत बनें।', 'प्रिंसिपल जी', '9876543210', 'शिक्षा के क्षेत्र में 20 वर्षों का अनुभव', '');