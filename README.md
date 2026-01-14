# DVWA_Project

## Introduction

This repository contains a practical security assessment of the **Damn Vulnerable Web Application (DVWA)** carried out as part of an academic coursework project. The purpose of this work is to explore common web application vulnerabilities, understand how they can be exploited, and demonstrate how secure coding practices can be applied to mitigate them.

All testing and modifications were performed in a controlled local environment to ensure that no real systems or data were affected.

---

## Project Aim and Objectives

The main aim of this project is to develop hands-on experience in web application security testing. The specific objectives are:

- To identify and analyse common web application vulnerabilities using DVWA  
- To demonstrate exploitation techniques in a controlled environment  
- To apply appropriate mitigation strategies through secure coding practices  
- To use OWASP ZAP for request and response analysis  
- To document the findings in a clear and academically appropriate manner  

---

## Environment and Tools

The project was implemented using the following tools and technologies:

- **Web Application:** Damn Vulnerable Web Application (DVWA)  
- **Deployment Method:** Docker container  
- **Operating Environment:** Localhost (Windows)  
- **Server:** Apache Web Server  
- **Programming Language:** PHP  
- **Security Testing Tool:** OWASP ZAP  

Using Docker ensured consistency and isolation during testing, while OWASP ZAP enabled detailed inspection of HTTP traffic.

---

## Vulnerabilities Analysed

### Command Injection

The Command Injection vulnerability was identified where user input was passed directly to system commands without sufficient validation. This allowed arbitrary commands to be executed on the server.

**Mitigation Measures:**
- Input validation using allowlisted values  
- Restriction of user input to valid IP address formats  
- Elimination of unsafe command execution patterns  

---

### Reflected Cross-Site Scripting (XSS)

Reflected XSS was observed when user-supplied input was reflected in the server response without proper output encoding. This enabled JavaScript payloads to execute within the browser.

**Mitigation Measures:**
- Output encoding of user input  
- Input sanitisation  
- Prevention of script execution in reflected content  

---

### Insecure File Upload

The File Upload functionality allowed executable files to be uploaded and accessed directly, leading to remote code execution risks.

**Mitigation Measures:**
- Validation of file MIME types  
- Restriction to image-only uploads  
- Blocking executable file extensions  
- Secure handling of uploaded files  

---

## OWASP ZAP Analysis

OWASP ZAP was used in **Manual Explore mode** as an intercepting proxy during testing. The tool was used to:

- Capture and analyse HTTP GET and POST requests  
- Identify vulnerable parameters related to Reflected XSS  
- Inspect server responses for unsafe input reflection  
- Verify that applied fixes prevented successful exploitation  

The use of OWASP ZAP provided visibility into application behaviour at the HTTP level and supported validation of mitigation effectiveness.

---

## Repository Structure

The repository includes:

- Original DVWA source code  
- Modified source files after vulnerability remediation  
- Docker configuration files  
- Version control history showing changes before and after fixes  

This structure demonstrates both vulnerability identification and secure remediation practices.

---

## Ethical Considerations

This project was conducted strictly for educational purposes. DVWA is intentionally designed to be vulnerable and was deployed locally for testing. No unauthorised systems, networks, or real user data were accessed or affected during this work.

---

## Conclusion

This project provided practical experience in identifying, exploiting, and mitigating common web application vulnerabilities. By combining DVWA with OWASP ZAP and secure coding techniques, the project demonstrates a structured approach to web security assessment aligned with industry best practices.

---

## References
- OWASP – Damn Vulnerable Web Application  
  https://github.com/digininja/DVWA
- OWASP – Command Injection  
  https://owasp.org/www-community/attacks/Command_Injection
- OWASP – Cross-Site Scripting (XSS)  
  https://owasp.org/www-community/attacks/xss/
- OWASP – Unrestricted File Upload  
  https://owasp.org/www-community/vulnerabilities/Unrestricted_File_Upload
- OWASP ZAP  
  https://www.zaproxy.org/
