/**
 * 
 */
package com.mavericks.controller;

import java.util.List;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import javax.sql.DataSource;

import org.apache.commons.dbutils.QueryRunner;
import org.apache.commons.dbutils.ResultSetHandler;
import org.apache.commons.dbutils.handlers.BeanHandler;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.AbstractController;


import com.mavericks.pojo.UserBean;

/**
 * @author sid
 *
 */
public class LoginController extends AbstractController {

	public LoginController() {
		// TODO Auto-generated constructor stub
	}

	@Override
	protected ModelAndView handleRequestInternal(HttpServletRequest request, HttpServletResponse response)
			throws Exception {
		// TODO Auto-generated method stub

		DataSource ds = (DataSource) this.getApplicationContext().getBean("myDataSource");

		String action = request.getParameter("action");
		ModelAndView mv = new ModelAndView();

		HttpSession session = request.getSession();

		if (action.equalsIgnoreCase("login")) {
			try {
				String userName = request.getParameter("user");
				String password = request.getParameter("password");

				// dbutils Query Runner : Executes SQL queries with pluggable
				// strategies for handling ResultSets
				QueryRunner run = new QueryRunner(ds);

				// results should be mapped directly to the bean
				ResultSetHandler<UserBean> user = new BeanHandler<>(UserBean.class);

				// set the parameters
				Object[] params = new Object[2];
				params[0] = userName;
				params[1] = password;

				UserBean userBean = run.query("select * from userstable where userName =? and userPassword=?", user, params);

			} catch (Exception e) {
				System.out.println("Exception Occured:" + e.getMessage());
			}
		} else if (action.equalsIgnoreCase("logout")) {

			session.invalidate();
			mv.setViewName("index");
		}

		return mv;
	}

}
