/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE IF NOT EXISTS `board` (
  `keey` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bid` varchar(50) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `writer` varchar(20) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `regtime` varchar(20) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`keey`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

DELETE FROM `board`;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` (`keey`, `bid`, `num`, `writer`, `title`, `content`, `regtime`, `hits`, `img`) VALUES
	(1, 'normal', 1, 'kim', '반려동물 보유세 필요한가?', '시대가 변하면서 가족 형태가 달라지고 있다. 대가족에서 핵가족으로의 변화를 거쳐, 2020년에는 1인 가구가 전체 가구의 31%를 차지하게 되었다. 가족 구성원이 적어지면서 나타난 변화는 반려동물을 보유한 가구의 증가다. 농림축산식품부에서는 2018년을 기준으로, 전국 가구의 29.5%에 해당하는 511만 가구가 반려동물 키우고 있다고 밝혔다. 파악하지 못한 가구를 더하면 그보다 더 많을 것으로 추정된다. 문제는 급증하는 반려동물 가구와 달리, 제도적 준비가 되어 있지 않다는 점이다. 반려동물이 거리에서 타인을 공격하거나 층간 소음을 일으키는 등의 문제는 일상적으로 일어나고 있다. 하지만 형식적인 절차나 권고만 있을 뿐 명확한 조항이나 예방 대책은 미흡하다. 또한, 반려동물 입양이 펫숍이나 지인을 통해 이루어지는 상황이라 현황 파악이 어렵고, 자연히 책임의식도 떨어진다. 유기되는 반려동물은 해마다 증가하고 있는데, 2018년에는 121,077마리에 달했다. 이러한 문제를 해결하기 위하여, 반려동물의 사적 거래를 금지하고 국가에서 관리하는 제도적 준비가 필요하다. 자연히 재원 마련을 위해 반려동물 가구를 대상으로 동물 등록세를 징수해야 하는지가 논란이 되고 있다.', '2021-12-11 21:10:23', 153, 'img/ani.jpg'),
	(2, 'normal', 2, 'kim', '자본주의가 정답인가?', '현재 마르크스에 대해 공부를 하고 있는데,  마르크스의 입장에서는 자본주의에 대해 다음과 같이 보고 있습니다.\r\n\r\n \r\n\r\n1. 빈부격차\r\n\r\n개인 간에는 육체적 정신적 능력이나 교육수준에 의하여 차이가 나게 된다. 하지만 개인간의 노력과는 무관하게\r\n\r\n빚 대물림, 불로소득과 같은 요인에 의해 빈부 격차가 발생하기도 한다. 이로인하여 계급격차간의 갈등이 발생하여 사회통합에 어려움이 발생한다.\r\n\r\n \r\n\r\n2. 물질만능주의가 확산되면서 ‘인간소외’가 대두된다.\r\n\r\n자본주의 사회에서는 개인은 자본 (ex 편의점 주인은 편의점, 개인택시기사는 택시 etc)을 가지고 경제적 이윤을 극대화 하려는 물질적 욕망에 사로잡힌다. 이는 인간이 추구하는 인간다움의 정신을 잃어버리게 하고 의, 식, 주\r\n\r\n같이 기본적인 활동에 제약이 생기게 된다.\r\n\r\n \r\n\r\n이처럼 자본주의사회에 대해 부정적인 인식을 가지고 있는데요, 자본주의에 대해 어떻게 생각하시나요?\r\n\r\n만약 긍정적이거나 부정적이게 생각하신다면 자신의 입장을 적어주신다면 감사하겠습니다.', '2021-12-11 23:18:00', 0, 'img/money.jpg'),
	(3, 'normal', 3, 'kim', '비혼모 출산 허용해야 하나', '2020년 11월 20일, 방송인 사유리는 자신의 유튜브 채널을 통해 출산 소식을 전했다. 이 소식이 이슈가 된 건 사유리가 비혼모이기 때문이다. 현재 자연 임신이 어려운 많은 부부가 인공수정으로 아이를 낳지만, 한국에서는 비혼 여성이 모르는 남성의 정자를 기증받아 인공수정할 수 없다. 법으로 금지된 일은 아니다. 인공수정이라는 기술이 개발된 것이 상대적으로 최근이고, 대부분 기혼자들이 대상이기에 비혼자의 인공수정을 금지할 필요가 없었다. 하지만 대한산부인과학회에서는 2017년 내부지침을 개정하여 비혼여성의 인공수정을 금지했다. “비배우자 간 인공수정 시술은 원칙적으로 법률적 혼인 관계에 있는 부부만을 대상으로 시행한다.”(보조생식술 윤리지침) 일본에서는 비혼여성의 인공수정이 가능하기 때문에 사유리에겐 큰 어려움이 없었을 것이다. 하지만 사유리를 보며 인공수정을 생각하게 된 한국 여성들에겐 방법이 없다. 또한, 보수단체에서는 전통 윤리나 종교 교리를 근거로 비혼여성의 인공수정을 반대하고 있다.', '2021-12-11 23:44:42', 50, 'img/mo.jpg'),
	(4, 'normal', 4, 'kim', '공매도 재개해야 하나?', '공매도는 말 그대로 보유하지 않은 주식을 파는 거래 행위다. 가령, 투자자는 A주식을 금융기관에서 빌린 뒤 10,000원에 판매해서 10,000원의 이익을 얻고, 얼마 후 A주식이 5,000원으로 떨어지면 다시 그 주식을 사서 금융기관에 돌려준다. 이렇게 되면 투자자는 아무것도 없는 상태에서 5,000원의 이익을 얻는 셈이다. 즉, 일반적인 주식 거래와 달리, 공매도는 주가가 떨어져야 이익을 얻는다. 한편, 개인 투자자들은 공매도 폐지를 촉구하고 있다. 청와대 청원도 20만 건을 넘어섰다. 과거에는 개인 투자자가 소수에 불과했지만, 코로나19 이후 ‘동학개미운동’이라고 불리는 주식 열풍이 불면서, 2020년 3월에만 11조1869억 원을 개인들이 매수했다. 그 결과, 코로나19 상황에서도 주식은 반등했다. 이런 흐름에 맞게 금융위원회에서는 2020년 3월 시작하여 2021년 3월 끝나는 공매도 금지 기간을 2021년 5월로 연기했다.\r\n\r\n ', '2021-12-11 23:46:11', 0, 'img/zu.png'),
	(5, 'normal', 5, 'kim', '의대 정원 확대 필요한가?', '정부는 2022년부터 매년 의대 정원을 400명씩 증원하여 10년간 4,000명의 의사를 양성하는 방안을 추진 중이다. 국내 의대 정원은 1994년 3,253명이었지만, 의약분업 파업 사태가 일어난 2000년에 10% 감축했고, 2006년부터는 3,058명을 유지하고 있다. 정부는 공공의료 시스템을 강화하고 국가방역체계를 활성화한다는 목적으로 의대 정원을 확대하기로 했다. 확대되는 인원은 예방의학과, 응급의학과, 기초의학과 같은 공공성이 높은 필수의료 전공에 배분할 계획이다. 그렇게 10년 동안 각 지역을 중심으로 활동할 지역 의사 3,000명과 역학조사관, 중증외상, 소아외과 같은 특수분야 의사 500명과 기초과학, 제약 및 바이오 등 응용 분야 연구인력 500명, 총 5,000명을 확보할 계획이다. 지역 의사의 경우, 지역의사제 특별전형으로 선발하여 장학금을 지급하고, 졸업 후 일정 기간 지역 내 필수의료 기관에 복무하게 된다.', '2021-12-11 23:47:51', 10, 'img/eugu.jpg'),
	(6, 'normal', 6, 'kim', '민식이법은 악법인가', '2019년 당시 9세였던 김민식 군은 스쿨존에서 자동차 사고로 사망했다. 이후 어린이 교통사고를 방지하자는 취지에서 ‘어린이보호구역 내 교통단속 카메라와 방지턱 설치 의무화’와 ‘운전자의 안전의무 위반 시 처벌 강화’를 위한 ‘도로교통법’과 ‘특정범죄 가중처벌 등에 관한 법률 개정안’(특정범죄가중처벌법)이 발의되었고, 2020년 3월 25일부터 시행되었다. 스쿨존에서 모든 차는 30km/h 이하로 운행해야 하고, 신호등이 없는 횡단보도에서는 반드시 일시 정지해야 한다. 사고 예방을 위한 법의 취지와 사고 방지 시설 강화는 누구나 긍정적으로 받아들일 것이다. 하지만 운전자에 대한 과도한 처벌이 현재 논란의 대상이 되고 있다. 가령, 스쿨존에서 어린이를 사망에 이르게 한 경우 무기 또는 3년 이상 징역에 처하고, 어린이가 상해를 입으면 1년 이상 15년 이하의 징역 또는 500만 원 이상 3000만 원 이하 벌금이 부과된다. 아무리 주의해서 운전해도 갑작스레 튀어나온 아이를 막을 순 없기 때문에, 그런 사정을 고려하지 않은 무거운 법이라는 것이 논란의 이유다.', '2021-12-11 23:48:06', 10, 'img/minsik.jpg'),
	(7, 'normal', 7, 'kim', '국회의원 국민소환제 필요한가?', '한국에서 국회의원은 가장 많은 비난을 받는 직업일 것이다. 그럼에도 강력한 특권 때문에 변화의 필요성을 느끼지 못하는 듯 무소불위의 권력을 휘두르고 있다. 당리당략 때문에 민생법안조차 통과시키지 않는 ‘일하지 않는 국회’에 분노한 국민들은 꾸준히 국회의원 국민소환제를 요구하고 있다. 국민소환제란, 일정 수 이상의 국민이 동의할 경우 임기가 만료되기 전에 선거로 뽑은 공직자의 해임을 청구할 수 있는 제도다. 16대 총선에서 열린우리당과 민주노동당이 공약으로 내세운 이후 꾸준히 요청되었지만, 많은 논란을 일으키며 여전히 통과되지 않고 있다. 선출직 고위 공직자인 대통령과 광역단체장은 견제 장치가 있는 반면, 국회의원은 당에 따라 서로를 견제할 뿐 외부의 견제 장치가 없기 때문에 그 필요성에는 많은 사람이 공감한다. 하지만 자율성이 보장되어야 할 국회의원의 의정 활동에 영향을 주고 정치적으로 악용될 수 있기 때문에 반대 여론도 만만치 않다.', '2021-12-11 23:51:19', 1, 'img/guk.jpg'),
	(8, 'normal', 8, 'kim', '장기매매를 합법화해야 하는가?', '장기매매란 금전적 대가를 받고 신체의 일부(모든 장기)를 사고 파는 행위로, 장기등 이식에 관한 법률 제7조(장기등의 매매행위 등 금지), 제11조(장기등의 적출·이식의 금지 등) 위반에 해당한다. 이를 어길 경우 제45조(벌칙)에 따라 2년 이상의 유기징역을 받는 등 무거운 형벌을 받는다. 현재 우리는 돈으로 신체를 사고 파는 행위 자체를 범죄로 규정하고 있으며, 사회에서도 대다수가 비윤리적이라 인식한다. 하지만 장기를 이식받아야 하는 사람이 해마다 계속 증가한다는 점 또한 주목해야 한다. 장기이식을 필요로하는 환자들을 위해 장기기증 운동을 적극적으로 하고 있지만 그 수요를 따라가기 힘들기 때문이다. 전 세계적으로 도처에서 비밀리에 이루어지고 있는 장기매매 제재만이 유일한 답인가.', '2021-12-11 23:52:11', 26, 'img/cucul.jpg'),
	(9, 'yesno', 1, 'kim', '결혼제도 필요한가?', '결혼은 두 사람이 합의하여 새로운 가족을 만드는 법률행위다. 여기서 말하는 결혼이란 대한민국의 법에서 인정하는 최소한의 정의를 의미한다. 넓은 의미에서의 결혼에는 법만이 아니라 사회-문화적, 종교적 요소도 결합되어 있다. 한 남자가 여러 여자와 결혼할 수 있는 일부다처제가 대표적이다. 지금도 사회-문화나 종교의 용인 속에서 일부다처제를 유지하는 사회가 있으며, 우리나라 역시 과거에는 일부다처제를 당연하게 받아들였다. 모두가 존경하는 세종대왕부터가 그런데, 당시에는 자연스러운 일이었기에 이는 비판의 대상이 되지 않는다.', '2021-12-12 00:09:09', 89, 'img/marry.jpg'),
	(10, 'yesno', 2, 'kim', '가상화폐(암호화폐) 규제 필요한가 가상화폐(암호화폐) 규제 필요한가', '가상화폐는 말 그대로 현실이 아닌 가상에 존재하는 화폐를 말한다. 이는 ‘이전 가능한 금전적 가치가 전자적 방법으로 저장되어 발행된 증표 또는 그 증표에 관한 정보’를 의미하는 전자화폐와 유사하면서도 다른 개념으로, 정부가 발행하거나 보증하지 않는다는 점에서 큰 차이를 보인다. 화폐는 각국의 중앙은행에서 독점적으로 발행하여 관리한다. 달러가 세계 통화의 중심인 이유는 그 달러를 발행-관리하는 미국의 힘이 강하기 때문이다. 즉, 화폐는 곧 국가를 의미한다. 반면, 비트코인(Bitcoin)으로 대표되는 가상화폐는 특정 국가에서 발행하지 않고 발행 주체도 없다. 거래 당사자들만이 가상화폐의 주체가 된다. 만약 가상화폐를 거래하는 사람이 늘어나면 그 가치 역시 늘어난다. 논리적으론 달러 이상의 힘을 가질 수도 있는 셈이다. 가령, 기존 화폐시장이나 주식시장에서는 가치가 2배만 올라도 큰 성장이라 말하는데, 비트코인의 경우 무려 1,000배 이상 그 가치가 올랐다. 거래 당사자 및 투자비용이 1,000배 이상 올랐기 때문에 가능한 수치다. 따라서 이 흐름을 타도 많은 투자 및 투기가 이루어지고 있다. 문제는 폭등한 만큼 폭락하는 것 역시 시간문제라는 사실이다. 최근 하루 사이에 52%나 폭락한 가상화폐도 등장했는데, 이 역시 가상화폐이기에 가능한 일이다. 이런 상황에도 대박을 향한 열망에 많은 투자자가 몰려 현재 정부에서는 규제를 검토하고 있다.', '2021-12-12 00:10:04', 3, 'img/bitcoin.jpg'),
	(11, 'yesno', 3, 'kim', '재판 중계, 허용되어야 하는가', '전 국민의 관심이 집중됬던 지난 5월, 박근혜 전 대통령의 첫 재판 방청권 추첨에 525명의 일반인 신청자가 몰려 무려 7.7대 1의 경쟁률을 보였다. 2016년 12월 최순실의 재판 때의 경쟁률인 2.6대 1에 비하여도 그 관심의 정도를 알 수 있다. 2017년 7월 25일 열린 대법관 회의에서 대법원은 높아진 국민의 의식수준과 알권리를 고려하여 ‘법정 방청 및 촬영 등에 관한 규칙’을 개정해 1,2심 재판의 선고 생중계를 허용하기로 했다고 밝혔다. 그동안 법원은 본격적으로 공판과 변론이 시작되면 ‘촬영 등 행위는 공판 또는 변론의 개시 전에 한한다’는 규정에 따라 일체의 녹음, 녹화 중계를 불허해왔다. 이번 조치로 인해 ‘재판장의 허가’가 있으면 선고 중계가 가능하여 국민의 알권리와 재판에 대한 국민의 이해도가 높아질 계기가 마련되었다. 그러나 이에 관한 반대의견도 만만찮다. 중계를 의식한 피고인이나 증인으로 인해 재판의 진행이 왜곡되고, 확정하지 않은 피의 사실이나 보호되어야 할 사생활이 공개되는 등 인권침해의 소지가 다분하다. 적어도 국민의 관심이 높은 재판중계는, 허용되어야 하는가.', '2021-12-12 00:12:43', 2, 'img/zapan.jpg'),
	(12, 'yesno', 4, 'kim', '부정확한 선거여론조사, 필요한가', '프랑스의 대표적인 일간지인 르파리지앵은 2017년1월, 선거와 관련한 여론조사의 의뢰를 중단할 것을 선언했다. 여러 이슈에 관한 유권자의 선택과 의견을 조사하는 것은 계속하되, 선거와 관련한 후보의 지지, 지지율에 관한 조사는 하지 않겠다는 것이다. 실제 국내에서는 지난 20대 총선의 여론조사 결과와 실제 결과의 괴리가 큰 폭으로 나타나 그 신뢰도에 많은 이들이 의문을 표했고, 미대선의 트럼프 당선에 관한 여론조사도 예측과는 크게 빗나간 결과였다. 19대 대선에 관한 지지도 여론조사에서도 어김없이 그 결과에 관한 신뢰와 왜곡의 문제가 계속적으로 제기되는 중이다. 조사기관과 대상에 따라 유력 당선후보들에 관한 결과가 판이한 여론조사 결과 때문이다. 선거때마다 실시되고 발표에 따라 왜곡의 문제가 제기되는 여론조사, 꼭 필요한가.\r\n\r\n ', '2021-12-12 00:13:21', 7, 'img/sanga.jpg'),
	(13, 'free', 1, '1234 ', '동물의 인권도 존중 해야 할까요?', '동물의 인권도 존중 해야 할까요?', '2021-12-12 01:32:10', 0, ''),
	(14, 'free', 2, '1234 ', ' 국내에서 대리모제를 허용해야하나?', ' 국내에서 대리모제를 허용해야하나?', '2021-12-12 01:45:09', 0, ''),
	(15, 'free', 3, '1234 ', '대학입시에서 정시비율을 확대하여야 한다. ', '대학입시에서 정시비율을 확대하여야 한다.\r\n', '2021-12-12 01:45:23', 1, ''),
	(16, '공지사항', 1, 'kim ', '게시판 생성과 공지사항', '게시판 생성과 삭제 \r\n공지사항 작성은 admin만 가능합니다', '2021-12-12 02:09:26', 0, ''),
	(17, 'board', 1, 'kim ', '글작성방법', '글은 어떻게 작성하나요?', '2021-12-12 02:10:13', 1, ''),
	(18, 'free', 4, 'kim ', '123', '124412', '2022-04-13 00:50:05', 1, ''),
	(19, 'free', 5, 'kim ', '57', '56', '2022-04-13 01:04:17', 0, ''),
	(20, 'free', 6, 'kim ', '57', '56', '2022-04-13 01:04:24', 0, ''),
	(21, 'free', 7, 'kim ', '57', '56', '2022-04-13 01:05:03', 0, ''),
	(22, 'normal', 9, '1234 ', 'ol', 'p', '2022-06-09 19:37:55', 0, ''),
	(23, 'normal', 10, '1234 ', 'ol', 'p', '2022-06-09 19:42:21', 0, ''),
	(24, 'normal', 11, '1234 ', '1231231232', '1222', '2022-06-18 23:57:58', 0, 'img/화면 캡처 2022-03-25 072308.jpg'),
	(25, 'normal', 12, '1234 ', '1234', '1234', '2022-06-19 00:01:33', 0, ''),
	(26, 'normal', 13, '1234 ', '1234', '1234\r\n8\r\n8\r\n8\r\n8\r\n0\r\n\r\n8\r\n8\r\n8\r\n8\r\n8\r\n8\r\n8\r\n', '2022-06-19 20:14:54', 2, '');
/*!40000 ALTER TABLE `board` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `board_list` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `board_name` varchar(100) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

DELETE FROM `board_list`;
/*!40000 ALTER TABLE `board_list` DISABLE KEYS */;
INSERT INTO `board_list` (`num`, `board_name`, `date`) VALUES
	(1, '1', NULL),
	(2, 'free자유힌', '2021-11-26 16:32:06'),
	(3, 'yesno시사', '2021-11-30 12:08:16'),
	(4, 'normal전체', '2021-11-30 12:08:16'),
	(5, 'normal정치', '2021-12-10 09:57:35'),
	(6, 'normal경제', '2021-12-10 09:57:48'),
	(7, 'normal사회', '2021-12-10 09:57:53'),
	(8, 'normal문화', '2021-12-10 09:57:59'),
	(9, 'normalIT', '2021-12-10 09:58:09'),
	(10, 'normal역사', '2021-12-10 09:58:18'),
	(11, 'normal철학', '2021-12-10 09:58:23'),
	(12, 'normal스포츠', '2021-12-10 09:58:29'),
	(13, 'board문의사항', '2021-12-10 09:59:00'),
	(14, 'board공지사항', '2021-12-12 01:47:50');
/*!40000 ALTER TABLE `board_list` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `member` (
  `id` varchar(20) NOT NULL,
  `pw` varchar(20) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DELETE FROM `member`;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`id`, `pw`, `name`) VALUES
	('1234', '1234', '1234'),
	('1235', '125', '125'),
	('aaa', 'aaa', 'aaa'),
	('admin', '1234', 'kim');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `rb_s_mbrid` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `site` int(11) NOT NULL DEFAULT 0,
  `id` varchar(50) NOT NULL DEFAULT '',
  `pw` varchar(50) NOT NULL DEFAULT '',
  `code` int(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (`uid`),
  KEY `site` (`site`),
  KEY `id` (`id`),
  KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

DELETE FROM `rb_s_mbrid`;
/*!40000 ALTER TABLE `rb_s_mbrid` DISABLE KEYS */;
INSERT INTO `rb_s_mbrid` (`uid`, `site`, `id`, `pw`, `code`) VALUES
	(1, 0, '123', '123', 1);
/*!40000 ALTER TABLE `rb_s_mbrid` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `reply` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `board` varchar(20) DEFAULT NULL,
  `con_num` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `content` varchar(40) DEFAULT NULL,
  `date` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `yesno` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;

DELETE FROM `reply`;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
INSERT INTO `reply` (`num`, `board`, `con_num`, `name`, `content`, `date`, `yesno`) VALUES
	(80, 'normal', 6, 'admin', 'ㅁㄴㅇㄹ', '2021-12-12 00:01:58', 'mid'),
	(81, 'yesno', 1, 'admin', '제도라는 장치가 이를 더욱 효율적으로 숙고하게 만들어줄 수 있다는 점에서', '2021-12-12 00:15:13', 'yes'),
	(82, 'yesno', 1, 'admin', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2021-12-12 00:28:44', 'no'),
	(83, 'yesno', 1, 'admin', '결혼을 하는것도 않하는 것도 자유이다', '2021-12-12 01:24:17', 'mid'),
	(84, 'board', 1, 'admin', '글 작성 버튼을 클릭하시면 됩니다', '2021-12-12 02:10:33', 'mid'),
	(85, 'yesno', 3, 'admin', '재판을 하는것을 대중에게 공개-한는 것이 당연하다225', '2021-12-12 02:13:51', 'yes'),
	(86, 'normal', 8, 'admin', 'ㅁㄴㅇㄹ', '2021-12-13 21:39:47', 'mid'),
	(87, 'normal', 8, '1234', 'ㅂ1234', '2022-05-27 02:01:09', 'mid');
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `review_table` (
  `user_name` varchar(50) NOT NULL,
  `user_rating` int(11) NOT NULL,
  `user_review` varchar(50) NOT NULL,
  `datetime` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DELETE FROM `review_table`;
/*!40000 ALTER TABLE `review_table` DISABLE KEYS */;
INSERT INTO `review_table` (`user_name`, `user_rating`, `user_review`, `datetime`) VALUES
	('김세혁', 2, 'rr', 1650995002),
	('dsdga', 2, 'asdggas', 1650995102),
	('777', 0, '76676', 1650995233),
	('56', 2, '56', 1650995597),
	('ㅎ', 2, 'ㅎㅍㄹ', 1650996698),
	('ㅁㄹㄴ', 0, 'ㄴㅁㄹ', 1650997409),
	('김세혁', 0, '77', 1651023848);
/*!40000 ALTER TABLE `review_table` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;