package com.paypal.genio.sample;

import com.paypal.core.APICallPreHandler;
import com.paypal.core.BaseAPIContext;
import com.paypal.core.BaseService;
import com.paypal.core.DefaultSOAPAPICallHandler;
import com.paypal.core.DefaultSOAPAPICallHandler.XmlNamespaceProvider;
import com.paypal.exception.*;
import com.paypal.genio.sample.SayHelloRequest;
import com.paypal.genio.sample.SayHelloResponse;
import com.paypal.sdk.exceptions.*;
import java.io.*;
import java.util.HashMap;
import java.util.Map;
import java.util.Properties;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.xpath.XPathConstants;
import javax.xml.xpath.XPathExpressionException;
import javax.xml.xpath.XPathFactory;
import org.w3c.dom.Node;
import org.xml.sax.InputSource;
import org.xml.sax.SAXException;

public class Geniosample extends BaseService {

	static {
		DefaultSOAPAPICallHandler.setXmlNamespaceProvider(new XmlNamespacePrefixProvider());
	}

	// Service Version
	public static final String SERVICE_VERSION = "";

	// Service Name
	public static final String SERVICE_NAME = "geniosample";

	//SDK Name
	private static final String SDK_NAME = "";

	//SDK Version
	private static final String SDK_VERSION = "";

	/**
	 * Default <code>Geniosample</code> Constructor.
	 * Initializes the SDK system with the default configuration file named
	 * 'sdk_config.properties' found in the class-path
	 */
	public Geniosample() {
		super.initializeToDefault();
	}

	/**
	 * <code>Geniosample</code> that uses the supplied
	 * {@link Properties} to initialize the SDK system. For values that the
	 * properties should holdconsult the documentation.
	 * The initialization context is maintained only for
	 * this instance of the class. Service level configuration.
	 *
	 * @param properties
	 *            {@link Properties} object
	 */
	public Geniosample(Properties properties) {
		super(properties);
	}

	/**
	 * <code>Geniosample</code> that uses the supplied
	 * {@link Map} to initialize the SDK system. For values that the
	 * configurationMap should hold consult the documentation.
	 * The initialization context is maintained only for
	 * this instance of the class. Service level configuration.
	 *
	 * @param configurationMap
	 *            {@link Map} object
	 */
	public Geniosample(Map<String, String> configurationMap) {
		super(configurationMap);
	}

	public SayHelloResponse sayHello(SayHelloRequest sayHelloRequest, BaseAPIContext baseAPIContext) throws SAXException, IOException, ParserConfigurationException, InvalidResponseDataException, HttpErrorException, ClientActionRequiredException, InvalidCredentialException, MissingCredentialException, OAuthException, SSLConfigurationException, InterruptedException {
		if (baseAPIContext == null) {
			throw new IllegalArgumentException("BaseAPIContext is null");
		}
		if (baseAPIContext.getHTTPHeaders() == null) {
			baseAPIContext.setHTTPHeaders(new HashMap<String, String>());
		}
		baseAPIContext.getHTTPHeaders().put("SOAPAction", "uri:sample.genio.paypal.com/sayHello");
		APICallPreHandler apiCallPreHandler = new DefaultSOAPAPICallHandler(sayHelloRequest, baseAPIContext, this.configurationMap, "sayHello");
		String response = call(apiCallPreHandler);
		InputSource inStream = new InputSource();
		inStream.setCharacterStream(new StringReader((String) response));
		try {
			Node node = (Node) XPathFactory.newInstance().newXPath().evaluate("Envelope/Body/SayHelloResponse", DocumentBuilderFactory.newInstance().newDocumentBuilder().parse(inStream), XPathConstants.NODE);
			return new SayHelloResponse(node);
		} catch (XPathExpressionException exe) {
			throw new RuntimeException("Unable to parse response", exe);
		}
	}


	/**
	 * Implementation of DefaultSOAPAPICallHandler.XmlNamespaceProvider
	 */
	private static class XmlNamespacePrefixProvider implements XmlNamespaceProvider {

		private Map<String, String> namespaceMap;

		public XmlNamespacePrefixProvider() {
			namespaceMap = new HashMap<String, String>();
			namespaceMap.put("xml", "http://www.w3.org/XML/1998/namespace");
			namespaceMap.put("wsdl", "http://schemas.xmlsoap.org/wsdl/");
			namespaceMap.put("soap", "http://schemas.xmlsoap.org/wsdl/soap/");
			namespaceMap.put("tns", "http://sample.genio.paypal.com");
			namespaceMap.put("SOAP-ENC", "http://schemas.xmlsoap.org/soap/encoding/");
			namespaceMap.put("xsi", "http://www.w3.org/2001/XMLSchema-instance");
			namespaceMap.put("xsd", "http://www.w3.org/2001/XMLSchema");
			namespaceMap.put("SOAP-ENV", "http://schemas.xmlsoap.org/soap/envelope/");
		}

		public Map<String, String> getNamespaceMap() {
			return namespaceMap;
		}
	}

}
