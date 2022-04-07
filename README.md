# Backend-Lab-ChatPHP
## Задание
Реализовать чат на PHP с возможностью аутентификации 
и отправки сообщений (передача связки “логин-пароль”, 
существующих пользователей хранить в PHP-скрипте). 

Аутентификация производится путем отправки GET запроса 
с логином и паролем в GET-параметрах 
(в случае ошибочной аутентификации выводить сообщение 
об ошибке). Авторизованный пользователь может 
отправлять сообщения (текст сообщения в адресной строке), 
которые сохраняются в json-файле на сервере в формате:
```json 
{messages: [{date, user, message}]}
``` 
Неавторизованный 
пользователь может просматривать список сообщений.

---
## Существующие пользователи
| Логин | Пароль |
| :--- | :--- |
| `dudoser` | 12345 |
| `LosRomka` | 12345 |
| `anonymus` | anonymus |
| `CarManager` | CarManager |

---
## Хочу исповедаться
Признаюсь в следующих грехах:
- За код на PHP.
- Использование метода GET для 
отправки сообщений через поисковую строку.
- Не отдавать через сервер ответ в виде какого-нибудь 
json файла и уже его парсить.
- За выдачу прав json файлу через chmod 777.
- ...

Жду вас на моей исповеди каждый раз когда появляется 
новая лаба по PHP.