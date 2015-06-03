
import org.w3c.dom.Document;
import org.xml.sax.InputSource;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.soap.SOAPConnectionFactory;
import javax.xml.soap.SOAPConnection;
import javax.xml.soap.SOAPException;
import javax.xml.soap.SOAPMessage;
import java.io.*;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;


public class MySoap {

    private SOAPConnection connection;


    public SOAPConnection getConnection() {
        this.connection = new SOAPConnection() {
            @Override
            public SOAPMessage call(SOAPMessage request, Object to) throws SOAPException {
                return null;
            }

            @Override
            public void close() throws SOAPException {

            }
        };
        try {

            //Сначала создаем соединение
            SOAPConnectionFactory soapConnFactory =
                    SOAPConnectionFactory.newInstance();
            this.connection =
                    soapConnFactory.createConnection();


        } catch(Exception e) {
            System.out.println(e.getMessage());
        }
        return this.connection;
    }


    public void getSoapData() {

    }

    public String setSoapData(ArrayList<String> params) throws Exception {

        String xmlDataStr = new String();
        DateFormat dateDay = new SimpleDateFormat("yyyy-MM-dd");
        DateFormat dateSec = new SimpleDateFormat("HH:mm:ss.mss");
        Date date1 = new Date();
        Date date2 = new Date();
        String dat = dateDay.format(date1)+"T"+dateSec.format(date2);
        xmlDataStr += this.setHeaderSoapData(dat);
        xmlDataStr += "<ns8:Message>\n" +
                "                        <ns8:Header from_foiv_id=\"MVDR01001\" from_foiv_name=\"МВД России\" from_system=\"АИС ФМС\"\n" +
                "                                    from_system_id=\"3\" msg_type=\"REQUEST\" msg_vid=\"EXPERIENCE1\" to_foiv_id=\"MVDR01001\"\n" +
                "                                    to_foiv_name=\"МВД России\" to_system=\"АИС МВД\" to_system_id=\"8\" version=\"1.1\">\n" +
                "                            <ns8:InitialRegNumber regtime=\""+dat+"\">6063424415381\n" +
                "                            </ns8:InitialRegNumber>\n" +
                "                            <ns8:Service code=\"3\" name=\"experiance\" />\n" +
                "                            <ns8:Reason>12345678911</ns8:Reason>\n" +
                "                            <ns8:Originator code=\"MVDR01001\" fio=\"" + params.get(0) + "\"\n" +
                "                                            name=\"МВД России\" region=\"074\"/>\n" +
                "                        </ns8:Header>\n" +
                "                        <ns8:Document>\n" +
                "                            <ns8:PrivatePerson>\n" +
                "                                <ns8:FirstName>" + params.get(1) + "</ns8:FirstName>\n" +
                "                                <ns8:FathersName>" + params.get(2) + "</ns8:FathersName>\n" +
                "                                <ns8:SecName>" + params.get(3) + "</ns8:SecName>\n" +
                "                                <ns8:DateOfBirth>" + params.get(6) + "</ns8:DateOfBirth>\n" +
                "                                <ns8:OldSecName>" + params.get(4) + "</ns8:OldSecName>\n" +
                "                                <ns8:SNILS>" + params.get(5) + "</ns8:SNILS>\n" +
                "                                <ns8:PlaceOfBirth code=\"" + params.get(8) + "\">" + params.get(7) + "</ns8:PlaceOfBirth>\n" +
                "                            </ns8:PrivatePerson>\n" +
                "                            <ns8:PoliceInfo dismissalRank=\"" + params.get(12) + "\"\n" +
                "                                            dismissalSubdivision=\"" + params.get(10) + "\"\n" +
                "                                            personalNumber=\"" + params.get(9) + "\" regionCode=\"" + params.get(11) + "\"/>\n" +
                "                        </ns8:Document>\n" +
                "                    </ns8:Message>";
        xmlDataStr += this.setFooterSoapData();


        return xmlDataStr;
    }

    public void closeConnection(SOAPConnection connection) {
        try {

            //Закрываем соединение
            connection.close();

        } catch(Exception e) {
            System.out.println(e.getMessage());
        }
    }

    public String setHeaderSoapData(String dat) {
        String headerXml = new String();
        headerXml = "<S:Envelope xmlns:S=\"http://schemas.xmlsoap.org/soap/envelope/\"\n" +
                "            xmlns:wsse=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd\"\n" +
                "            xmlns:wsu=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd\">\n" +
                "    <S:Header>\n" +
                "        <wsse:Security S:actor=\"http://smev.gosuslugi.ru/actors/smev\">\n" +
                "            <ds:Signature xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\">\n" +
                "                <ds:SignedInfo>\n" +
                "                    <ds:CanonicalizationMethod Algorithm=\"http://www.w3.org/2001/10/xml-exc-c14n#\"/>\n" +
                "                    <ds:SignatureMethod Algorithm=\"http://www.w3.org/2001/04/xmldsig-more#gostr34102001-gostr3411\"/>\n" +
                "                    <ds:Reference URI=\"#body\">\n" +
                "                        <ds:Transforms>\n" +
                "                            <ds:Transform Algorithm=\"http://www.w3.org/2001/10/xml-exc-c14n#\"/>\n" +
                "                        </ds:Transforms>\n" +
                "                        <ds:DigestMethod Algorithm=\"http://www.w3.org/2001/04/xmldsig-more#gostr3411\"/>\n" +
                "                        <ds:DigestValue>uXvF2hLeeDwJqDvbLd6YxhQBPZU5uP0WkJgamc+IiAY=</ds:DigestValue>\n" +
                "                    </ds:Reference>\n" +
                "                </ds:SignedInfo>\n" +
                "                <ds:SignatureValue>\n" +
                "                    XI4/JrIGn59WDf7JDJ0J73tC2pu9NWVrUy8FOfT5mw3shTwJFA8Fy/BxeWkiT2v+nje5FFK/Ra3lwRwCroyFyg==\n" +
                "                </ds:SignatureValue>\n" +
                "                <ds:KeyInfo>\n" +
                "                    <wsse:SecurityTokenReference>\n" +
                "                        <wsse:Reference URI=\"#SenderCertificate\"\n" +
                "                                        ValueType=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-x509-token-profile-1.0#X509v3\"/>\n" +
                "                    </wsse:SecurityTokenReference>\n" +
                "                </ds:KeyInfo>\n" +
                "            </ds:Signature>\n" +
                "            <wsse:BinarySecurityToken\n" +
                "                    EncodingType=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary\"\n" +
                "                    ValueType=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-x509-token-profile-1.0#X509v3\"\n" +
                "                    wsu:Id=\"SenderCertificate\">\n" +
                "                MIIEKzCCA9qgAwIBAgIKXfj8iAABAAALzDAIBgYqhQMCAgMwfzELMAkGA1UEBhMCUlUxFTATBgNVBAcMDNCc0L7RgdC60LLQsDEcMBoGA1UECgwT0JzQktCUINCg0L7RgdGB0LjQuDEpMCcGA1UECwwg0JPQptCh0LjQl9CYINCc0JLQlCDQoNC+0YHRgdC40LgxEDAOBgNVBAMTB0hFQUQgQ0EwHhcNMTIwNjI2MTExOTAwWhcNMTMwNjI2MTEyMzAwWjBHMQswCQYDVQQGEwJSVTEdMBsGA1UECh4UBBwEEgQUACAEIAQ+BEEEQQQ4BDgxGTAXBgNVBAMeEAQSBBgEIQAtBCEEHAQtBBIwYzAcBgYqhQMCAhMwEgYHKoUDAgIkAAYHKoUDAgIeAQNDAARAapuPpkSMPQdhXlvVo0bV+Rx2fjHw2EZcA0iT8vGgmfoAaLqRTbErJVy1obSfwYhQAXWSJo4gEhFkk7mcVw0UpqOCAmwwggJoMA4GA1UdDwEB/wQEAwIE8DAZBgkqhkiG9w0BCQ8EDDAKMAgGBiqFAwICFTAuBgNVHSUEJzAlBggrBgEFBQcDBAYGKoUDBQEBBgcqhQMCAiIGBggrBgEFBQcDAjAdBgNVHQ4EFgQUqFInUTSSNsbmZZY0C+oLAm+J9bQwHwYDVR0jBBgwFoAUqfiHMEJgPZwOaXkSG1qFwLtKY4AwgeMGA1UdHwSB2zCB2DCB1aCB0qCBz4ZCaHR0cDovL2NkcC5tdmQucnUvY3JsL2E5Zjg4NzMwNDI2MDNkOWMwZTY5NzkxMjFiNWE4NWMwYmI0YTYzODAuY3JshkNodHRwOi8vY2RwMi5tdmQucnUvY3JsL2E5Zjg4NzMwNDI2MDNkOWMwZTY5NzkxMjFiNWE4NWMwYmI0YTYzODAuY3JshkRodHRwOi8vd3d3LnVjbXZkLnJ1L2NybC9hOWY4ODczMDQyNjAzZDljMGU2OTc5MTIxYjVhODVjMGJiNGE2MzgwLmNybDCBpgYIKwYBBQUHAQEEgZkwgZYwLwYIKwYBBQUHMAKGI2h0dHA6Ly9jZHAubXZkLnJ1L2NlcnQvSEVBRF9NVkQuY3J0MDAGCCsGAQUFBzAChiRodHRwOi8vY2RwMi5tdmQucnUvY2VydC9IRUFEX01WRC5jcnQwMQYIKwYBBQUHMAKGJWh0dHA6Ly93d3cudWNtdmQucnUvY2VydC9IRUFEX01WRC5jcnQwPAYJKwYBBAGCNxUKBC8wLTAKBggrBgEFBQcDBDAIBgYqhQMFAQEwCQYHKoUDAgIiBjAKBggrBgEFBQcDAjAIBgYqhQMCAgMDQQDMQvW99ZiIgl9Fj59nHUBxlZr6XfDPsDVM0kr7ZcX1CT1kT71jFLf2yFKUZWXEDwCy1kN+iTZzhusATGTBKkQD\n" +
                "            </wsse:BinarySecurityToken>\n" +
                "        </wsse:Security>\n" +
                "    </S:Header>\n" +
                "    <S:Body wsu:Id=\"body\">\n" +
                "        <RequestPL xmlns=\"http://smev.gosuslugi.ru/rev111111\" xmlns:ns10=\"http://tower.ru/mvd/clients/pl/response\"\n" +
                "                   xmlns:ns11=\"http://tower.ru/mvd/clients/common/requestID\"\n" +
                "                   xmlns:ns2=\"http://www.w3.org/2000/09/xmldsig#\" xmlns:ns3=\"http://tower.ru/mvd/clients/wpe/unloadList\"\n" +
                "                   xmlns:ns4=\"http://www.w3.org/2004/08/xop/include\"\n" +
                "                   xmlns:ns5=\"http://tower.ru/mvd/clients/wpe/unload/request\"\n" +
                "                   xmlns:ns6=\"http://tower.ru/mvd/clients/wpe/unloadList/request\"\n" +
                "                   xmlns:ns7=\"http://tower.ru/mvd/clients/wpe/unload\" xmlns:ns8=\"http://tower.ru/mvd/clients/pl/request\"\n" +
                "                   xmlns:ns9=\"http://tower.ru/mvd/clients/common/responseID\">\n" +
                "            <Message>\n" +
                "                <Sender>\n" +
                "                    <Code>MVDR01001</Code>\n" +
                "                    <Name>МВД России</Name>\n" +
                "                </Sender>\n" +
                "                <Recipient>\n" +
                "                    <Code>MVDR01001</Code>\n" +
                "                    <Name>МВД России</Name>\n" +
                "                </Recipient>\n" +
                "                <Originator>\n" +
                "                    <Code>MVDR01001</Code>\n" +
                "                    <Name>МВД России</Name>\n" +
                "                </Originator>\n" +
                "                <TypeCode>GSRV</TypeCode>\n" +
                "                <Status>REQUEST</Status>\n" +
                "                <Date>"+dat+"</Date>\n" +
                "                <ExchangeType>2</ExchangeType>\n" +
                "                <ServiceCode>12345678911</ServiceCode>\n" +
                "                <CaseNumber>6063424415381</CaseNumber>\n" +
                "                <TestMsg>test</TestMsg>\n" +
                "            </Message>\n" +
                "            <MessageData>\n" +
                "                <AppData>";

        return headerXml;
    }

    public String setFooterSoapData() {
        String footerXml = new String();
        footerXml = "</AppData>\n" +
                "            </MessageData>\n" +
                "        </RequestPL>\n" +
                "    </S:Body>\n" +
                "</S:Envelope>";

        return footerXml;
    }


    public Document stringToXml(String xmlString) throws Exception {
//        String xmlDataStr = new String(xmlString.getBytes("UTF-8"), "Cp1251");
        String xmlDataStr = xmlString;
        DocumentBuilderFactory fctr = DocumentBuilderFactory.newInstance();
        DocumentBuilder bldr = fctr.newDocumentBuilder();
        InputSource insrc = new InputSource(new StringReader(xmlDataStr));
        return bldr.parse(insrc);

//        SAXReader reader = new SAXReader();
//        Document xmlData = reader.read(new StringReader(xmlString));
//        return xmlData;

    }



    public String requestId (String id) {
        String xml = "<S:Envelope xmlns:S=\"http://schemas.xmlsoap.org/soap/envelope/\"\n" +
                "            xmlns:wsse=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd\"\n" +
                "            xmlns:wsu=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd\">\n" +
                "    <S:Header>\n" +
                "        <wsse:Security S:actor=\"http://smev.gosuslugi.ru/actors/smev\">\n" +
                "            <ds:Signature xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\">\n" +
                "                <ds:SignedInfo>\n" +
                "                    <ds:CanonicalizationMethod Algorithm=\"http://www.w3.org/2001/10/xml-exc-c14n#\"/>\n" +
                "                    <ds:SignatureMethod Algorithm=\"http://www.w3.org/2001/04/xmldsig-more#gostr34102001-gostr3411\"/>\n" +
                "                    <ds:Reference URI=\"#body\">\n" +
                "                        <ds:Transforms>\n" +
                "                            <ds:Transform Algorithm=\"http://www.w3.org/2001/10/xml-exc-c14n#\"/>\n" +
                "                        </ds:Transforms>\n" +
                "                        <ds:DigestMethod Algorithm=\"http://www.w3.org/2001/04/xmldsig-more#gostr3411\"/>\n" +
                "                        <ds:DigestValue>tIXljfoAsP7toihlv4bkoNQFmQj43prBu6DepMC6aPQ=</ds:DigestValue>\n" +
                "                    </ds:Reference>\n" +
                "                </ds:SignedInfo>\n" +
                "                <ds:SignatureValue>\n" +
                "                    ZlqrWH7bvIICbJH6OGwh1hQrfkWkkYUXVDog1iUc5SNnqSbEy26lC1WnCs0VdKfXfYZixRRqgfK9yD7dXPLj9g==\n" +
                "                </ds:SignatureValue>\n" +
                "                <ds:KeyInfo>\n" +
                "                    <wsse:SecurityTokenReference>\n" +
                "                        <wsse:Reference URI=\"#SenderCertificate\"\n" +
                "                                        ValueType=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-x509-token-profile-1.0#X509v3\"/>\n" +
                "                    </wsse:SecurityTokenReference>\n" +
                "                </ds:KeyInfo>\n" +
                "            </ds:Signature>\n" +
                "            <wsse:BinarySecurityToken\n" +
                "                    EncodingType=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary\"\n" +
                "                    ValueType=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-x509-token-profile-1.0#X509v3\"\n" +
                "                    wsu:Id=\"SenderCertificate\">\n" +
                "                MIIEKzCCA9qgAwIBAgIKXfj8iAABAAALzDAIBgYqhQMCAgMwfzELMAkGA1UEBhMCUlUxFTATBgNVBAcMDNCc0L7RgdC60LLQsDEcMBoGA1UECgwT0JzQktCUINCg0L7RgdGB0LjQuDEpMCcGA1UECwwg0JPQptCh0LjQl9CYINCc0JLQlCDQoNC+0YHRgdC40LgxEDAOBgNVBAMTB0hFQUQgQ0EwHhcNMTIwNjI2MTExOTAwWhcNMTMwNjI2MTEyMzAwWjBHMQswCQYDVQQGEwJSVTEdMBsGA1UECh4UBBwEEgQUACAEIAQ+BEEEQQQ4BDgxGTAXBgNVBAMeEAQSBBgEIQAtBCEEHAQtBBIwYzAcBgYqhQMCAhMwEgYHKoUDAgIkAAYHKoUDAgIeAQNDAARAapuPpkSMPQdhXlvVo0bV+Rx2fjHw2EZcA0iT8vGgmfoAaLqRTbErJVy1obSfwYhQAXWSJo4gEhFkk7mcVw0UpqOCAmwwggJoMA4GA1UdDwEB/wQEAwIE8DAZBgkqhkiG9w0BCQ8EDDAKMAgGBiqFAwICFTAuBgNVHSUEJzAlBggrBgEFBQcDBAYGKoUDBQEBBgcqhQMCAiIGBggrBgEFBQcDAjAdBgNVHQ4EFgQUqFInUTSSNsbmZZY0C+oLAm+J9bQwHwYDVR0jBBgwFoAUqfiHMEJgPZwOaXkSG1qFwLtKY4AwgeMGA1UdHwSB2zCB2DCB1aCB0qCBz4ZCaHR0cDovL2NkcC5tdmQucnUvY3JsL2E5Zjg4NzMwNDI2MDNkOWMwZTY5NzkxMjFiNWE4NWMwYmI0YTYzODAuY3JshkNodHRwOi8vY2RwMi5tdmQucnUvY3JsL2E5Zjg4NzMwNDI2MDNkOWMwZTY5NzkxMjFiNWE4NWMwYmI0YTYzODAuY3JshkRodHRwOi8vd3d3LnVjbXZkLnJ1L2NybC9hOWY4ODczMDQyNjAzZDljMGU2OTc5MTIxYjVhODVjMGJiNGE2MzgwLmNybDCBpgYIKwYBBQUHAQEEgZkwgZYwLwYIKwYBBQUHMAKGI2h0dHA6Ly9jZHAubXZkLnJ1L2NlcnQvSEVBRF9NVkQuY3J0MDAGCCsGAQUFBzAChiRodHRwOi8vY2RwMi5tdmQucnUvY2VydC9IRUFEX01WRC5jcnQwMQYIKwYBBQUHMAKGJWh0dHA6Ly93d3cudWNtdmQucnUvY2VydC9IRUFEX01WRC5jcnQwPAYJKwYBBAGCNxUKBC8wLTAKBggrBgEFBQcDBDAIBgYqhQMFAQEwCQYHKoUDAgIiBjAKBggrBgEFBQcDAjAIBgYqhQMCAgMDQQDMQvW99ZiIgl9Fj59nHUBxlZr6XfDPsDVM0kr7ZcX1CT1kT71jFLf2yFKUZWXEDwCy1kN+iTZzhusATGTBKkQD\n" +
                "            </wsse:BinarySecurityToken>\n" +
                "        </wsse:Security>\n" +
                "    </S:Header>\n" +
                "    <S:Body wsu:Id=\"body\">\n" +
                "        <RequestID xmlns=\"http://smev.gosuslugi.ru/rev111111\" xmlns:ns10=\"http://tower.ru/mvd/clients/pl/response\"\n" +
                "                   xmlns:ns11=\"http://tower.ru/mvd/clients/common/requestID\"\n" +
                "                   xmlns:ns2=\"http://www.w3.org/2000/09/xmldsig#\" xmlns:ns3=\"http://tower.ru/mvd/clients/wpe/unloadList\"\n" +
                "                   xmlns:ns4=\"http://www.w3.org/2004/08/xop/include\"\n" +
                "                   xmlns:ns5=\"http://tower.ru/mvd/clients/wpe/unload/request\"\n" +
                "                   xmlns:ns6=\"http://tower.ru/mvd/clients/wpe/unloadList/request\"\n" +
                "                   xmlns:ns7=\"http://tower.ru/mvd/clients/wpe/unload\" xmlns:ns8=\"http://tower.ru/mvd/clients/pl/request\"\n" +
                "                   xmlns:ns9=\"http://tower.ru/mvd/clients/common/responseID\">\n" +
                "            <Message>\n" +
                "                <Sender>\n" +
                "                    <Code>MVDR01001</Code>\n" +
                "                    <Name>МВД России</Name>\n" +
                "                </Sender>\n" +
                "                <Recipient>\n" +
                "                    <Code>MVDR01001</Code>\n" +
                "                    <Name>МВД России</Name>\n" +
                "                </Recipient>\n" +
                "                <Originator>\n" +
                "                    <Code>MVDR01001</Code>\n" +
                "                    <Name>МВД России</Name>\n" +
                "                </Originator>\n" +
                "                <TypeCode>GSRV</TypeCode>\n" +
                "                <Status>PING</Status>\n" +
                "                <Date>2012-08-27T12:49:42.557+04:00</Date>\n" +
                "                <ExchangeType>2</ExchangeType>\n" +
                "                <RequestIdRef>xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx</RequestIdRef>\n" +
                "                <OriginRequestIdRef>xxxxxxxx-xxxx-xxxx-xxxx-697742704698</OriginRequestIdRef>\n" +
                "                <ServiceCode>12345678911</ServiceCode>\n" +
                "                <CaseNumber>6063424415381</CaseNumber>\n" +
                "                <REQUESTID>"+id+"</REQUESTID>\n" +
                "            </Message>\n" +
                "            <MessageData>\n" +
                "                <AppData>\n" +
                "                    <ns11:Message>\n" +
                "                        <ns11:Header from_foiv_id=\"MVDR01001\" from_foiv_name=\"МВД России\" from_system=\"АИС ФМС\"\n" +
                "                                     from_system_id=\"3\" msg_type=\"REQUEST_ID\" msg_vid=\"EXPERIENCE1\"\n" +
                "                                     to_foiv_id=\"MVDR01001\" to_foiv_name=\"МВД России\" to_system=\"АИС МВД\"\n" +
                "                                     to_system_id=\"8\" version=\"1.1\">\n" +
                "                            <ns11:InitialRegNumber regtime=\"2012-08-27T12:49:42.558+04:00\">6063424415381\n" +
                "                            </ns11:InitialRegNumber>\n" +
                "                            <ns11:Service code=\"3\"/>\n" +
                "                            <ns11:Reason>12345678911</ns11:Reason>\n" +
                "                            <ns11:Originator code=\"MVDR01001\" fio=\"Петрова И.А., тел. (351) 232-3456\" name=\"МВД России\"\n" +
                "                                             region=\"074\"/>\n" +
                "                            <ns11:RegNumber regtime=\"2012-08-27T12:49:42.558+04:00\">3003000</ns11:RegNumber>\n" +
                "                        </ns11:Header>\n" +
                "                    </ns11:Message>\n" +
                "                </AppData>\n" +
                "            </MessageData>\n" +
                "        </RequestID>\n" +
                "    </S:Body>\n" +
                "</S:Envelope>";
        return xml;
    }


}
