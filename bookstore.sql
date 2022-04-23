-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 23 2022 г., 14:29
-- Версия сервера: 10.3.29-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bookstore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Админ', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `bin`
--

CREATE TABLE `bin` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `bin`
--

INSERT INTO `bin` (`id`, `client_id`, `book_id`) VALUES
(11, 3, 4),
(16, 1, 1),
(18, 1, 13),
(20, 1, 3),
(21, 1, 14),
(24, 2, 3),
(25, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `picture` varchar(2000) NOT NULL,
  `cost` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `picture`, `cost`, `status`, `genre`, `description`, `date`, `count`) VALUES
(1, 'Тонкое искусство пофигизма: Парадоксальный способ жить счастливо', 'Марк Мэнсон', 'https://www.bookcity.kz/upload/Sh/imageCache/4c7/04d/553ca45d9cb734e11d24d0ea7d41e00f.jpg', 4000, 'Бестселлер', 'Литература по саморазвитию', 'Эта книга не уменьшит ваши беды и проблемы. Я даже пытаться не буду. Как видите, я с вами честен. И к величию она не приведет, да и привести не может, поскольку величие - иллюзия ума, целиком надуманная цель и наша личная психологическая Атлантида. Зато научу, как обратить вашу боль в орудие, вашу травму - в силу, а ваши проблемы... в чуть более приятные проблемы. Чем не прогресс?Марк МэнсонО чем книгаСовременное общество пропагандирует культ успеха: будь умнее, богаче, продуктивнее - будь лучше всех. Соцсети изобилуют историями на тему, как какой-то малец придумал приложение и заработал кучу денег, статьями в духе Тысяча и один способ быть счастливым, а фото во френдленте создают впечатление, что окружающие живут лучше и интереснее, чем мы. Однако наша зацикленность на позитиве и успехе лишь напоминает о том, чего мы не достигли, о мечтах, которые не сбылись. Как же стать по-настоящему счастливым? Популярный блогер Марк Мэнсон предлагает свой, оригинальный подход к этому вопросу. Его жизненная философия проста - необходимо научиться искусству пофигизма. Определив то, до чего вам действительно есть дело, нужно уметь наплевать на все второстепенное, забить на трудности, послать к черту чужое мнение и быть готовым взглянуть в лицо неудачам и показать им средний палец.Почему книга достойна прочтения- В своем остроумном бестселлере (№1 на Amazon), через истории жизненных неурядиц, провалов и лаж (как своих, так и известных людей) автор рассказывает, как овладеть тонким искусством пофигизма, зачем нужно быть менее уверенным в себе и что принцип Делайте хоть что-нибудь - отличная мотивация.- Она поможет вам жить легко вопреки всем трудностям, меньше волноваться и получать удовольствие от жизниДля кого эта книгаДля тех, кто пресытился советами, как стать лучше и успешнее, кто действительно хочет перестать циклиться на своих ошибках и начать жить на полную.ОтзывыНеобычно, спорно, оригинально, интересно прочитать.Михаил Лабковский, психолог, автор книги Хочу и будуМарк Мэнсон - смелый парень. Он посягает на главное приобретение всего западного мира - позитив любой ценой. Мэнсон утверждает революционную для поколения Facebook и книжек про личностный рост вещь: история неудач гораздо полезнее для изучения, чем история Стива Джобса и Сергея Брина. Может быть, хотя бы этот автор научит вас расставлять жизненные приоритеты, которые практически никогда не совпадают с приоритетами глянцевых, выдуманных персонажей.Игорь Мальцев, журналистНасчет пофигизма - это лукавство. На деле Марк Мэнсон мечтает, что мы станем осознанными и не превратим XXI век в еще одно столетие эго. Будда, Иисус и Буковски - герои этого протеста против терпимости к самому себе. Прочтение чревато отказом от собственной важности, крушением общепринятых ценностей и исчезновением страха смерти', '2016-09-13', 0),
(3, 'ONE-PUNCH MAN. Книга 8', 'One', 'https://www.bookcity.kz/upload/Sh/imageCache/b3b/1d6/36aadeaa50c36fa57d272652dfc9db0a.jpg', 4200, 'Новинка', 'Графические романы', 'Где все остановилось в предыдущем томе? Шла Супербитва, от геройской удали молнии в воздухе сверкали, а та самая Ассоциация чудовищ намеревалась показать зазнайкам истинное значение слов «унижение» и «боль». Так Сайтаме такие вызовы на один удар… ну, на пару-тройку. Скука, в общем. Не пора ли уже ему самому нанести визит в Ассоциацию чудовищ? Но прежде, как и подобает бойцу, с кем никому не сравниться по силам, Сайтама должен преодолеть очередной приступ хандры. Как вовремя будут к месту наставления Короля (да, того, кто любит играть в симуляторы свиданий и о ком Сайтама знает чуть больше остальных) об истинном предназначении героев. Выдохнули – и в бой снова. Покой от чудовищ только снится. Они уже и клинья к некоторым героям подбивают, а еще и Гаро, кому не дает покоя желание стать самым могущественным злодеем, не успокаивается…', '2020-01-08', 2),
(4, '21 урок для XXI века', 'Юваль Ной Харари', 'https://www.bookcity.kz/upload/Sh/imageCache/8f3/850/fd47d49d82cf735f0815bd3c3fffc80d.jpg', 7600, 'Новинка', 'Эссе', '21 урок для XXI века - третья книга Юваля Харари, автора изданных на 50 языках мира бестселлеров Sapiens. Краткая история человечества и Homo Deus. Краткая история будущего. В ней сорокатрехлетний профессор истории, которого называют самым ярким мыслителем нашего времени, обратился к проблемам сегодняшнего дня. Что происходит в современном мире и каков глубинный смысл этих событий? Почему либеральная демократия переживает кризис? Как быть с эпидемией фейковых новостей? Как не стать рабами компьютерных алгоритмов? Удастся ли предотвратить экологический коллапс? Действительно ли происходит возврат к религии? Как бороться с терроризмом? Будет ли новая мировая война? От того, сумеет ли человечество найти адекватные ответы на вызовы, стоящие перед ним в XXI веке, зависит, будет ли существовать планета Земля и ее обитатели в следующем столетии.', '2018-08-23', 10),
(5, 'Куриный бульон для души. Я решила – смогу! 101 история о женщинах, для которых нет ничего невозможного', 'Эми Ньюмарк', 'https://www.bookcity.kz/upload/Sh/imageCache/b0c/9ce/e4591f166b7a43034169c40c8e82c9ea.jpg', 2150, 'Новинка', 'История из жизни', 'Героини этого сборника танцуют, не дожидаясь, пока закончится дождь.Сталкиваясь с предательством мужчины, учатся забивать гвозди и по-прежнему считают себя желанными. Борются с болезнью с помощью кошек и творчества. А с неуверенностью в себе – с помощью красной помады. Отказываются от головокружительной карьеры ради детей. И все равно потом становятся успешными.Удивительные, ранимые, смелые, они рассказывают, как годами жили внутри очерченных кем-то границ. И как трудно, непривычно и прекрасно оказалось снаружи.', '2019-03-25', 4),
(6, 'Homo Deus: Краткая история завтрашнего дня', 'Юваль Ной Харари', 'https://www.bookcity.kz/upload/Sh/imageCache/a50/4b3/874f26b37767029dba3913704ca73ad5.jpg', 7600, 'Бестселлер', 'Научно-популярная литература', 'В своей первой книге, ставшей всемирной сенсацией «Sapiens. Краткая история человечества», Юваль Харари рассказал, как Человек Разумный пришел к господству над нашей планетой. «Homo Deus» является своего рода продолжением темы — это попытка заглянуть в будущее. Что произойдет, когда Google и Facebook будут лучше, чем мы сами, знать наши вкусы, личные симпатии и политические предпочтения? Что будут делать миллиарды людей, вытесненных компьютерами с рынка труда и образовавших новый, бесполезный класс? Как воспримут религии генную инженерию? Каковы будут последствия перехода полномочий и компетенций от живых людей к сетевым алгоритмам? Что должен предпринять человек, чтобы защитить планету от своей же разрушительной силы?.. Главное сейчас, полагает Харари, — осознать, что мы находимся на перепутье, и понять, куда ведут пути, простирающиеся перед нами. Мы не в силах остановить ход истории, но можем выбрать направление движения.', '2015-09-12', 3),
(7, 'Single lady. Как я сменила статус в вечном поиске на свободна и счастлива', 'Хейл Мэнди', 'https://www.bookcity.kz/upload/Sh/imageCache/60e/0f0/ccaf1295d77174296b557ccd88b2cfbc.jpg', 3400, 'Новинка', 'Литература по саморазвитию', 'Расставшись с парнем после двух лет мучительных отношений, Мэнди решила взять перерыв и насладиться радостями независимой жизни. Но столкнулась с непониманием, сочувствием и комментариями в духе: Не расстраивайся, ты скоро кого-нибудь найдешь. Но почему она непременно должна кого-то найти? Почему должна стыдиться своего одиночества? В этой книге развенчивается миф о трагичной и несчастной одинокой жизни. Как отвечать на вопросы волнующихся за тебя знакомых? Как использовать время расставания, чтобы понять, кто ты и чего хочешь от жизни? Как с удовольствием проводить вечера наедине с собой? Как научиться ценить себя и не соглашаться ни на что, кроме самого лучшего? Мэнди Хейл вдохновила уже 500 000 читателей, попробуйте и вы стать счастливой вне зависимости от статуса отношений.', '2020-03-28', 3),
(8, 'Как стать миллионером на территории СНГ. 10 шагов к успешной жизни', 'Саидмурод Раджабович Давлатов', 'https://cv2.litres.ru/pub/c/elektronnaya-kniga/cover_415/48723022-saidmurod-radzhabovi-kak-stat-millionerom-na-territorii-sng-10-shagov-k-us.jpg', 3300, 'Бестселлер', 'Личные финансы', 'Всего 10 шагов отделяют вас от богатой, изобильной жизни! В этой книге Саидмурод Давлатов представляет пошаговую методику открытия и развития успешного бизнеса. Все его слова подкреплены делом, а советы — проверены реальным опытом. За свою жизнь автор участвовал в 67 бизнесах, и многие из них сейчас процветают. Но часть не оправдала себя, о чем честно рассказывает Саидмурод Давлатов. Именно благодаря тому, что речь идет как о позитивном, так и негативном опыте, книга так ценна — ведь лучше учиться на чужих ошибках, чем совершать собственные.', '2019-12-28', 3),
(9, 'Хочу и буду: Принять себя, полюбить жизнь и стать счастливым', 'Михаил Александрович Лабковский', 'https://cv3.litres.ru/pub/c/elektronnaya-kniga/cover_200/25280333-mihail-labkovskiy-hochu-i-budu-prinyat-sebya-polubit-zhizn-i-stat-schastlivym.jpg', 3800, 'Бестселлер', 'Литература по саморазвитию', 'Психолог Михаил Лабковский абсолютно уверен, что человек может и имеет право быть счастливым и делать только то, что он хочет. Его книга о том, как понять себя, обрести гармонию и научиться радоваться жизни. Автор исследует причины, препятствующие психически здоровому образу жизни: откуда в нас осознанные и бессознательные тревоги, страхи, неумение слушать себя и строить отношения с другими...', '2017-03-21', 0),
(11, 'Из третьего мира в первый: История Сингапура (1965–2000)', 'Ли Куан Ю', 'https://www.bookcity.kz/upload/Sh/imageCache/d52/711/803297c0d9387f477eb7d384e733eaad.jpg', 11300, 'Бестселлер', 'Личные финансы', 'Когда крохотный Сингапур в 1965 году получил независимость, никто не верил, что ему удастся выжить. Каким же образом фактория Великобритании превратилась в процветающую столицу Азиатского региона с лучшим в мире аэропортом, крупнейшей авиалинией, ключевым торговым портом и заняла четвертое место в мире по уровню дохода на душу населения? История «сингапурского чуда» рассказана здесь человеком, который был не просто очевидцем этих драматических событий, но творцом перемен — бывшим премьер-министром страны Ли Куан Ю.', '2013-11-19', 10),
(12, 'Фактор латте. Три секрета финансовой свободы', 'Джон Манн и Дэвид Бах', 'https://www.bookcity.kz/upload/Sh/imageCache/049/931/4cf4919273c366e5c70fefda0fe6307a.jpg', 3100, 'Новинка', 'Личные финансы', 'Откройте для себя три секрета финансовой свободы! Вы с головой погрузитесь в увлекательную историю девушки Зои, которая покажет вам, что вы богаче, чем думаете. Как и многие молодые специалисты, Зои целыми днями работает в компании, которая ей интересна, при этом не зарабатывая достаточно, чтобы оплачивать студенческие кредиты, аренду жилья, и не имея возможности обеспечить себе финансовую подушку. Узнав три секрета финансовой свободы, Зои смогла, не меняя работы, погасить долги и жить богатой жизнью. Все, что нужно было сделать, — несколько простых изменений в повседневной рутине!', '2020-06-26', 0),
(13, 'Бакуман. Книга 9', 'Цугуми Оба', 'https://www.bookcity.kz/upload/Sh/imageCache/f4f/e3e/ce27fdf663df19277cb26a7bee489a0d.jpg', 4200, 'Бестселлер', 'Графические романы', 'В то время как мангаки-ветераны перехватывают инициативу, молодые авторы поддаются панике. Встретившись с Адзума, Сайко вспоминает своего дядю Таро Кавагути, испытывая при этом противоречивые чувства. Но телефонный звонок, прозвучавший в мастерской Муто Асироги, кардинально меняет ситуацию!', '2013-04-27', 1),
(14, 'Токийский гуль. Прошлое', 'Суи Исида', 'https://www.bookcity.kz/upload/Sh/imageCache/78c/623/2b8445bdde6ed2bee885336c9b33f911.jpg', 3900, 'Бестселлер', 'Графические романы', 'Прошлое хранит свои собственные тайны... Потеряв родителей, юные Тока и Аято Кирисима всячески стараются утвердиться в двадцатом районе, ведь среди гулей непозволительно быть слабым. Понимает это и Кадзуити Бандзё – гуль, следующий строгим правилам и старающийся избегать лишних неприятностей. Вот только он влюблен в ненасытную Ридзэ Камисиро, а беды идут за ней по пятам. Жизнь кипит и в мире людей: студентка Академии ККГ Акира Мадо сталкивается с мальчиком, жаждущим отомстить чудовищу-людоеду за смерть отца, а Кэн Канэки пытается ужиться в неприветливой приемной семье, совершенно не подозревая, что ждет его в будущем... В эту книгу вошло шесть новых историй из вселенной Токийского гуля, действие которых разворачивается до основных событий манги.', '2017-10-15', 2),
(15, 'Хороший год', 'Питер Мейл', 'https://www.bookcity.kz/upload/Sh/imageCache/8e4/def/386186e50dd622aed160b80a8757c80c.jpg', 2700, 'Бестселлер', 'Современная зарубежная литература', 'Макс Скиннер, молодой лондонский финансист, в один прекрасный день вынужден уйти с работы. Не успев толком ужаснуться своим невеселым перспективам, Макс получает новый удар судьбы — приходит известие о смерти любимого дядюшки, завещавшего нашему герою дом и виноградник в Провансе. Заняв денег у своего сводного брата, Макс приезжает во Францию улаживать дела, и тут-то и начинаются его настоящие приключения, заставляющие по-новому взглянуть на ценности этого мира. «Хороший год» — это не только забавные зарисовки и путевые заметки, но полнокровный роман, мудрый, остроумный и способный порадовать самых искушенных читателей. В 2006 году режиссер Ридли Скотт снял по роману одноименный фильм с Расселом Кроу в главной роли.', '2014-05-21', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `bron`
--

CREATE TABLE `bron` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `fullname`, `age`, `email`, `password`) VALUES
(1, 'Алишер Арман', 19, 'ali.arman@gmail.com', '123'),
(2, 'Бил Гейтс', 51, 'bil.g@gmail.com', '741'),
(3, 'Харри Кейн', 31, 'harry.k@gmail.com', '789');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `texts` text NOT NULL,
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `client_id`, `book_id`, `texts`, `dates`) VALUES
(15, 2, 1, 'Мне всегда импонировали люди, которые легко справляются с проблемами, несмотря на их сложность. Поэтому книга с таким названием как «Тонкое искусство пофигизма» сразу же привлекла моё внимание. ', '2022-04-23');

-- --------------------------------------------------------

--
-- Структура таблицы `journals`
--

CREATE TABLE `journals` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `publisher` text NOT NULL,
  `url` text NOT NULL,
  `genre` text NOT NULL,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `journals`
--

INSERT INTO `journals` (`id`, `title`, `description`, `date`, `publisher`, `url`, `genre`, `author`) VALUES
(1, 'ELLE', '«Elle» - популярный журнал, который сочетает в себе практичность, роскошь, фантазию и демократизм. На страницах издания вы найдете рассказы о новейших lifestyle-тенденциях, горячие новости из мира моды и красоты, интервью с самыми яркими звездами, а также статьи о психологии современной успешной женщины. Журнал разговаривает с читательницами на одном языке – ничего не навязывая, а давая лишь рекомендации – выбор всегда только за вами.', '2022-03-31', 'ООО \"Хёрст Шкулёв Паблишинг\"', 'http://pressa.ru/media/covers/elle/2022/167160/306-433/cover.png', 'журнал', 'ООО \"Хёрст Шкулёв Паблишинг\"'),
(2, 'FORBES', 'Forbes - самый влиятельный независимый деловой журнал в мире. Forbes имеет доступ к первым лицам компаний, их владельцам, политикам и получает информацию от самых осведомленных источников.\r\nForbes пишет об историях успеха и поражений предпринимателей, новых идеях для бизнеса и инвестиций, публикует авторитетные рейтинги.', '2022-03-24', 'Акционерное общество «АС РУС МЕДИА»', 'http://pressa.ru/media/covers/forbes/2022/166875/306-433/cover.png', 'журнал', 'Акционерное общество «АС РУС МЕДИА»'),
(3, 'Интернаука', 'Научный журнал «Интернаука» издается 4 раза в месяц. Метаданные журнала размещаются на платформе eLIBRARY.RU. Принимаются статьи аспирантов, докторантов, преподавателей, научных сотрудников, студентов и соискателей. Журнал зарегистрирован Федеральной службой по надзору в сфере связи, информационных технологий и массовых коммуникаций (Роскомнадзор)\"', '2022-04-23', 'ООО \"Интернаука\"', 'https://www.internauka.org/media/cache/resize_crop/rc/FwSFEgBG/edition/cover/journal/journal-15%28238%29.png', 'журнал', 'ООО \"Интернаука\"'),
(4, 'Sajid Javid inquiry into gender treatment for children', 'Vulnerable children are wrongly being given gender hormone treatment by the NHS, Sajid Javid believes, as he prepares to launch an urgent inquiry.\n\nThe health secretary thinks the system is “failing children” and is planning an overhaul of how health service staff deal with under-18s who question their gender identity.\n\nJavid is understood to have likened political sensitivities over gender dysphoria to the fears of racism in Rotherham over grooming gangs.                   \n  \nClinics in London, Leeds and Bristol run by the Tavistock & Portman NHS Foundation Trust are England’s only specialist services for children and young people who identify as transgender. Critics have accused the trust of rushing children into life-altering treatment and being too willing to give puberty blockers to young teenagers.\n\nHowever, the Court of Appeal last year upheld the right of the trust to give puberty blockers to under-16s if they are deemed capable of consenting.\n\nHilary Cass, a former president of the Royal College of Paediatrics and Child Health, has been leading a review into NHS gender identity services for children. In interim findings last month, she said children were being affected by a lack of expert agreement about the nature of gender identity problems, a “lottery” of care and long waiting lists.\n\nJavid is said to be particularly alarmed by her finding that some non-specialist staff felt “under pressure to adopt an unquestioning affirmative approach” to transitioning and that other mental health issues were “overshadowed” when gender was raised.\n\n\n', '2022-04-23', 'The New York Times', 'http://lagoda.by/img/10292/54381390_images_7401037476.jpg', 'газет', 'Chris Smyth'),
(5, 'Johnson leadership doubts resurface amid report of fresh Partygate fine at event he attended', 'Boris Johnson is facing deepening peril over the Partygate scandal after a source said a fine had been issued for a second event attended by the prime minister, while senior Conservatives warned he could face a leadership challenge within weeks.\r\n\r\nOn Friday evening, No 10 was forced to deny Johnson had received another fixed penalty notice (FPN) for a “bring your own booze” Downing Street garden party on 20 May 2020.\r\n\r\nIn January, Johnson admitted attending the event – held during the first national lockdown when indoor and outdoor social mixing were banned – for about 25 minutes but claimed he “believed implicitly that this was a work event”. Johnson’s principal private secretary, Martin Reynolds, is said to have invited up to 100 people to the “socially distanced” evening drinks.\r\n\r\nA source told the Guardian that at least one FPN was issued on Friday to a Downing Street official who attended the event. As Johnson finished a two-day trade trip to India on Friday, a spokesperson said he had not received a new fine.\r\n\r\nOn Thursday the Metropolitan police announced it would not provide any updates on FPNs for Downing Street lockdown breaches until after next month’s local elections “due to the restrictions around communicating” ahead of the 5 May vote, though the criminal investigation and issuing of fines could continue.', '2022-04-22', 'The Guardian', 'https://outsignal.com/edit/uploads/page/291/5d582f94a43ec.png', 'газет', 'Aubrey Allegretti and Heather Stewart');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bin`
--
ALTER TABLE `bin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bron`
--
ALTER TABLE `bron`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `bin`
--
ALTER TABLE `bin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `bron`
--
ALTER TABLE `bron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `journals`
--
ALTER TABLE `journals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
