# echo only one element from the object
* If object is some thing like that
`stdClass Object ( [id] => 37 [question_id] => 13 [agri_officer_id] => 5 [responded_date_time] => 2023-12-11 19:07:07 [content] => asdasasd ) `
we can identify this is an object from ==stdClass Object== phrase
* Want to get only ***value*** relevant to 'question_id' key here is the way, 
```php
print_r($response->question_id); // Here we are using -> instend of . in js to access elements of objects.
  ```
# echo only one element from the array
* If array is some thing like that
`Array ( [id] => 37 [content] => asdasasd [content_err] => [question_id] => 13 [activeLink] => CultivationQuestions )`
we can identify this is an array from ==Array== key word

* Want to get only value relevant to 'id' index here is the way,
```php
print_r($data['id']);
```