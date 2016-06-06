<?php

    $row = array(
        'News_content' => '',
        'From_email' => '',
        'From_name' => '',
        'Subject' => ''
    );
    $errors = array();
    if(!empty($_POST['news'])) {
        foreach ($_POST['news'] as $field => $value) {
            $row[$field] = $value;
        }

        $row['News_content'] = strip_tags($row['News_content']);
        if (empty($row['News_content'])) {
            $errors['News_content'] = "Укажите содержание";
        }

        $row['From_email'] = strip_tags($row['From_email']);
        if (empty($row['From_email'])) {
            $errors['From_email'] = "Укажите email";
        }
        if (!preg_match('/([a-zA-Z\._\-]+@[a-zA-Z\-\._]+)/', $row['From_email'], $regs)) {
            $errors['From_email'] = "Email может содержать только буквы латинского алфавита и знаки \"-\", \"_\",и обязательно \"@\"";
        } elseif ($regs[0] != $row['From_email']) {
            $errors['From_email'] = "Email и знаки \"-\", \"_\",и обязательно \"@\"";
        }

        $row['From_name'] = strip_tags($row['From_name']);
        if (empty($row['From_name'])) {
            $errors['From_name'] = "Укажите свое имя";
        }
        if (!preg_match('/([a-zA-Z]+)/', $row['From_name'], $regs)) {
            $errors['From_name'] = "Имя может содержать только буквы латинского алфавита ";
        } elseif ($regs[0] != $row['From_name']) {
            $errors['From_name'] = "Имя может буквы латинского алфавита";
        }

        $row['Subject'] = strip_tags($row['Subject']);
        if (empty($row['Subject'])) {
            $errors['Subject'] = "Укажите тему";
        }

        if (empty($errors)) {
                $pdo->insertTableRow('News', $row);
                exit();

        }
    }
?>