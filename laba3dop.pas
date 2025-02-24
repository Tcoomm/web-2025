PROGRAM laba3dop;
USES
  DOS;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  Query, Param, CurrentKey, CurrentValue: STRING;
  PosStart, PosEnd, EqPos: INTEGER;
BEGIN
  Query := GetEnv('QUERY_STRING'); { Получаем QUERY_STRING из переменных окружения }
  GetQueryStringParameter := ''; { По умолчанию возвращаем пустую строку }

  PosStart := 1;
  WHILE PosStart <= LENGTH(Query) DO
  BEGIN
    PosEnd := PosStart;
    
    { Находим конец текущего параметра (разделяется & или конец строки) }
    WHILE (PosEnd <= LENGTH(Query)) AND (Query[PosEnd] <> '&') DO
      PosEnd := PosEnd + 1;
    
    Param := COPY(Query, PosStart, PosEnd - PosStart); { Извлекаем параметр }

    { Находим позицию символа '=' в параметре }
    EqPos := POS('=', Param);
    IF EqPos > 0 THEN
    BEGIN
      CurrentKey := COPY(Param, 1, EqPos - 1);
      CurrentValue := COPY(Param, EqPos + 1, LENGTH(Param) - EqPos);

      { Если ключ совпадает с искомым, возвращаем значение }
      IF CurrentKey = Key THEN
      BEGIN
        GetQueryStringParameter := CurrentValue;
        EXIT;
      END;
    END;

    PosStart := PosEnd + 1; { Переход к следующему параметру }
  END;
END;

BEGIN {WorkWithQueryString}
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}

