<?php

function getView($templateName, $vars = array())
{
  $templatePath = TEMPLATE_DIR . "/" . $templateName;
  $content = file_get_contents($templatePath);
  if (!empty($vars))
  {
    foreach ($vars as $placeholder => $value)
    {
      $key = '{$' . $placeholder . "}";
      $content = str_replace($key, $value, $content);
    }
  }
  return $content;
}

function getViewMessage($title, $message, $link, $delay = 5)
{
  echo getView("message.html", array(
      "message_title" => $title,
      "message_text" => $message,
      "link" => $link,
      "delay" => $delay
          )
  );
}

function getViewNavigation($rows_count, $rows_limit = TABLE_LIST_AMOUNT)
{
  $html = "";
  if (($rows_count / $rows_limit) > 1)
  {
    $html .= "<div>";
    $html .= "<a href='?page=0'>|&lt;&lt;</a>";
    for ($i = 0; $i < ceil($rows_count / $rows_limit); $i++)
    {
      $html .= "<a href='?page=$i'>" . ($i + 1) . "</a>";
    }
    $html .= "<a href='?page=" . (ceil($rows_count / $rows_limit) - 1) . "'>&gt;&gt;|</a>";
    $html .= "</div>";
  }
  return $html;
}

function getViewUserList($page, $person, $rows_limit = TABLE_LIST_AMOUNT)
{
  $html = "";
  for ($i = 0; $i < count($person); $i++)
  {
    $html .= getView("user_list_row.html", array(
        "ulr_num" => ($i + 1 + ($page * $rows_limit)),
        "ulr_last_name" => $person[$i][FORM_LAST_NAME],
        "ulr_first_name" => $person[$i][FORM_FIRST_NAME],
        "ulr_sex" => $person[$i][FORM_SEX],
        "ulr_email" => "<a href='user_info.php?id=" . $person[$i]['person_id'] . "'>" . $person[$i][FORM_EMAIL] . "</a>",
        "ulr_birthday" => $person[$i]['day'] . "-" . $person[$i]['month'] . "-" . $person[$i]['year']
    ));
  }
  return $html;
}

function getViewFileList($email, $extension)
{
  $html = "";
  $i = 0;
  foreach (fileGetAll($email, $extension) as $file)
  {
    $html .= getView("file_list_row.html", array(
        "flr_num" => ++$i,
        "flr_id" => $file['file_id'],
        "flr_name" => $file['file_name'],
        "flr_size" => $file['file_size'],
        "flr_uploaded" => $file['uploaded'],
        "flr_user" => $file['last_name'] . " " . $file['first_name'],
        "flr_email" => $file['email'] . "</td>",
        "flr_extension" => $file['extension'],
        "flr_rating" => $file['rating'],
        "user_id" => $_SESSION["user_id"]
    ));
  }
  return $html;
}

function getViewFileListFilter($title, $email = "", $extension = "")
{
  return getView("file_list_filter.html", array(
      "fl_title" => $title,
      "fl_email" => $email,
      "fl_extension" => $extension
          )
  );
}
