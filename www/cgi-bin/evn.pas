PROGRAM CgiEnv(INPUT, OUTPUT); 
USES Dos;  { ����������� ������ DOS ��� ������ � ����������� ��������� }

VAR
  RequestMethod, QueryString, ContentLength, UserAgent, Host: STRING;
BEGIN
  { ����� HTTP-��������� }
  WRITELN('Content-Type: text/plain');  { ��������� ��� �������� (������� �����) }
  WRITELN;

  { ��������� �������� ���������� ��������� }
  RequestMethod := GetEnv('REQUEST_METHOD'); { ��������� ������ HTTP-������� (GET, POST � �. �.) }
  QueryString   := GetEnv('QUERY_STRING');   { ��������� ������ ������� (��������� GET) }
  ContentLength := GetEnv('CONTENT_LENGTH'); { ��������� ����� ���� ������� (��� POST-��������) }
  UserAgent     := GetEnv('HTTP_USER_AGENT'); { ��������� ���������� � �������� ������������ }
  Host          := GetEnv('HTTP_HOST'); { ��������� ������ ��� IP-������ ������� }

  WRITELN('REQUEST_METHOD: ', RequestMethod);  
  WRITELN('QUERY_STRING: ', QueryString);     
  WRITELN('CONTENT_LENGTH: ', ContentLength); 
  WRITELN('HTTP_USER_AGENT: ', UserAgent);    
  WRITELN('HTTP_HOST: ', Host);                

END.


