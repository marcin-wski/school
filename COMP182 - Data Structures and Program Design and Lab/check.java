package com.mkyong.util;

import java.io.*;
import java.util.*;

public class check
{
  public void main(String[] args)
  {
   System.out.println("1st base");
	String csvFile = "/home/reksio/Downloads/StudentData.csv";
	BufferedReader br = null;
	String line = "";
	String cvsSplitBy = "\n";
   System.out.println("2nd base");
	try
	{
 
		br = new BufferedReader(new FileReader(csvFile));
		while ((line = br.readLine()) != null)
		{
 
		        // use comma as separator
			String[] country = line.split(cvsSplitBy);
 
			System.out.println("code= " + country[4] + " , name=" + country[5]);
 
		}
 
	}
	catch (FileNotFoundException e) 
	{
		e.printStackTrace();
	}
	catch (IOException e) 
	{
		e.printStackTrace();
	}
	finally
	{
		if (br != null)
		{
			try
			{
				br.close();
			}
			catch (IOException e) 
			{
				e.printStackTrace();
			}
		}
	}
 
	System.out.println("Done");
  }
 
}