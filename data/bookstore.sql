drop SCHEMA if EXISTS bookstore;
create SCHEMA bookstore;
use bookstore;
CREATE TABLE customer (
    id int AUTO_INCREMENT,
    name varchar(40),
    email varchar(50) unique not null,
    phone varchar(20),
    birthdate date,
    registered_at datetime,
    active INT(1) NOT NULL DEFAULT '0',
    password text,
    PRIMARY KEY (id)
);
create TABLE admin(
    id int AUTO_INCREMENT,
    email varchar(50),
    first_name varchar(20) not null,
    last_name varchar(20) not null,
    user_name varchar(30) UNIQUE,
    phone varchar(20),
    birthdate date,
    registered_at datetime,
    password text,
    PRIMARY KEY (id)
);
create TABLE employee(
    id int AUTO_INCREMENT,
    full_name varchar(40),
    work_as varchar(20),
    link_image varchar(100),
    link_facebook varchar(100),
    link_twitter varchar(100),
    link_instagram varchar(100),
    PRIMARY KEY (id)
);

create table categories(
    category varchar(255),
    primary key (category)
);

create TABLE book(
	id int AUTO_INCREMENT,
    name varchar(255) not NULL,
    category varchar(255) not null,
    price int not null,
    description longtext,
    link_image varchar(255),
    published_at date,
    is_bestseller int(1) default '0',
    PRIMARY KEY (id),
    foreign key (category) references categories(category)
    on delete cascade
    on update cascade
);
#One book may have more than 1 author.
CREATE TABLE written_by (
    book_id int,
    author varchar(255),
    PRIMARY key (book_id,author),
    FOREIGN key (book_id) REFERENCES book(id)
    on delete cascade
    on update cascade
);
CREATE table reviewed_by(
    book_id int,
    customer_id int,
    #Number of stars 0-5 quality and price
    quality int,
    price int,
    date_review datetime,
    content longtext,
    PRIMARY KEY (book_id, customer_id, date_review),
    FOREIGN KEY (book_id) REFERENCES book(id)
    on delete cascade
    on update cascade,
    FOREIGN key (customer_id) REFERENCES customer(id)
    on delete cascade
    on update cascade
);
CREATE TABLE shopping_log(
    id int AUTO_INCREMENT,
    customer_id int,
    total_price int,
    created_at datetime,
    PRIMARY KEY (id),
    FOREIGN key (customer_id) REFERENCES customer(id)
);
#shopping log contains books and numbers of each of book.
create table shopping_log_entry(
    log_id int,
    book_id int,
    quantity int,
    PRIMARY key(log_id, book_id),
    FOREIGN key (log_id) REFERENCES shopping_log(id),
    FOREIGN key (book_id) REFERENCES book(id)
);
create table send_email_log(
    id int AUTO_INCREMENT,
    first_name varchar(255),
    last_name varchar(255),
    email varchar(30),
    website varchar(50),
    subject varchar(100),
    message varchar(255),
    created_at datetime,
    PRIMARY KEY (id)
);

create table verification_account(
    email varchar(255),
    hash text,
    primary key (email),
    foreign key (email) references customer(email)
);

create table image_foto(
    book_id int,
    link varchar(255),
    PRIMARY KEY (book_id,link)
);
create table subscribes(
    email varchar(50),
    primary key (email)
);

INSERT INTO employee (full_name, work_as, link_image,link_facebook, link_instagram,link_twitter) VALUES
("Lê Bá Thông", "Co-founder", "/assets/images/about_page/avatar1.gif","https://www.facebook.com/thong.leba.3", "https://www.instagram.com/thongleb/", "https://twitter.com/thong94584917");
INSERT INTO employee (full_name, work_as, link_image,link_facebook,link_instagram,link_twitter) VALUES
("Nguyễn Phi Thông", "Co-founder", "/assets/images/about_page/avatar2.gif","https://www.facebook.com/profile.php?id=100008734362594", "https://www.instagram.com/thongleb/", "https://twitter.com/thong94584917");
INSERT INTO employee (full_name, work_as, link_image,link_facebook,link_instagram,link_twitter ) VALUES
("Đặng Ngọc Tâm", "Manager", "/assets/images/about_page/avatar3.gif","https://www.facebook.com/scotlandyard00", "https://www.instagram.com/dntt_00/", "https://twitter.com/thong94584917");
INSERT INTO employee (full_name, work_as, link_image,link_facebook,link_instagram, link_twitter) VALUES
("Nguyễn Ngọc Thuấn", "Marketer", "/assets/images/about_page/avatar4.gif","https://www.facebook.com/ngocthuan1210", "https://www.instagram.com/dntt_00/", "https://twitter.com/thong94584917");

-- Insert Categories
INSERT INTO categories VALUES("general knowledge");
INSERT INTO categories VALUES("literature");
INSERT INTO categories VALUES("skill");
INSERT INTO categories VALUES("economic");

-- Change type of price in book table
ALTER TABLE book
MODIFY COLUMN price float(6);

-- Insert books

-- General Knowledge
INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Luật Tâm Thức - Giải Mã Ma Trận Vũ Trụ", "general knowledge", 9.7, "Cuốn sách này sẽ giúp bạn thấy rằng những kiến thức của người xưa không hề cao siêu huyền bí mà vô cùng đơn giản và liên quan chặt chẽ tới khoa học hiện đại.Việc của bạn chỉ là đọc với một tâm trí cởi mở để thức tỉnh, vượt qua những rào cản của tâm trí, những niềm tin cố hữu của mình.Nếu con người cứ đóng khung tư duy của mình trong hai trường phái duy vật và duy tâm, chúng ta sẽ mãi mãi không bao giờ có thể giải đáp được những vấn đề lớn lao của nhân loại. Khi đó, chúng ta cũng sẽ không bao giờ hiểu được bản chất của những câu chuyện về tâm linh, cũng như những vấn đề chưa lý giải được của khoa học.", "../../../assets/images/product_page/1.png", "2021-5-1", 0);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Thần Số Học Ứng Dụng", "general knowledge", 8.15, "Mỗi cái tên, mỗi ngày tháng và mỗi con số đều mang những ý nghĩa riêng và có thể giúp bạn hiểu sâu sắc hơn về bản thân, các mối quan hệ và số phận của mình.Bạn có từng băn khoăn khi tình cờ nhìn thấy các dãy số lặp lại như 11:11 hay 444 hay ngày sinh của bạn bè, người thân?Bạn có từng thắc mắc tại sao ngay trong lần gặp đầu tiên có những người mang lại cho bạn cảm giác thân thiết, những người khác lại không?Tất cả những thắc mắc, băn khoăn của bạn sẽ được giải đáp trong cuốn Thần số học ứng dụng.Cuốn sách sẽ cung cấp mọi thứ bạn cần để mài giũa trực giác của mình, hiểu rõ hơn những người xung quanh và thậm chí có thêm tự tin khi đưa ra các quyết định lớn.Thần số học cũng có thể giúp bạn nhìn lại quá khứ. Khi suy ngẫm về các sự kiện của cuộc đời mình và cách chúng diễn ra trong các chu kỳ số, bạn sẽ nhìn nhận rõ ràng hơn về những gì đã xảy ra và nguyên nhân của những điều đó.Biết được những gì bạn sắp phải trải qua trong một năm, tháng hoặc ngày cụ thể giúp bạn điều hướng chu kỳ cuộc sống dễ dàng hơn. Bạn sẽ có thể dự đoán và chuẩn bị cho những thử thách sắp tới cũng như tận dụng các cơ hội tuyệt vời và đầy tiềm năng.", "../../../assets/images/product_page/2.png", "2020-12-1", 0);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Toàn Thư Chiêm Tinh Học Nhập Môn", "general knowledge", 7.2, "Hơn nửa đời người hành nghề chiêm tinh, tôi nhận ra rằng: Ai trong chúng ta đều muốn hiểu rõ hơn chính là bản thân mình. Bạn chắc chắn đã từng tự hỏi “Tôi là ai?”, bạn muốn biết động cơ nào đang thúc đẩy mình, tại sao cảm xúc, trực giác lúc đó của bạn lại mạnh mẽ đến vậy, và những người khác có mặc cảm về bản thân như bạn không. Người ta thường viết thư cho tôi để hỏi rằng “Tôi nên tìm kiếm người đàn ông như thế nào?”, “Tại sao tôi lại bất mãn với công việc của mình vậy?”, hay “Người phụ nữ đang hẹn hò với tôi thuộc cung Song Tử; vậy chúng tôi sẽ hạnh phúc bên nhau chứ?”. Họ hỏi tôi rằng họ sẽ tìm thấy tình yêu đích thực chứ, khi nào thì họ mới vượt qua được sự kiện đau buồn, sợ hãi vừa qua hoặc trút bỏ gánh nặng về những vấn đề của mình. Họ còn hỏi tôi về lựa chọn trong cuộc sống và cách để cảm thấy thỏa mãn hơn nữa. Vì những lý do đó, tôi luôn tin rằng lý do tồn tại của chiêm tinh học là để trả lời những câu hỏi của chúng ta về bản thân.", "../../../assets/images/product_page/3.png", "2020-10-1", 0);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Tam Thế Thư (Bìa cứng)", "general knowledge", 11.3, "Tam thế thư là một danh từ có nguồn gốc xuất phát từ Phật giáo, hay còn có tên gọi khác là Tam Trần, Tam sinh. “Tam thế thư” được tương truyền là một cuốn sách có thể xem được kiếp trước, kiếp này và kiếp sau của bạn. Khởi nguồn từ cuốn kinh “Tam thế nhân quả” của Phật giáo, ý nghĩa to lớn của cuốn sách này không chỉ bao hàm bởi tính lịch sử lâu đời hay sự biến hóa khôn lường mà nó còn là một cuốn “kỳ thư” dự đoán được vận mệnh trong quá khứ, hiện tại và tương lai.“Tam thế thư cổ” là một tác phẩm nổi tiếng trong thời Tam quốc, được Gia Cát Lượng dành thời gian hơn năm năm để hoàn thành. Đây là một bộ sách tướng pháp kinh điển tập trung viết về luật nhân quả tuần hoàn liên tiếp trong ba kiếp người.Ưu điểm của cuốn sách này là tính chính xác cao, dễ hiểu, nội dung phong phú nhiều màu sắc.Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Tuy nhiên tuỳ vào từng loại sản phẩm hoặc phương thức, địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, ...", "../../../assets/images/product_page/4.png", "2020-3-1", 0);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Những Tù Nhân Của Địa Lý", "general knowledge", 6.5, "Khi chúng ta đang vươn tới những vì sao, chính bởi những thách thức đặt ra phía trước mà chúng ta có lẽ sẽ phải chung tay để ứng phó: du hành vào vũ trụ không phải với tư cách người Nga, người Trung Quốc hay người Mỹ, mà là những đại diện của nhân loại. Nhưng cho đến nay, mặc dù đã thoát khỏi sự kìm hãm của trọng lực, chúng ta vẫn đang bị giam giữ trong tâm trí của chính mình, bị giới hạn bởi sự nghi ngờ của mình về ‘kẻ khác’, và do đó bởi cuộc cạnh tranh chính yếu về tài nguyên. Phía trước chúng ta còn cả một chặng đường dài.Người Nga vẫn sẽ lo âu dõi mắt về phía tây, nơi có dải đất vẫn còn là bình nguyên, dễ bị xâm nhập; Ấn Độ và Trung Quốc vẫn sẽ bị cách ngăn bởi dãy Himalaya sừng sững, và địa lý sẽ xác định bản chất của những cuộc xung đột giữa hai nước trong tương lai, bất chấp sự phát triển của công nghệ và quân sự; “Đại gia đình châu Âu” đói khát năng lượng, bị phụ thuộc vào những đường ống dẫn dầu từ Nga, và do đó họ không thực sự có nhiều lựa chọn trên bàn đàm phán; sự suy yếu của Hoa Kỳ trong vị thế một siêu cường số một dường như đã bị thổi phồng quá mức, nếu xét tới những lợi thế địa lý mà nước này đã dày công gây dựng…", "../../../assets/images/product_page/5.png", "2020-12-1", 1);

-- Literature
INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Nhà Giả Kim (Tái Bản 2020)", "literature", 4.29, "Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.Tiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”", "../../../assets/images/product_page/6.png", "2020-4-1", 1);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Bố Già (Mario Puzo)", "literature", 4.8, "Thế giới ngầm được phản ánh trong tiểu thuyết Bố Già là sự gặp gỡ giữa một bên là ý chí cương cường và nền tảng gia tộc chặt chẽ theo truyền thống mafia xứ Sicily với một bên là xã hội Mỹ nhập nhằng đen trắng, mảnh đất màu mỡ cho những cơ hội làm ăn bất chính hứa hẹn những món lợi kếch xù. Trong thế giới ấy, hình tượng Bố Già được tác giả dày công khắc họa đã trở thành bức chân dung bất hủ trong lòng người đọc. Từ một kẻ nhập cư tay trắng đến ông trùm tột đỉnh quyền uy, Don Vito Corleone là con rắn hổ mang thâm trầm, nguy hiểm khiến kẻ thù phải kiềng nể, e dè, nhưng cũng được bạn bè, thân quyến xem như một đấng toàn năng đầy nghĩa khí. Nhân vật trung tâm ấy đồng thời cũng là hiện thân của một pho triết lí rất “đời” được nhào nặn từ vốn sống của hàng chục năm lăn lộn giữa chốn giang hồ bao phen vào sinh ra tử, vì thế mà có ý kiến cho rằng “Bố Già là sự tổng hòa của mọi hiểu biết. Bố Già là đáp án cho mọi câu hỏi”.Với cấu tứ hoàn hảo, cốt truyện không thiếu những pha hành động gay cấn, tình tiết bất ngờ và không khí kình địch đến nghẹt thở, Bố Già xứng đáng là đỉnh cao trong sự nghiệp văn chương của Mario Puzo. Và như một cơ duyên đặc biệt, ngay từ năm 1971-1972, Bố Già đã đến với bạn đọc trong nước qua phong cách chuyển ngữ hào sảng, đậm chất giang hồ của dịch giả Ngọc Thứ Lang. ", "../../../assets/images/product_page/7.png", "2016-7-1", 0);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Hai Số Phận (Bìa Cứng)", "literature", 4.4, "“Hai số phận” không chỉ đơn thuần là một cuốn tiểu thuyết, đây có thể xem là thánh kinh cho những người đọc và suy ngẫm, những ai không dễ dãi, không chấp nhận lối mòn.“Hai số phận” làm rung động mọi trái tim quả cảm, nó có thể làm thay đổi cả cuộc đời bạn. Đọc cuốn sách này, bạn sẽ bị chi phối bởi cá tính của hai nhân vật chính, hoặc bạn là Kane, hoặc sẽ là Abel, không thể nào nhầm lẫn. Và điều đó sẽ khiến bạn thấy được chính mình.Khi bạn yêu thích tác phẩm này, người ta sẽ nhìn ra cá tính và tâm hồn thú vị của bạn!“Nếu có giải thưởng Nobel về khả năng kể chuyện, giải thưởng đó chắc chắn sẽ thuộc về Archer.” - Daily Telegraph.“Hai số phận” (Kane & Abel) là câu chuyện về hai người đàn ông đi tìm vinh quang. William Kane là con một triệu phú nổi tiếng trên đất Mỹ, lớn lên trong nhung lụa của thế giới thượng lưu. Wladek Koskiewicz là đứa trẻ không rõ xuất thân, được gia đình người bẫy thú nhặt về nuôi. Một người được ấn định để trở thành chủ ngân hàng khi lớn lên, người kia nhập cư vào Mỹ cùng đoàn người nghèo khổ. ", "../../../assets/images/product_page/8.png", "2018-1-1", 0);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Tam Quốc Diễn Nghĩa (Trọn Bộ 3 Tập)", "literature", 11.6, "Tam quốc diễn nghĩa là một trong “Tứ đại danh tác” hay “Tứ đại kỳ thư”của nền văn học cổ Trung Quốc. Cho đến nay Tam quốc diễn nghĩa đã trở thành danh tác thế giới bởi số lượng bản dịch và tầm phổ biến rộng khắp.Trong suốt 120 hồi, ngòi bút của nhà văn La Quán Trung đã làm sống lại được cả một thời kì hỗn loạn khoảng 100 năm trong lịch sử Trung Quốc: Vua quan ngu muội tàn bạo, nhân dân khổ cực trăm bề. Tác giả đã nói lên lòng tha thiết của nhân dân mong muốn được sống một cuộc đời hạnh phúc thanh bình, thống nhất, đồng thời đã dựng lên được những nhân vật lịch sử điển hình của thời đại như Lưu Bị, Quan Công, Trương Phi, Gia Cát Lượng, Tào Tháo, Đổng Trác, Tôn Quyền, Chu Du.Lời văn Tam quốc giản dị sáng sủa. Những cảnh tuyết ở Ngọa Long Cương, nước ở Đàn Khê, lửa ở Xích Bích, khói ở Hoa Dung đều được vẽ thành những bức tranh tuyệt diệu.", "../../../assets/images/product_page/9.png", "2020-12-1", 1);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Những Người Khốn Khổ (Boxet 2 Tập)", "literature", 18.4, "Những người khốn khổ là một tác phẩm chứa chan tinh thần lãng mạn cách mạng. Những nhân vật chính diện đều sáng ngời đức hào hiệp, hy sinh. Tác phẩm ghi lại những nét hiện thực về xã hội Pháp vào khoảng 1830. Cái xã hội tư sản tàn bạo được phản ánh trong những nhân vật phản diện như Javert, Thénardier. Tình trạng cùng khổ của người dân lao động cũng được mô tả bằng những cảnh thương tâm của một người cố nông sau trở thành tù phạm, một người mẹ, một đứa trẻ sống trong cảnh khủng khiếp của cuộc đời tối tăm, ngạt thở. Dưới ngòi bút của Hugo, Paris ngày cách mạng 1832 đã sống dậy, tưng bừng, anh dũng, một Paris nghèo khổ nhưng thiết tha yêu tự do.", "../../../assets/images/product_page/10.png", "2021-4-1", 1);

-- Skill
INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Sapiens: Lược Sử Loài Người (Tái Bản Có Chỉnh Sửa)", "skill", 7.39, "Sapiens tập trung vào các quá trình quan trọng đã định hình loài người và thế giới quanh nó, chẳng hạn như sự ra đời của sản xuất nông nghiệp, việc tạo ra tiền, sự lan truyền của những tôn giáo, và sự nổi lên của những nhà nước quốc gia. Không giống như những quyển sách khác cùng loại, Sapiens đã có một lối tiếp cận liên ngành học, bắc cầu qua những khoảng cách giữa lịch sử, sinh học, triết học và kinh tế theo một lối trước đây chưa từng có. Hơn nữa, lấy cả quan điểm vĩ mô và vi mô, Sapiens không chỉ đề cập đến những gì đã xảy ra và tại sao, mà còn đi sâu vào việc những cá nhân trong lịch sử đó đã cảm nhận nó như thế nào.
Câu hỏi lớn và sâu sắc của Harari là: chúng ta thực sự muốn gì? Có cách nào để đạt được hạnh phúc cho con người chúng ta, hoặc thậm chí liệu chúng ta có biết được nó là gì hay không? Trong cốt lõi của nó, Sapiens biện luận rằng chúng ta không biết về bản thân chúng ta, huống chi biết được những nhu cầu của những loài sinh vật khác. Chúng ta đã quá thường xuyên bị những tưởng tượng hư cấu của chúng ta lừa dối. Lịch sử cũng là một hư cấu, nhưng một hư cấu đã được kiềm chế bởi thực tại và biện luận: một hình thức của huyền thoại – một hư cấu hữu ích – khiến nó có thể mang lại sự giác ngộ của sự tự biết chính mình.", "../../../assets/images/product_page/11.png", "2017-11-1", 1);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Đắc Nhân Tâm (Bìa Cứng) - Tái Bản", "skill", 2.89, "Đắc nhân tâm của Dale Carnegie là quyển sách duy nhất về thể loại self-help liên tục đứng đầu danh mục sách bán chạy nhất (best-selling Books) do báo The New York Times bình chọn suốt 10 năm liền. Được xuất bản năm 1936, với số lượng bán ra hơn 15 triệu bản, tính đến nay, sách đã được dịch ra ở hầu hết các ngôn ngữ, trong đó có cả Việt Nam, và đã nhận được sự đón tiếp nhiệt tình của đọc giả ở hầu hết các quốc gia.
Là quyển sách đầu tiên có ảnh hưởng làm thay đổi cuộc đời của hàng triệu người trên thế giới, Đắc Nhân Tâm là cuốn sách đem lại những giá trị tuyệt vời cho người đọc, bao gồm những lời khuyên cực kì bổ ích về cách ứng xử trong cuộc sống hàng ngày. Sức lan toả của quyển sách vô cùng rộng lớn – với nhiều tầng lớp, đối tượng.
Đắc Nhân Tâm không chỉ là là nghệ thuật thu phục lòng người, Đắc Nhân Tâm còn đem lại cho độc giả góc nhìn, suy nghĩ sâu sắc về việc giao tiếp ứng xử.
Triết lý của Đắc Nhân Tâm là hiểu mình, thành thật với chính mình, từ đó hiểu biết và quan tâm đến những người xung quanh để nhìn ra và khơi gợi những tiềm năng ẩn khuất nơi họ, giúp họ phát triển lên một tầm cao mới. Đây chính là nghệ thuật cao nhất về con người và chính là ý nghĩa sâu sắc nhất đúc kết từ những nguyên tắc vàng của Dale Carnegie.", "../../../assets/images/product_page/12.png", "2016-10-1", 0);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Tứ Đại Quyền Lực", "skill", 6.19, "Vạch trần bản chất kinh doanh của bốn doanh nghiệp đang ảnh hưởng rất lớn đến đời sống con người nhưng Tứ Đại Quyền lực của Scott Galloway không gây hoang mang cho người đọc. Cuộc trò chuyện ông với độc giả đầy giá trị khi ông cùng người đọc nhìn vào bản thân mình, xem những tính chất nghề nghiệp nào giúp chúng ta tồn tại và có thể hưởng lợi trong kỷ nguyên của bộ tứ quyền lực này. Như lời vị doanh nhân nổi tiếng Calvin McDonald, CEO của Sephora, Scott Galloway thành thật và táo bạo đến tàn nhẫn nhưng cuốn sách này sẽ buộc bạn thay đổi cách nghĩ của mình.", "../../../assets/images/product_page/13.png", "2018-3-1", 0);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Truyện Kể Hằng Đêm Dành Cho Các Cô Bé Cá Tính", "skill", 8.49, "Truyện kể hằng đêm dành cho các cô bé cá tính là những câu chuyện cổ tích thời hiện đại về 100 người phụ nữ xuất chúng truyền cảm hứng, từ Elizabeth Đệ Nhất tới “nữ hoàng quần vợt” Serena Williams. Với minh họa của 60 nữ họa sĩ từ mọi nơi trên địa cầu, đây là dự án gây quỹ làm sách lớn nhất từng có.
Cuốn sách gối đầu giường không thể thiếu của mọi cô bé và các thiếu nữ. - Geri Stengel, Forbes
Những câu chuyện kể trước giờ đi ngủ các bậc phụ huynh cần đọc cho con gái nghe. - Hollee Actman Becker, tạp chí Parents
Nhân vật chính trong các câu chuyện này không phải công chúa mà là những người phụ nữ đã thay đổi thế giới. - Taylor Pittman, The Huffington Post
Các độc giả nhí đọc cuốn sách này vào giờ đi ngủ chắn chắn sẽ có những giấc mơ lớn lao giàu cảm hứng. - Fiona Noble, The Guardian
Cuốn truyện kể trước giờ đi ngủ tuyệt nhất trên đời. - Caroline Siegrist, Cool Mom Picks", "../../../assets/images/product_page/14.png", "2018-1-1", 0);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Thế Giới 50 Sắc Thái", "skill", 5.49, "Bằng chính giọng kể của Christian với những suy tư, phán xét và ước mơ, E. L. James đem đến cho người đọc cái nhìn rất đỗi mới mẻ về câu chuyện tình yêu khiến hàng triệu độc giả trên toàn thế giới mê đắm.
CHRISTIAN GREY muốn kiểm soát mọi thứ; thế giới của anh luôn trật tự, khuôn phép nhưng hoàn toàn trống rỗng - cho đến một ngày, Anastasia Steele nhẹ nhàng bước vào văn phòng anh, đôi cánh tay thon thả ngượng ngùng đan vào mái tóc nâu bồng bềnh. Anh cố dằn lòng để quên cô, nhưng lại bị cuốn vào cơn bão cảm xúc mà anh không tài nào hiểu nổi và cũng không thể cưỡng lại được. Ana không giống với bất kỳ người phụ nữ nào anh từng biết - một cô gái nhút nhát, trong sáng, không vương chút trần tục. Cô dường như cũng nhìn thấu tâm can anh - một Christian quyền lực và thành đạt, có lối sống vô cùng xa hoa nhưng trái tim lạnh lùng, đầy thương tổn.", "../../../assets/images/product_page/15.png", "2015-10-1", 0);

-- Economic
INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Nhà Đầu Tư Thông Minh (Tái Bản 2020)", "economic", 6.99, "Là nhà tư vấn đầu tư vĩ đại nhất của thế kỷ 20, Benjamin Graham đã giảng dạy và truyền cảm hứng cho nhiều người trên khắp thế giới. Triết lý “đầu tư theo giá trị“ của Graham, bảo vệ nhà đầu tư khỏi những sai lầm lớn và dạy anh ta phát triển các chiến lược dài hạn, đã khiến Nhà đầu tư thông minh trở thành cẩm nang của thị trường chứng khoán kể từ lần xuất bản đầu tiên vào năm 1949.
Trải qua năm tháng, diễn biến thị trường đã chứng minh tính sáng suốt trong các chiến lược của Graham. Trong khi vẫn giữ lại toàn vẹn văn bản ban đầu của Graham, ấn phẩm tái bản này bổ sung thêm bình luận cập nhật của ký giả chuyên về tài chính nổi tiếng Jason Zweig. Cái nhìn của Zweig bao quát hiện thực của thị trường ngày nay, vạch ra sự tương tự giữa những ví dụ của Graham và các tít báo về tài chính hiện nay, giúp bạn đọc có sự hiểu biết kỹ lưỡng hơn về cách thức áp dụng các nguyên tắc của Graham.", "../../../assets/images/product_page/16.png", "2018-8-1", 1);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Combo Dạy Con Làm Giàu (Trọn Bộ 13 Tập)", "economic", 39.49, "Nếu bạn muốn tự kiếm một con đường làm giàu cho riêng mình hơn là đi tìm một con đường bằng phẳng, trơn tru để làm già
Nếu bạn là những người muốn học hỏi về đầu tư để bước vào một thế giới của 10% người giàu kiểm soát 90% của cải của cả thế giớ thì đây là cuốn sách dành cho bạn.
Cuốn sách này sẽ cho bạn ý thức rõ sự đối lập khác nhau trong suy nghĩ lập luận giữa người đầu tư trung bình và nhà đầu tư giàu có. Nhà đầu tư giàu có luôn ý thức rõ về hai mặt của mỗi đồng tiền. Trong khi đó, người đầu tư trung bình chỉ lo nhìn có một mặt của đồng tiền mà thôi. Thế nhưng chính mặt đồng tiền mà người đầu tư trung bình không thấy đã kìm hãm họ không bao giờ giàu lên được, trong khi nhờ nó mà người kia lại càng giàu hơn.
Ngoài ra, cuốn sách không chỉ nói về đầu tư, những mách nước, hay những bí quyết làm giàu. Một trong những mục đích chính của cuốn sách là tạo cơ hội cho bạn có được một các nhìn khác về đầu tư.
Tác giả cuốn sách đã từng nhận thấy sự khác nhau giữa người cha nghèo và người cha giàu còn sâu sắc hơn cả số tiền mà mỗi người bố có thể đầu tư. Sự khác nhau đó chính là khao khát mãnh liệt vượt xa hơn cấp bậc đầu tư trung bình. Nếu bạn có niềm khao khát đam mê đó thì hãy bắt đầu với những trang sách.", "../../../assets/images/product_page/17.png", "2020-1-1", 1);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("90-20-30 90 Bài Học Vỡ Lòng Về Ý Tưởng Và Câu Chữ", "economic", 6.79, "Đúc kết những kinh nghiệm xương máu trong suốt 9 năm hành nghề Copywriter, 90 - 20 - 30 - 90 bài học vỡ lòng về ý tưởng và câu chữ của tác giả Huỳnh Vĩnh Sơn sẽ giúp bạn bật ra-đa sáng tạo, nắm bắt cuộc sống màu sắc và đa chiều hơn, ý thức hơn về tổ chức câu chữ, làm tiền đề cho việc chơi chữ, viết thông điệp, sáng tạo slogan cho thương hiệu.
NGÀNH QUẢNG CÁO QUÁ MAY MẮN. Lúc nào cũng lung linh trong mắt các bạn trẻ yêu sáng tạo. Ai cũng muốn ra trường sẽ hiến bộ não đầy ắp ý tưởng cho một công ty quảng cáo chất chơi nào đó.
Nhưng dẫu có được chuẩn bị kĩ càng, giáo trình quốc tế 5 sao đi nữa thì nàng (Quảng) Cáo lúc nào cũng kiêu kì. Ở trường thì học hành, vào công ty thì vừa hành vừa học. Để có ý tưởng và câu chữ xài được, các “mầm non sáng tạo” phải va chạm liên tục và tự mình vỡ lấy những bài học, càng nhanh càng tốt, không được để deadline qua mặt.", "../../../assets/images/product_page/18.png", "2021-3-1", 0);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("How Money Works - Hiểu Hết Về Tiền", "economic", 9.99, "Cẩm nang giới thiệu đơn giản, dễ hình dung nhất từ trước đến nay về tiền tệ và hệ thống tài chính thế giới.
Tiền đến từ đâu? Sự khác biệt giữa giàu có và thu nhập là gì? Các chính phủ kiểm soát tiền tệ như thế nào? Tại sao một khoản nợ lại là tốt?
How money works – Hiểu hết về tiền tìm hiểu cách thức các chính phủ kiểm soát tiền tệ, cách các công ty kiếm ra tiền, cách các thị trường tài chính vận hành, cách các cá nhân tối đa hóa thu nhập thông qua đầu tư…
Đưa ra định nghĩa cho hàng trăm khái niệm, cùng với những kiến thức nền tảng nhất về các hệ thống tài chính, như trái phiếu, cổ phiếu, tiền mã hóa, bitcoin, quản lý nợ, tránh vỡ nợ trực tuyến và gọi vốn cộng đồng, cũng như cách tiền vận hành thế giới.", "../../../assets/images/product_page/19.png", "2019-1-1", 0);

INSERT INTO book (name, category, price, description, link_image, published_at, is_bestseller)
VALUES ("Bộ Sách Triệu Phú", "economic", 28.49, "Chuyện gì sẽ xảy ra nếu tôi nói rằng khoản đầu tư khôn ngoan nhất mà cả đời bạn thực hiện chính là đầu tư một căn nhà?
Chuyện gì sẽ xảy ra nếu tôi nói rằng phương pháp bạn chọn mua nhà sẽ quyết định liệu bạn có trở nên giàu có hay không?
Chuyện gì sẽ xảy ra nếu tôi nói rằng có một phương pháp cực kỳ đơn giản có thể giúp bạn trở nên giàu có nhờ việc làm chủ nhà đất?
Chuyện gì sẽ xảy ra nếu tôi nói rằng phương pháp này nằm trong chính cuốn sách Triệu phú bất động sản tự thân – và bạn hoàn toàn có thể học cách trở thành triệu phú?
Bạn hứng thú chứ? Bạn sẵn lòng dành thời gian với tôi không? Bạn có thật sự muốn trở thành triệu phú bất động sản không?", "../../../assets/images/product_page/20.png", "2018-10-1", 0);

-- insert image_foto

INSERT INTO image_foto (book_id,link) VALUES (1,"../../../assets/images/detail_book_page/1/1.jpeg");
INSERT INTO image_foto (book_id,link) VALUES (1,"../../../assets/images/detail_book_page/1/2.jpeg");
INSERT INTO image_foto (book_id,link) VALUES (1,"../../../assets/images/detail_book_page/1/3.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (2,"../../../assets/images/detail_book_page/2/1.jpeg");
INSERT INTO image_foto (book_id,link) VALUES (2,"../../../assets/images/detail_book_page/2/2.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (3,"../../../assets/images/detail_book_page/3/1.jpeg");
INSERT INTO image_foto (book_id,link) VALUES (3,"../../../assets/images/detail_book_page/3/2.png");

INSERT INTO image_foto (book_id,link) VALUES (4,"../../../assets/images/detail_book_page/4/1.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (5,"../../../assets/images/detail_book_page/5.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (6,"../../../assets/images/detail_book_page/6.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (7,"../../../assets/images/detail_book_page/7.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (8,"../../../assets/images/detail_book_page/8.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (9,"../../../assets/images/detail_book_page/9.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (10,"../../../assets/images/detail_book_page/10.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (11,"../../../assets/images/detail_book_page/11.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (12,"../../../assets/images/detail_book_page/12.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (13,"../../../assets/images/detail_book_page/13.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (14,"../../../assets/images/detail_book_page/14.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (15,"../../../assets/images/detail_book_page/15.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (16,"../../../assets/images/detail_book_page/16.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (17,"../../../assets/images/detail_book_page/17.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (18,"../../../assets/images/detail_book_page/18.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (19,"../../../assets/images/detail_book_page/19.jpeg");

INSERT INTO image_foto (book_id,link) VALUES (20,"../../../assets/images/detail_book_page/20.jpeg");


