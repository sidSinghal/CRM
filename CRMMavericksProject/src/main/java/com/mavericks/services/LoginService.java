package com.mavericks.services;

public class LoginService {
	public boolean validateUser(String user, String password) {
		return user.equalsIgnoreCase("user123") && password.equals("password123");
	}

}