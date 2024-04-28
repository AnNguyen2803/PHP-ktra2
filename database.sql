create table taikhoan(
	ID int AUTO_INCREMENT PRIMARY key,
	taikhoan varchar(50) not null,
	matkhau varchar(50) not null,
	quyen int default 0 not null,
	hoatdong int default 0 not null
);

create table danhmuc(
	maloai int AUTO_INCREMENT PRIMARY key,
	tenloai varchar(100) not null
);

create table nhacungcap(
	mancc int AUTO_INCREMENT PRIMARY key,
	tenncc varchar(500) not null
);

create table khuvuc(
	makv int AUTO_INCREMENT PRIMARY key,
	khuvuc varchar(50) not null
);

create table nhanvien (
	manv int AUTO_INCREMENT PRIMARY key,
	tennv varchar(100) not null,
	diachi varchar(200) not null,
	ngaybatdaulam date not null,
	ID_tk int not null,
	constraint fk_ID_tk foreign key (ID_tk) references taikhoan(ID)
);

create table sanpham (
	masp int AUTO_INCREMENT PRIMARY key,
	tensp varchar(100) not null,
	soluongton int not null,
	gianiemyet int not null,
	maloai int not null,
	constraint fk_sp_loai foreign key (maloai) references danhmuc(maloai)
);

create table chitietgiaodich (
	ID int AUTO_INCREMENT,
	mahd varchar(10) not null,
	loai varchar(5) not null,
	soluong int not null,
	dongia int not null,
	ngaygiaodich date not null,
	ghichu varchar (255),
	constraint pk primary key (ID,mahd),
	makv int,
	constraint fk_kv_gd foreign key (makv) references khuvuc(makv),
	manv int,
	constraint fk_nv_gd foreign key (manv) references nhanvien(manv),
	mancc int,
	constraint fk_ncc_gd foreign key (mancc) references nhacungcap(mancc),
	masp int,
	constraint fk_sp_gd foreign key (masp) references sanpham(masp)
);

create table logs (
	logid int AUTO_INCREMENT PRIMARY key,
	TableName varchar(50),
	loaihanhdong varchar(10),
	recordid int,
	oldrecord text,
	newrecord text,
	Timestamp TIMESTAMP default CURRENT_TIMESTAMP
);