package com.tracmor.gen.lng;
import java.awt.*;
import java.awt.event.*;
import java.util.*;
import java.net.*;
import java.io.*;
import java.applet.*;
//import javax.swing.*;
import java.sql.*;
//import java.;
//my classes
import com.tracmor.*;
import com.tracmor.gen.*;
//import com.tracmor.gen.lng.thrds.*;

/**
*
* Copyright (c)  2008, Tracmor LLC (http://www.tracmor.com) 
*
* This file is part of Tracmor.  
*
* Tracmor is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version. 
*
* Tracmor is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Tracmor; if not, write to the Free Software
* Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*
* @author: Tushar G Kapila tgkprog@yahoo.com
*
* Throws output of a process to System.err and System.out
*
*/
/*

jar:

com/tracmor/gen/lng/ProcessOutputReaderWithResponse2.class


in cons pass (Process,boolIfToPrntToConsole )
*/


public class ProcessOutputReaderWithResponse2 extends Thread {
	 PipedOutputStream bout;//BufferedWriter bout ;

	int stat=0;
	boolean toSys=false;
	StringBuffer sb2=new StringBuffer ();
	StringBuffer sb=new StringBuffer ();
	PipedInputStream bi=null;
	FileInputStream bi2=null;

	//response
	String [][]msgs=null;
	 //DataOutputStream  bos;//also tried : OutputStreamWriter BufferedOutputStream


	//control

	Thread	ru=null,ru2,ru3;
	//Ver p=null;

	void resp(){
		//u.sl("respo");
	}

	public ProcessOutputReaderWithResponse2(Process p,boolean toSys){
		//this.p=pa;
		this.toSys=toSys;
		u.sl("new th for prcoess:"+p);
		try{
			//bi=new PipedOutputStream(p.getOutputStream());
			//bos=new DataOutputStream (p.getOutputStream());
			//bout = new BufferedWriter(new OutputStreamWriter(p.getOutputStream()));
			//bout = new  PipedOutputStream()
			//p.getOutputStream();


		}catch(Exception e){
			u.sl("err:"+e,e);
		}


		try{
			bi=new PipedInputStream (bout);//p.getInputStream();
			bout.connect(bi);
			bi2=(FileInputStream)p.getErrorStream();
		}catch(Exception e){
			u.sl("bi2 err "+e);
		}
		//bo= new DataOutputStream (System.out);
		start();
		ru=new Thread(this);
		ru.start();

		ru2=new Thread(this);
		ru2.start();
		ru3=new Thread(this);
		ru3.start();

		u.sl("innie "+p.getInputStream().getClass().getName());
		u.sl("outie "+p.getOutputStream().getClass().getName());

		u.sl("started process listener threads");
		try{
			p.waitFor();
		}catch(Exception e){
			u.sl("p wait err "+e);
		}

	}
	public String get(){
		String temps=sb.toString()+"err Stream said =\""+sb2+"\"";
		sb=null;
		sb2=null;
		return temps;
	}
	public void run(){
		while(Thread.currentThread()==this&&stat==0){
			try{
				int r=(bi!=null)?bi.read():-1;
				while(r>-1&&bi!=null){
					sb.append((char)r);
					if(toSys)
						System.out.print((char)r);
					//u.s("\tread:"+(char)r);u.s(""+(char)r);//u.s(" r="+r+"="+(char)r);
					Thread.yield();
					r=bi.read();


				}//r>
				//u.sl("ProcessOutputReaderWithResponse2 class this END");
			}catch(Exception e){
				u.sl("err in reader: "+e,e);
			}

			//notify ();
		}//while this thrread
		while(Thread.currentThread()==ru&&stat==0){
			try{
				while(bi==null){
					sleepFor(30);
				}

				//u.sl("\t#111 available="+bi.available()+" 1-2 available="+bi2.available());
				if(bi.available()==0&&bi2.available()==0 &&stat==0){
					tell();


					ru=null;
					ru2=null;
					}

				/*Ver3.*/sleepFor(40);
				//u.sl("\t\n222# available="+bi.available()+" 2-2# available="+bi2.available());
				while(bi!=null&&bi2!= null&&(bi.available()>=5||bi2.available()>=5 )){
					//u.sl("\t# available="+bi.available());
					if(bi.available()==0&&bi2.available()==0 &&stat==0){
						tell();
						ru=null;
						ru2=null;
					}
					/*Ver3.*/sleepFor(40);
				}
				//if(bi.available()<5)
				{

					//bi.flush();

					sleepFor(40);
					//tell();

				}//if r<5
			}catch(Exception e){
				u.sl("err in reader ru: "+e,e);
			}

		}//while ru thread

		while(Thread.currentThread()==ru3){
			resp();



		}//while ru thread

		while(Thread.currentThread()==ru2&&stat==0){

			while(bi2==null)
					sleepFor(1040);

			try{
				int r2=(bi2!=null)?bi2.read():-1;
				if (r2==-1)
					ru2=null;
				//u.sl("\n^^^^bi1:"+r2+"\n");
				while(r2>-1&&bi2!=null&stat==0){
					if (r2==-1)
						ru2=null;
					//sb.append((char)r2);
					sb2.append((char)r2);
					if(toSys)
						System.out.print((char)r2);
					Thread.yield();
					//u.s("\tread:"+(char)r2);u.s(""+(char)r2);
					//u.s(" r2="+r2+"="+(char)r2);
					if (bi2==null)
						u.sl("\nerr?:###bi2 is null \n");
					else
						r2=bi2.read();

				}//r2>
			}catch(Exception e){
				u.sl("err in reader: "+e,e);
			}


		}//while ru2 thread
	}//run

	synchronized void tell(){
		stat=1;
		//u.sl("\nTELL\n");
		//p.tellMe();
		notifyAll();
		try{
			bi=null;
			bi2=null;
			u.sl("\nb work end");
			ru=null;
			ru2=null;
			ru3.interrupt();
			ru3=null;
			//ru.interrupt();
			//ru2.interrupt();
			//interrupt();
			//bi=null;
		}catch(Exception e){
				u.sl("err in reader tell: "+e,e);
		}
	}
/*
	static void sleepFor(long t){
			try{
				Thread.currentThread().sleepFor(t);

			}catch(Exception e){
				u.sl("sleepFor err :"+e,e);
			}
	}
*/
	/*public void finalize(){
		u.sl("class ProcessOutputReaderWithResponse2 end - finalized.");
	}*/

	void sleepFor(int i){
		try{
			Thread.sleep(i);

		}catch(Throwable e){
			u.sl(e, e);
		}
	}
}//class ProcessOutputReaderWithResponse2


