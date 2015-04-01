<?php
	QEmailServer::$SmtpServer = SMTP_SERVER;
	QEmailServer::$SmtpPort = SMTP_PORT;
	QEmailServer::$SmtpUsername = SMTP_USERNAME;
	QEmailServer::$SmtpPassword = SMTP_PASSWORD;
	QEmailServer::$AuthLogin = true;

	$objEmailQueue = EmailQueue::QueryArray(
		QQ::IsNull(QQN::EmailQueue()->ErrorFlag),
		QQ::Clause(
			QQ::LimitInfo(50)
		)
	);

	foreach ($objEmailQueue as $objEmail) {
		$objEmail->Send();
	}
?>