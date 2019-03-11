-- phpMyAdmin SQL Dump
-- version 4.6.5.1deb3+deb.cihar.com~precise.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07/02/2019 às 11:04
-- Versão do servidor: 5.6.36
-- Versão do PHP: 7.1.1-1+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_utdpower`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(4) UNSIGNED ZEROFILL NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_code` varchar(20) DEFAULT NULL,
  `bank_agency` varchar(20) DEFAULT NULL,
  `bank_account` varchar(20) DEFAULT NULL,
  `bank_operation` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `courses`
--

CREATE TABLE `courses` (
  `id_course` int(4) UNSIGNED ZEROFILL NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_date_in` date DEFAULT NULL,
  `course_date_end` date DEFAULT NULL,
  `course_workload` varchar(255) DEFAULT NULL,
  `course_schedule` varchar(255) DEFAULT NULL,
  `course_status` varchar(255) DEFAULT NULL,
  `course_key` varchar(255) DEFAULT NULL,
  `teacher_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `profiles`
--

CREATE TABLE `profiles` (
  `id_profile` int(4) UNSIGNED ZEROFILL NOT NULL,
  `profile_name` varchar(255) DEFAULT NULL,
  `profile_page` varchar(255) DEFAULT NULL,
  `profile_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `students`
--

CREATE TABLE `students` (
  `id_student` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_mother` varchar(255) NOT NULL,
  `student_sex` char(1) DEFAULT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_address` varchar(255) DEFAULT NULL,
  `student_phone` varchar(20) DEFAULT NULL,
  `student_cellphone` varchar(20) DEFAULT NULL,
  `student_naturity` varchar(45) DEFAULT 'Fortaleza',
  `student_nacionality` varchar(45) DEFAULT 'Brasil',
  `student_rg` varchar(25) NOT NULL,
  `student_emissor` varchar(20) DEFAULT NULL,
  `student_cpf` varchar(11) NOT NULL,
  `student_birth` date NOT NULL,
  `student_civil_state` varchar(25) DEFAULT NULL,
  `student_ethinicity` varchar(20) DEFAULT NULL,
  `student_created_in` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `teachers`
--

CREATE TABLE `teachers` (
  `id_teacher` int(4) UNSIGNED ZEROFILL NOT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `teacher_cpf` varchar(255) DEFAULT NULL,
  `teacher_phone` varchar(30) DEFAULT NULL,
  `teacher_cellphone` varchar(30) DEFAULT NULL,
  `teacher_email` varchar(255) DEFAULT NULL,
  `teacher_address` varchar(255) DEFAULT NULL,
  `teacher_birth` date DEFAULT NULL,
  `bank_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `teacher_created_in` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(3) UNSIGNED ZEROFILL NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_cpf` varchar(30) DEFAULT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_cellphone` varchar(255) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_birth` date DEFAULT NULL,
  `user_photo` varchar(255) DEFAULT NULL,
  `user_created_in` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_last_access` timestamp NULL DEFAULT NULL,
  `profile_id` int(4) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Índices de tabela `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Índices de tabela `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id_profile`);

--
-- Índices de tabela `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_student`),
  ADD UNIQUE KEY `student_email` (`student_email`),
  ADD UNIQUE KEY `student_cpf` (`student_cpf`);

--
-- Índices de tabela `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_teacher`),
  ADD UNIQUE KEY `teacher_cpf` (`teacher_cpf`),
  ADD UNIQUE KEY `teacher_email` (`teacher_email`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `user_email` (`user_email`,`user_cpf`),
  ADD KEY `profile_id` (`profile_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id_profile` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `students`
--
ALTER TABLE `students`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id_teacher` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id_teacher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id_bank`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id_profile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
