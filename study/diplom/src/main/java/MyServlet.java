import org.w3c.dom.Document;
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
import java.util.ArrayList;

public class MyServlet extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp)
            throws ServletException, IOException {

        PrintWriter out = resp.getWriter();
        out.print("<h1>Hello Servlet</h1>");

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