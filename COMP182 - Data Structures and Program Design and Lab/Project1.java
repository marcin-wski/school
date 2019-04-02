import java.io.*;
import java.util.*;

public class Project1
{
   public static void main(String[] args) throws Exception
   {
      //This is where we read the csv file from
      //Always keep this path updated, otherwise the entire program is worthless
      String csvFile = "/home/reksio/Documents/Class/StudentData.csv";
      String line = null;
      BufferedReader br = new BufferedReader(new FileReader(csvFile));
      
      //Making an array for both ID numbers and unique courses to count them and show the results later
      ArrayList<String> id = new ArrayList<String>();
      ArrayList<String> courses = new ArrayList<String>();
      
      //Variables needed for counting the unique students and unique courses
      int studentCount = 0;
      int coursesCount = 0;
      //Variables needed to count how many students are in each class level
      int freshman = 0;
      int sophomore = 0;
      int junior = 0;
      int senior = 0;
      //Blatant attempt to do the optional, extra credit, assignment, hoping that no other, new, course would be added
      int CIT101 = 0;
      int CIT101L = 0;
      int COMP182 = 0;
      int COMP182L = 0;
      
      //This single line will make the program to not read the first line of the file.
      //In other words the program will not count "ID, Name, Class Level, Course" as an unique student
      String firstLine = br.readLine();
      /*Everything is embedded in this one while loop, because we want to check the file only once. That way we could potentially save time
      of the processor. Several loops could also possibly give redundant, repeating, results. Also because it looks so much better
      when it's in just one loop*/
      while ((line = br.readLine()) != null)
      {
         //This string is needed for to read from the file and check how many students, their class levels, and courses are in the file
         String students[] = line.split(",");
         String studentID = students[0];
      
         /*We are disregarding any student in the file that does not have ID number, first name, last name, class level, and is not enrolled in a course,
         so we will not print any student that does not meet these requirements*/
         if (students.length == 5)
         {
            //Printing the entire file, to prove to the customer that the program did in fact read it
            System.out.println(students[1] + " " + students[2] + ", ID Number " + students[0] + ", is a " + students[3] + " enrolled in " + students[4]);
         
            //This if statement will only work for non-repeated ID numbers, effectively removing any redundant results
            if(!id.contains(studentID))
            {
               id.add(studentID);
               studentCount++;
            
               /*This if statement checks the student whose ID number was just checked above, and updates the counter for class levels.
               This way we count all unique students, because we check only those with unique ID numbers. All the rest,
               is discarted*/
               if (students[3].equals ("Freshman"))
                  freshman++;
               else if (students[3].equals ("Sophomore"))
                  sophomore++;
               else if (students[3].equals ("Junior"))
                  junior++;
               else if (students[3].equals ("Senior"))
                  senior++;
            }
         
            //This string check courses in the file and gets the unique courses in order to count them and present them to the customer
            String studentCourses = students[4];
            if(!courses.contains(studentCourses))
            {
               courses.add(studentCourses);
               coursesCount++;
            }   
            
            /*Again, blatant attempt to do the optional, extra credit, assignment, hoping that no other, new, course would be added.
            This if statement checks all students in the file that meet the requirement of lenght 5, and get the course they are
            enrolled in. This way we get the number of students enrolled in each course... As long as no new course is added that is.
            In that case we would have to go back to the code and manually add the new course*/
            if (students[4].equals ("CIT 101"))
               CIT101++;
            else if (students[4].equals ("CIT 101 Lab"))
               CIT101L++;
            else if (students[4].equals ("COMP 182"))
               COMP182++;
            else if (students[4].equals ("COMP 182 Lab"))
               COMP182L++;
         }
      }
      //The lines below will print the results we obtained from the lines above
      System.out.println();
      System.out.println("The file has been printed out. Proceeding with calculations...");
      System.out.println();
      System.out.print("There is ");
      System.out.print(studentCount);
      System.out.print(" unique students on the list.");
      System.out.println();
      System.out.print("There is " + freshman + " freshmen, " + sophomore + " sophomores, " + junior + " juniors, and " + senior + " seniors on the list");
      System.out.println();
      System.out.print("There is ");
      System.out.print(coursesCount);
      System.out.print(" unique courses on the list, and their names are: " + courses);
      System.out.println();
      System.out.print("There is " + CIT101 + " students interested in CIT 101, " + CIT101L + " students interested in CIT 101 Lab, " + COMP182 + " students interested in Comp 182, and " + COMP182L + " students interested in Comp 182 Lab on the list");
   }
   //Please excuse any grammar errors
   //Designed and made for Comp 182©
}