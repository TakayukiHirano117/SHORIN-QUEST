DROP DATABASE shourinzi;
CREATE DATABASE IF NOT EXISTS shourinzi DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE shourinzi;


CREATE USER IF NOT EXISTS 'takayukihirano'@'localhost' IDENTIFIED BY 'Ikusa117';

GRANT ALL ON shourinzi.* TO 'takayukihirano'@'localhost';

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT 'コメントID',
  `topic_id` int(10) NOT NULL COMMENT 'トピックID',
  `answer_id` int(10) NOT NULL COMMENT 'アンサーID',
  `body` varchar(150) DEFAULT NULL COMMENT 'コメント本文',
  `user_id` varchar(10) NOT NULL COMMENT '作成したユーザーID',
  `del_flg` int(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ(1: 削除、0: 有効)',
  `updated_by` varchar(20) NOT NULL DEFAULT 'shourinzi' COMMENT '最終更新者',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最終更新日時'
);

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT 'アンサーID',
  `topic_id` int(10) NOT NULL COMMENT 'トピックID',
  `body` varchar(1000) DEFAULT NULL COMMENT '回答本文',
  `user_id` varchar(10) NOT NULL COMMENT '作成したユーザーID',
  `del_flg` int(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ(1: 削除、0: 有効)',
  -- `evaluation` int(1) NOT NULL DEFAULT '2' COMMENT '評価(2: 回答、1: ベストアンサー、0: その他の回答)',
  `updated_by` varchar(20) NOT NULL DEFAULT 'shourinzi' COMMENT '最終更新者',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最終更新日時'
);

ALTER TABLE shourinzi.answers ADD `title` varchar(100) NOT NULL COMMENT '回答タイトル';



CREATE TABLE `topics` (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT 'トピックID',
  `title` varchar(30) NOT NULL COMMENT 'タイトル',
  `body` varchar(1000) NOT NULL COMMENT '質問内容本文',
  `published` int(1) NOT NULL COMMENT '公開状態(1: 公開、0: 非公開)',
  `reception` int(1) NOT NULL COMMENT '受付状態(1: 受付中、0: 解決済み)',
  `views` int(10) NOT NULL DEFAULT '0' COMMENT 'PV数',
  `responses` int(10) NOT NULL DEFAULT '0' COMMENT '回答数',
  `user_id` varchar(10) NOT NULL COMMENT '作成したユーザーID',
  `del_flg` int(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ(1: 削除、0: 有効)',
  `updated_by` varchar(20) NOT NULL DEFAULT 'shourinzi' COMMENT '最終更新者',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最終更新日時'
);



CREATE TABLE `users` (
  `id` varchar(15) PRIMARY KEY COMMENT 'ユーザーID',
  `pwd` varchar(60) NOT NULL COMMENT 'パスワード',
  `nickname` varchar(20) NOT NULL COMMENT '画面表示用名',
  `del_flg` int(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ(1: 削除、0: 有効)',
  `updated_by` varchar(20) NOT NULL DEFAULT 'shourinzi' COMMENT '最終更新者',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最終更新日時'
);

START TRANSACTION;

SET time_zone = "+09:00";


INSERT INTO `comments` (`id`, `topic_id`, `answer_id`, `body`, `user_id`, `del_flg`) VALUES (1, 1, 1, `それな`, `test`, `0`);


INSERT INTO `answers` (`id`, `topic_id`, `body`, `user_id`, `del_flg`) VALUES (1, 1, `手順を丁寧に覚えましょうね。`, `test`, 0);
-- `evaluation`


INSERT INTO `topics` (`id`, `title`, `body` ,`published`, `reception`, `views`, `responses`, `user_id`, `del_flg`) VALUES
(1, '天地拳5系の正しいやり方', 'わからなくて困っています。誰か助けてください。', 1, 1, 8, 1, 'test', 0);

ALTER TABLE shourinzi.topics ADD `reception` int(1) NOT NULL COMMENT '受付状態(1: 受付中、0: 解決済み)', 

INSERT INTO `users` (`id`, `pwd`, `nickname`, `del_flg`) VALUES
('test', '$2y$10$n.PPvod4ai0r0qpqn5DurenOoxTyRhvef3S7DxoMu5BLRspG5oiBK', 'テストユーザー', 0);

COMMIT;


-- ちょっとミスったので書き直した。実行したのが下のやつ。

CREATE DATABASE IF NOT EXISTS shourinzi DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE shourinzi;

CREATE USER IF NOT EXISTS 'takayukihirano'@'localhost' IDENTIFIED BY 'Ikusa117';

GRANT ALL ON shourinzi.* TO 'takayukihirano'@'localhost';

-- check table mysql.db;

-- repair table mysql.db;

CREATE TABLE `users` (
  `id` varchar(15) PRIMARY KEY COMMENT 'ユーザーID',
  `pwd` varchar(60) NOT NULL COMMENT 'パスワード',
  `nickname` varchar(20) NOT NULL COMMENT '画面表示用名',
  `del_flg` int(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ(1: 削除、0: 有効)',
  `updated_by` varchar(20) NOT NULL DEFAULT 'shourinzi' COMMENT '最終更新者',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最終更新日時'
);

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT 'トピックID',
  `title` varchar(30) NOT NULL COMMENT 'タイトル',
  `body` varchar(1000) NOT NULL COMMENT '質問内容本文',
  `published` int(1) NOT NULL COMMENT '公開状態(1: 公開、0: 非公開)',
  `reception` int(1) NOT NULL COMMENT '受付状態(1: 受付中、0: 解決済み)',
  `views` int(10) NOT NULL DEFAULT '0' COMMENT 'PV数',
  `responses` int(10) NOT NULL DEFAULT '0' COMMENT '回答数',
  `user_id` varchar(10) NOT NULL COMMENT '作成したユーザーID',
  `del_flg` int(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ(1: 削除、0: 有効)',
  `updated_by` varchar(20) NOT NULL DEFAULT 'shourinzi' COMMENT '最終更新者',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最終更新日時'
);

ALTER TABLE shourinzi.topics ADD `reception` int(1) NOT NULL COMMENT '受付状態(1: 受付中、0: 解決済み)';

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT 'アンサーID',
  `topic_id` int(10) NOT NULL COMMENT 'トピックID',
  `body` varchar(1000) DEFAULT NULL COMMENT '回答本文',
  `user_id` varchar(10) NOT NULL COMMENT '作成したユーザーID',
  `del_flg` int(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ(1: 削除、0: 有効)',
  -- `evaluation` int(1) NOT NULL DEFAULT '2' COMMENT '評価(2: 回答、1: ベストアンサー、0: その他の回答)',
  `updated_by` varchar(20) NOT NULL DEFAULT 'shourinzi' COMMENT '最終更新者',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最終更新日時'
);

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT 'コメントID',
  `topic_id` int(10) NOT NULL COMMENT 'トピックID',
  `answer_id` int(10) NOT NULL COMMENT 'アンサーID',
  `body` varchar(150) DEFAULT NULL COMMENT 'コメント本文',
  `user_id` varchar(10) NOT NULL COMMENT '作成したユーザーID',
  `del_flg` int(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ(1: 削除、0: 有効)',
  `updated_by` varchar(20) NOT NULL DEFAULT 'shourinzi' COMMENT '最終更新者',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最終更新日時'
);

START TRANSACTION;

SET time_zone = "+09:00";

INSERT INTO `comments` (`id`, `topic_id`, `answer_id`, `body`, `user_id`, `del_flg`) VALUES (1, 1, 1, 'それな', 'test', 0);


INSERT INTO `answers` (`id`, `topic_id`, `body`, `user_id`, `del_flg`) VALUES (1, 1, '手順を丁寧に覚えましょうね。', 'test', 0);
-- `evaluation`

INSERT INTO `topics` (`id`, `title`, `body` ,`published`, `views`, `responses`, `user_id`, `del_flg`, `reception`) VALUES
(1, '天地拳5系の正しいやり方', 'わからなくて困っています。誰か助けてください。', 1, 8, 0, 'test', 0, 1);


INSERT INTO `users` (`id`, `pwd`, `nickname`, `del_flg`) VALUES
('test', '$2y$10$n.PPvod4ai0r0qpqn5DurenOoxTyRhvef3S7DxoMu5BLRspG5oiBK', 'テストユーザー', 0);

select * from shourinzi.users; 

COMMIT;
