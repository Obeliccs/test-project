<?php
$row = array(
    'Subscriber_email' => '');

$errors = array();
if(!empty($_POST['Subscriber']))
{
    foreach($_POST['Subscriber'] as $field => $value)
    {
        $row[$field] = $value;
    }

    $row['Subscriber_email'] = strip_tags($row['Subscriber_email']);
    if(empty($row['customer_email']))
    {
        $errors['Subscriber_email'] = "Укажите email";
    }
    if(!preg_match('/([a-zA-Z\._\-]+@[a-zA-Z\-\._]+)/', $row['Subscriber_email'], $regs))
    {
        $errors['Subscriber_email'] = "Email может содержать только буквы латинского алфавита, цифры и знаки \"-\", \"_\",и обязательно \"@\"";
    }
    elseif($regs[0] != $row['Subscriber_email'])
    {
        $errors['Subscriber_email'] = "Email может содержать только буквы латинского алфавита, цифры и знаки \"-\", \"_\",и обязательно \"@\"";
    }
    $result = $pdo->query("SELECT * FROM Subscriber WHERE email='$row' LIMIT 1;");
    if(count($result) > 0) {
        $errors['From_email'] = "Email уже существует";
    }

    if(empty($errors))
    {
        $pdo->insertTableRow('Subscriber', $row);
        exit();
    }
}
?>