package com.paypal.genio.sample;

import java.util.HashMap;
import java.util.Map;

import com.paypal.core.BaseAPIContext;

public class App {

	public static void main(String[] args) {
		
		Map<String, String> configurationMap = new HashMap<String, String>();
		configurationMap.put("service.EndPoint", "http://genio-helloworld.herokuapp.com");
		
		Geniosample app = new Geniosample(configurationMap);
		
		BaseAPIContext baseAPIContext = new BaseAPIContext();
		
		SayHelloRequest sayHelloRequest = new SayHelloRequest("Bob");
		
		try {
			SayHelloResponse sayHelloResponse = app.sayHello(sayHelloRequest, baseAPIContext);
			
			System.out.println("Response from server: " + sayHelloResponse.getMessage());
			
		} catch (Exception e) {
			e.printStackTrace();
		}

	}

}
