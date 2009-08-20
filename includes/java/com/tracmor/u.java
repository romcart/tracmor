package com.tracmor;
//import java.awt.TextArea;
import java.awt.*;
import java.awt.event.*;

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
*
*Utility class to log to console
*
*/
public final class u



{


//static Frame f;
//static TextArea ta;

	public static final int
	  ERR_NOR=1
	  ,ERR_SLES=0
	  ,ERR_SL=-1
	  ,ERR_SLEE=-2
	  ,ERR_SLE=-4
	  ;

	public static int err = ERR_NOR;

	public static String eErrs[]={"com.tracmor.","Reset","reset","jvm","JVM"};

	static{
		//err=ERR_SL;
		//f=new Frame("errs");
		//tad=new TextArea(100,90);
		//Awt.frame();
	}
	/*
	*for more support on debug
	static TextArea errT ;
	static boolean errToTextArea = false;
	static boolean errToTextAreaOverWrite = false;


	public static final void set (TextArea  t , boolean toWrite , boolean over ){
		errT = t;
		boolean errToTextArea = toWrite;
		boolean errToTextAreaOverWrite = over;

	}

	*/
	public static  final  void setErrLevel (String s){
		try{
			setErrLevel(Integer.parseInt(s));
		}catch(Exception e){
			u.sl("Error in setting com.tracmor.u error level - not an integer str? :"+s,e);
		}
	}
	public static  final  void setErrLevel (int er){

		System.err.println("u err level set to "+er );
		err=er;
	}

	public static  final  void sl (Object s){
		//System.err.print (err+" @u\n");
		if (err <ERR_SL)
			return;



		if (err ==0&&System.err!=null)

			System.err.print (s+"\n");
		else
			System.out.print (s+"\n");
	//textIt(s);

	}

	public 	static  final  void sle (Object s){
		if (err <ERR_SLE)
			return;

		if (System.err!=null)

			System.err.print (s+"\n");
		else
			System.out.print (s+"\n");

	//textIt(s);

	}

	public static  final  void sl (Object s,java.lang.Throwable e){
		if (err <ERR_SLEE)
			return;

		sl(s+" err="+e+" e==null :"+(e==null)+" System.out "+System.out);
		try{
			if(e!=null)e.printStackTrace(System.out);
		}catch(Exception e2){
			e2.printStackTrace(System.out);
		}

		//textIt(s);

	}

	public static  final  void se (Object s,java.lang.Throwable e){
		if (err <ERR_SLE)
			return;

			sle(s+"\n");
			e.printStackTrace();
			//System.err.print (com.tracmor.gen.Utl2.getErr(e,eErrs));



			//textIt(s);

	}

		public static  final  void se (java.lang.Throwable e){
			if (err <ERR_SLE)
				return;

				e.printStackTrace();
				//System.err.print (com.tracmor.gen.Utl2.getErr(e,eErrs));



				//textIt(s);

	}




	public static final void s (Object s){
		if (err <0)
			return;

	//System.err.print(s);

		if (err ==0&&System.err!=null)

			System.err.print (s);
		else
			System.out.print (s);
	//textIt(s);

	}

		public static final void se (Object s){
			if (err <=-3)
			return;


		if (err ==0&&System.err!=null)

			System.err.print (s);
		else
			System.out.print (s);
		//textIt(s);

		}


	/**
	advanced debug for use with awt ; not used
	*/
/*
	public static final void textIt(Object s){

	if (errToTextArea = true )	{

		if (errT != null){
			if (errToTextAreaOverWrite == true ){
				errT.append(s );
			}//errToTextAreaOverWrite == true
				else {
					//errT.setText(s + errT.getText() );
				}//else
			}// ertt != null


		}//errToTextArea = true



	}//text it
	*/



}// class u

