import java.io.*;
import java.util.*;

public class Project1c
{
   public static void main(String[] args) throws Exception
   {
      print();
      System.out.println();
      System.out.print("There is ");
      countStudents();
      System.out.print(" unique students on the list");
      System.out.println();
      System.out.print("There is ");
      countLevel();
      System.out.print(" on the list");
      System.out.println();
      System.out.print("There is ");
      countCourses();
      System.out.print(" unique courses on the list");      
   }
   
   public static void countStudents() throws Exception
   {
      String csvFile = "/home/reksio/Documents/Class/StudentData.csv";
      List<String> lines = new ArrayList<>();
      String line = null;
       
      BufferedReader br = new BufferedReader(new FileReader(csvFile));
      
      String currentid = null;
      int studentcount = 0;
      
      while ((line = br.readLine()) != null)
      {
         String[] list = line.split(",");
         String id = list[0];
         if (list.length == 5)
         if(!id.equals(currentid))
         {
            currentid = id;
            studentcount++;
         }
      }
      System.out.print(currentid);
   }

   public static void countLevel() throws Exception
   {
      String csvFile = "/home/reksio/Documents/Class/StudentData.csv";
      List<String> lines = new ArrayList<>();
      String line = null;
       
      BufferedReader br = new BufferedReader(new FileReader(csvFile));
      
      String currentid = null;
      int studentcount = 0;
      
      while ((line = br.readLine()) != null)
      {
         String[] list = line.split(",");
         String id = list[0];
         if (list.length == 5)
         if(!id.equals(currentid))
         {
            currentid = id;
            studentcount++;
         }
      }
      System.out.print(currentid);
   }

   public static void countCourses() throws Exception
   {
      String csvFile = "/home/reksio/Documents/Class/StudentData.csv";
      List<String> courses = new ArrayList<>();
      String line = null;
       
      BufferedReader br = new BufferedReader(new FileReader(csvFile));
      
      String currentcourse = null;
      int coursecount = 0;
      
      while ((line = br.readLine()) != null)
      {
         String[] list = line.split(",");
         String course = list[4];
         if (list.length == 5)
         {
         if(!courses.contains(course))
         {
            courses.add(course);
            coursecount++;
         }        
         }
      }
      System.out.print(coursecount);
   }
   
   public static void print() throws Exception
   {
      String csvFile = "/home/reksio/Documents/Class/StudentData.csv";
      String line = null;
   
      {
      
         BufferedReader br = new BufferedReader(new FileReader(csvFile));
         while ((line = br.readLine()) != null)
         {
            String[] students = line.split(",");
            if (students.length == 5)
            System.out.println(students[1] + " " + students[2] + ", ID Number " + students[0] + ", is a " + students[3] + " enrolled in " + students[4]);
         }
         
         System.out.println("Done");
      }
   }
}