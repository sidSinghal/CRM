package com.neu.msis.cloud.login;
import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


public class FirstServlet extends HttpServlet {
	
	public void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		doPost(request, response);
	}
	
	public void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {

		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		
		String userName=request.getParameter("username");
		String password=request.getParameter("userpass");
		
		RequestDispatcher rd=request.getRequestDispatcher("servlet2");
		rd.forward(request,response);
		
//		if(LoginDao.validate(userName, password)){
//			RequestDispatcher rd=request.getRequestDispatcher("servlet2");
//			rd.forward(request,response);
//		}
//		else{
//			out.print("Sorry username or password error");
//			RequestDispatcher rd=request.getRequestDispatcher("index.html");
//			rd.include(request,response);
//		}
		
		out.close();
	}

}
