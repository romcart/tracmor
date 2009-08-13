set jar=jars/ThermalLabelPrint.jar
set kd=certstore.ks
set kspass=password
set kpass=password
set alias=tracmor
set csr=Tracmor_self_cert.csr

del %kd%
keytool -genkey -keystore  %kd% -storepass %kspass% -keypass %kpass%     -alias  %alias%
keytool -selfcert -keystore  %kd% -storepass %kspass% -keypass %kpass%     -file %csr%  -alias  %alias%
keytool -exportcert   -alias  %alias% -keystore  %kd% -storepass %kspass% -keypass %kpass%     -file %kd%%csr%

javac -source 1.3  -target 1.3 com\tracmor\applet\ThermalLabelPrint.java com\tracmor\u.java

jar cvfM %jar% com\tracmor\u.c* com\tracmor\applet\ThermalLabelPrint.class
jarsigner -keystore %kd%  -storepass %kspass%  %jar%   %alias%
