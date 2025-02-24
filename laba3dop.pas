PROGRAM laba3dop;
USES
  DOS;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  Query, Param, CurrentKey, CurrentValue: STRING;
  PosStart, PosEnd, EqPos: INTEGER;
BEGIN
  Query := GetEnv('QUERY_STRING'); { �������� QUERY_STRING �� ���������� ��������� }
  GetQueryStringParameter := ''; { �� ��������� ���������� ������ ������ }

  PosStart := 1;
  WHILE PosStart <= LENGTH(Query) DO
  BEGIN
    PosEnd := PosStart;
    
    { ������� ����� �������� ��������� (����������� & ��� ����� ������) }
    WHILE (PosEnd <= LENGTH(Query)) AND (Query[PosEnd] <> '&') DO
      PosEnd := PosEnd + 1;
    
    Param := COPY(Query, PosStart, PosEnd - PosStart); { ��������� �������� }

    { ������� ������� ������� '=' � ��������� }
    EqPos := POS('=', Param);
    IF EqPos > 0 THEN
    BEGIN
      CurrentKey := COPY(Param, 1, EqPos - 1);
      CurrentValue := COPY(Param, EqPos + 1, LENGTH(Param) - EqPos);

      { ���� ���� ��������� � �������, ���������� �������� }
      IF CurrentKey = Key THEN
      BEGIN
        GetQueryStringParameter := CurrentValue;
        EXIT;
      END;
    END;

    PosStart := PosEnd + 1; { ������� � ���������� ��������� }
  END;
END;

BEGIN {WorkWithQueryString}
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}

