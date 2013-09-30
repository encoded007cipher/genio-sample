package com.paypal.genio.sample;
import com.paypal.core.SDKUtil;
import com.paypal.core.message.XMLMessageSerializer;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathConstants;
import javax.xml.xpath.XPathExpressionException;
import javax.xml.xpath.XPathFactory;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;

public class SayHelloRequest implements XMLMessageSerializer {

	/**
	 * Namespace of SayHelloRequest
	 */
	public static final String nameSpace = "http://sample.genio.paypal.com";

	/**
	 * 
	 */
	private String message;

	/**
	 * Default Constructor
	 */
	public SayHelloRequest() {
	}

	/**
	 * Parameterized Constructor
	 */
	public SayHelloRequest(String message) {
		this.message = message;
	}


	/**
	 * Setter for message
	 */
	public SayHelloRequest setMessage(String message) {
		this.message = message;
		return this;
	}

	/**
	 * Getter for message
	 */
	public String getMessage() {
		return this.message;
	}

	public String toXMLString() {
		return toXMLString("tns", "SayHelloRequest");
	}

	/**
	 * Serialize the object to XML String form
	 * @param prefix
	 *           Namespace prefix to use during serialization
	 * @param name
	 *           Name used for serialization
	 */
	public String toXMLString(String prefix, String name) {
		StringBuilder sb = new StringBuilder();
		if (name != null) {
			if (prefix != null) {
				sb.append("<").append(prefix + ":").append(name).append(">");
			} else {
				sb.append("<").append(name).append(">");
			}
		}
		if (this.message != null) {
			sb.append("<");
			sb.append("message>");
			sb.append(SDKUtil.escapeInvalidXmlCharsRegex(this.message));
			sb.append("</");
			sb.append("message>");
		}
		if (name != null) {
			if (prefix != null) {
				sb.append("</").append(prefix + ":").append(name).append(">");
			} else {
				sb.append("</").append(name).append(">");
			}
		}
		return sb.toString();
	}



	/**
	 * Checks whether the node is empty space
	 */
	private  boolean isWhitespaceNode(Node n) {
		if (n.getNodeType() == Node.TEXT_NODE) {
			String val = n.getNodeValue();
			return val.trim().length() == 0;
		} else if (n.getNodeType() == Node.ELEMENT_NODE ) {
			return (n.getChildNodes().getLength() == 0);
		} else {
			return false;
		}
	}

	/**
	 * Constructor using a Node parameter
	 */	
	public SayHelloRequest (Node node) throws XPathExpressionException {
		XPathFactory factory = XPathFactory.newInstance();
		XPath xpath = factory.newXPath();
		Node childNode = null;
		NodeList nodeList = null;
		childNode = (Node) xpath.evaluate("message", node, XPathConstants.NODE);
		if (childNode != null && !isWhitespaceNode(childNode)) {
			this.message = childNode.getTextContent();
		}
	}


}
