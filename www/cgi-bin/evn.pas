PROGRAM CgiEnv(INPUT, OUTPUT); 
USES Dos;  { Подключение модуля DOS для работы с переменными окружения }

VAR
  RequestMethod, QueryString, ContentLength, UserAgent, Host: STRING;
BEGIN
  { Вывод HTTP-заголовка }
  WRITELN('Content-Type: text/plain');  { Указываем тип контента (обычный текст) }
  WRITELN;

  { Получение значений переменных окружения }
  RequestMethod := GetEnv('REQUEST_METHOD'); { Получение метода HTTP-запроса (GET, POST и т. д.) }
  QueryString   := GetEnv('QUERY_STRING');   { Получение строки запроса (параметры GET) }
  ContentLength := GetEnv('CONTENT_LENGTH'); { Получение длины тела запроса (для POST-запросов) }
  UserAgent     := GetEnv('HTTP_USER_AGENT'); { Получение информации о браузере пользователя }
  Host          := GetEnv('HTTP_HOST'); { Получение домена или IP-адреса сервера }

  WRITELN('REQUEST_METHOD: ', RequestMethod);  
  WRITELN('QUERY_STRING: ', QueryString);     
  WRITELN('CONTENT_LENGTH: ', ContentLength); 
  WRITELN('HTTP_USER_AGENT: ', UserAgent);    
  WRITELN('HTTP_HOST: ', Host);                

END.


