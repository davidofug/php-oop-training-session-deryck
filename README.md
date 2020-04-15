# Introduction to OOP. aka Object Oriented Programming.

# The different programming paradigms

# Software design principles.
    - SOLID design principles
    - SRP – Single Responsibility Principle is respect by OOP
    - OCP – Open/Closed Principle
    - LSP – Liskov Substitution Principle
    - ISP – Interface Segregation Principle
    - DIP – Dependency Inversion Principle

# Software architectural patterns.
-- MVC
-- Micro-services
-- Others

# Classes should handle dedicated responsibilities.

# Assuming we are build a simple books library system

# Software Requirements Engineering so that we can come up with a Software Requirement Specifaction(SRS)

# BDD - Behavioural Driven Development using a language called Gherkin and tool like cucumber

## Feature: User registration
### Scenario: Register
    -- Given: I click "Sign up" on the home page a sign up form is displayed
    -- When: I click "Submit" on the sign up form
    -- Then: An error or success message will display.
    -- And:
    -- But: 

What is going handle the user registration? (user.register.php)
What is going to handle the user modification?(user.edit.php)
What is going to handle the user deletion or remove or suspension? (user.edit.php)
What is user authentication? (auth.php)
What is going to handle user retrieval? (users.php)

# Cons of following the above approach
- The code won't be easy to MAINTAIN - upgrading, adding features.
- The code won't be easy scalability will be very hard. PHPHVVM

# Class called users.php
What is a class? A class written plan defining how a certain functionality will be handled in code.
Class is are written using code.
A class should focus on a specific feature or model.
To use the plan/class when instantiate an object  out of the class.
They emphasize or promote modular code.
