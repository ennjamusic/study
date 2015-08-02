import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NodeList;
import org.xml.sax.InputSource;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.xml.crypto.dsig.XMLObject;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.soap.SOAPConnectionFactory;
import javax.xml.soap.SOAPConnection;
import java.io.IOException;
import java.io.InputStream;
import java.io.PrintWriter;
import java.io.StringReader;
import java.sql.Date;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.*;
import java.sql.*;

public class RequestID extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp)
            throws ServletException, IOException {
        PrintWriter out = resp.getWriter();
        try {
            DateFormat dateDay = new SimpleDateFormat("yyyy-MM-dd");
            DateFormat dateSec = new SimpleDateFormat("HH:mm:ss.mss");
            java.util.Date date1 = new java.util.Date();
            java.util.Date date2 = new java.util.Date();
            String dat = dateDay.format(date1)+" "+dateSec.format(date2);

            DocumentBuilder builder = DocumentBuilderFactory.newInstance().newDocumentBuilder();
            InputSource is = new InputSource();
            is.setCharacterStream(new StringReader(req.getParameter("msg")));
            Document doc = builder.parse(is);
            NodeList nodes = doc.getElementsByTagName("REQUESTEDID");
            Element elem = (Element) nodes.item(0);

            Class.forName("com.mysql.jdbc.Driver");
            Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/diplom", "diplom", "123456");
            Statement statement = conn.createStatement();

            //Вставка в таблицу пришедшего id
            statement.executeUpdate("INSERT INTO servletRequests (responseId) VALUES("+elem.getTextContent()+")");
            out.println(elem.getTextContent());
//
        } catch (Exception e) {
            e.printStackTrace();
        }

    }

    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp)
            throws ServletException, IOException {


        resp.setContentType("text/plain");
        resp.setCharacterEncoding("UTF-8");
        PrintWriter out = resp.getWriter();
        ArrayList<String> params = new ArrayList<String>(13);
        params.add(req.getParameter("fio-init"));
        params.add(req.getParameter("name"));
        params.add(req.getParameter("second-name"));
        params.add(req.getParameter("last-name"));
        params.add(req.getParameter("girl-name"));
        params.add(req.getParameter("snils"));
        params.add(req.getParameter("date-birth"));
        params.add(req.getParameter("place-of-birth"));
        params.add(req.getParameter("region-code"));
        params.add(req.getParameter("ovd-number"));
        params.add(req.getParameter("last-ovd"));
        params.add(req.getParameter("region-code-ovd"));
        params.add(req.getParameter("rang"));

        MySoap soap = new MySoap();
        SOAPConnection conn = soap.getConnection();
        try {
            String soapData = new String();
            soapData = soap.setSoapData(params);

            out.print(soapData);

        } catch (Exception e) {
            e.printStackTrace();
        }

    }

}