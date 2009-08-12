package com.tracmor.applet;
import java.awt.event.*;
import java.awt.*;
import java.applet.*;
import java.io.*;
import java.awt.*;
import java.net.*;

import java.util.*;
import com.tracmor.*;

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
* @author: http://sel2in.com
*
* Utility applet class that helps print print files by copying them
* over the network from the source URL to the printer. Can be extended to send to printer via port too.
*/
public class ThermalLabelPrint extends Applet{

	private URL toCopy;
	private String printerUnc;
	private int port =-1;
	private TextArea tx ;
	private com.tracmor.gen.lng.ProcessOutputReader p3;

	private void d(String s){
		u.sl(s);
		tx.setText(tx.getText() + "\n" + s);
	}

	public void stop(){
		if(p3!=null){
			p3.stopAll();
			p3 = null;

		}
	}

	/**
	* applet start
	* to make it invisible make the size in the page 1,1 and in a span tag that
	* has position off the screen like at 2000,2000
	*/
	public void start(){

		 String debug = "1";
		 tx = new TextArea(getHeight() / 22,getWidth()/ 13);
		 setLayout(null);
		 tx.setEditable(false);
		 add(tx);
		 tx.setBounds(0,0, getWidth(), getHeight());
		 try{
			 d("v004");
			 String typ = getParam("type", "copy");
			 if("copy".equals(typ)){
				doCopy();
			 }else if("nio".equals(typ)){
				 if(!doNio()){
					 doCopy();
				 }
			 }

			}catch (Throwable e) {
				d("Err At " + debug + "\n" + e);
				u.sl("Err At " + debug + "\n" + e,e);

			}

	}


	private String getParam(String name, String def){
		String s = getParameter(name);
		if (s== null)return def;
		return s;
	}

	/**
	* Print by copying. File to copy in param url.
	* To copy to in param printer
	*/
	private boolean doCopy(){
		try{
			 String sUrl = getParam("url", "");
			 String debug = "make url " + sUrl;
			 URL toCopy = new URL(sUrl);
			 String printerUnc = getParam("printer", "");
			 debug = "get is " + sUrl;
			 InputStream is = new BufferedInputStream(toCopy.openConnection().getInputStream());


			 debug = "make tmp " + printerUnc;
			 File ff = File.createTempFile("sel2in_temp_",".prnt",new File(printerUnc));
			 debug = "fos  " + ff.getAbsolutePath();
			 OutputStream fos = new BufferedOutputStream(new FileOutputStream(ff));
			 d("file : "+ ff.getAbsolutePath());
			 int r=0;
			 debug = "io  " + ff;
			 byte []by = new byte[512];
			 while((r=is.read(by)) > 0){
				 fos.write(by,0 , r);
			 }
			 fos.close();
			 is.close();
			 d("copy");
			 debug = "slp  " + ff;
			 String sSleep = getParam("sleepAndDelete", "0");
			 if(!sSleep.equals("")){
				 int s = Integer.parseInt(sSleep);
				 d("sleep "+s);
				 if(s>0){
					Thread.sleep(s);
					debug = "del  " + ff;
					ff.delete();
				}
			 }

			 sSleep = getParam("justSleepAfter", "0");
			 if(!sSleep.equals("")){
				 int s = Integer.parseInt(sSleep);
				 d("sleep "+s);
				 if(s>0){
					Thread.sleep(s);

				}
			 }

			 String run1 = getParam("run1", "");
			 if(!"".equals(run1)){
				 Runtime rn = Runtime.getRuntime();
				 rn.exec(run1, new String[]{ff.getAbsolutePath()});
			 }



		}catch(Throwable e){
			d("Err At " + "\n" + e);
			u.sl(e, e);
			return false;
		}
		return true;
	}

	public boolean copyFile(File in, File out)

	{
		try{
			java.nio.channels.FileChannel inChannel = new
			FileInputStream(in).getChannel();


			java.nio.channels.FileChannel outChannel = new
			FileOutputStream(out).getChannel();
			try {
			inChannel.transferTo(0, inChannel.size(),
			outChannel);
			}
			catch (IOException e) {
			throw e;
			}
			finally {
			if (inChannel != null) inChannel.close();
			if (outChannel != null) outChannel.close();
			}


		}catch(Throwable e){
			d("Err At " + "\n" + e);
			u.sl(e, e);
			return false;
		}
		return true;
	}

	public static void copyFile2(FileInputStream in, File out)
		throws IOException
	{
		java.nio.channels.FileChannel inChannel =
		(in).getChannel();
		java.nio.channels.FileChannel outChannel = new
		FileOutputStream(out).getChannel();
		try {
		inChannel.transferTo(0, inChannel.size(),
		outChannel);
		}
		catch (IOException e) {
		throw e;
		}
		finally {
		if (inChannel != null) inChannel.close();
		if (outChannel != null) outChannel.close();
		}
	}

	/**
	* copy using java.nio classes
	*/

	private boolean doNio(){
		try{
			 String sUrl = getParam("url", "");
			 String debug = "make url " + sUrl;
			 URL toCopy = new URL(sUrl);
			 String printerUnc = getParam("printer", "");
			 debug = "get is " + sUrl;
			 InputStream is = new BufferedInputStream(toCopy.openConnection().getInputStream());
			 File ff = File.createTempFile("sel2in_print_", "tmp");
			 OutputStream fos = new BufferedOutputStream(new FileOutputStream(ff));
			 d("Temp file : "+ ff.getAbsolutePath());
			 int r=0;
			 debug = "io  " + ff;
			 byte []by = new byte[512];
			 while((r=is.read(by)) > 0){
				 fos.write(by,0 , r);
			 }
			 fos.close();
			 is.close();

			 d("copy to " + printerUnc);


			 debug = "To " + printerUnc;

			 boolean bb = copyFile(ff, new File(printerUnc));
			 d("nio copy was ok " + bb);


			 String sSleep = getParam("justSleepAfter", "0");
			 if(!sSleep.equals("")){
				 int s = Integer.parseInt(sSleep);
				 d("sleep "+s);
				 if(s>0){
					Thread.sleep(s);

				}
			 }

			 String run1 = getParam("run1", "");
			 d("run 1 " + run1);
			 if(!"".equals(run1)){
				 Runtime rn = Runtime.getRuntime();
				 Process p = rn.exec(new String[]{run1, ff.getAbsolutePath(), printerUnc});
				 d("ran " + p);
				 try{

				 p3 =
				 new com.tracmor.gen.lng.ProcessOutputReader (
					 p,  getParam("tempFolder", "./"), true);
				 }catch(Throwable e){
					d("Err Proc read " + "\n" + e);
				 	u.sl(e, e);
				 }
			 }



		}catch(Throwable e){
			d("Err NIO " + "\n" + e);
			u.sl(e, e);
			return false;
		}
		return true;

	}
}
