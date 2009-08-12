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
import com.tracmor.gen.lng.thrds.*;

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
*
*/
/*

jar:

com/tracmor/gen/lng/ProcessOutputReaderWithResponse.class


in cons pass (Process,boolIfToPrntToConsole )
*/


public class ProcessOutputReaderWithResponse2_u1 extends ProcessOutputReaderWithResponse2    {
	public ProcessOutputReaderWithResponse2_u1(Process p,boolean toSys){
		super(p,toSys);
	}

public String get(){
	sb2.append("\ncnt="+cnt);
	return super.get();
	/*
		String temps=sb.toString()+"err Stream said =\""+sb2+"\"";
		sb=null;
		sb2=null;
		return temps;
		*/
	}
int cnt=0;
	void resp(){
		try{



			//u.sl("respo");
			//while(true&&bi!=null)
			{

			//u.sl("&");
			if(sb.toString().indexOf("? (Y/N)")>0 || sb2.toString().indexOf("? (Y/N)")>0)
			{
				bout.write("y\n".getBytes(),0,2);//bos.write("y\n\r".getBytes(),0,3);
				//bout.write("Y\n");
				cnt++;
				//u.sl("&&&WROTE?Y&&"+(sb.toString().indexOf("? (Y/N)")>0));
			}
			Thrd.sleepFor(0,5);
			Thread.yield();
			}

		}catch(Exception e){
			u.sl("err in reader ru: "+e,e);
		}

	}

}//class ProcessOutputReaderWithResponse


