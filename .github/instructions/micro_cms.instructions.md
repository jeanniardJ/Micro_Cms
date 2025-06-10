---
applyTo: '**'
---
# Micro CMS Instructions

## Project Scope
- This project is a micro CMS (Content Management System) designed to be lightweight and minimalistic.

## Project Features
- The Micro CMS must include:
  - A login system for user authentication.
  - A backoffice for managing content (articles, categories, users, etc.).
  - A frontoffice for displaying content to end users.

## Coding Standards
- Follow PSR-4, PSR-12 coding standards.
- Use type hints and return types in all PHP functions and methods.
- Use strict typing by declaring `declare(strict_types=1);` at the top of each PHP file.
- Use namespaces to organize code.
- Use meaningful variable and function names.
- Avoid using global variables.
- Use a consistent coding style throughout the project.
- Use a linter to check code style and quality.
- Use a code formatter to ensure consistent code style.

## Development Standards
- The project must be developed at an expert level.
- Use established design patterns such as MVC (Model-View-Controller) and CRUD (Create, Read, Update, Delete) for structuring the application.

## Testing
- Write unit tests for all new features and bug fixes using PHPUnit.
- Write integration tests to ensure the proper functioning of different parts of the system together.
- Add performance tests for critical functionalities.

## Static Analysis
- Use PHPStan for static analysis to ensure code quality and adherence to standards.

## Documentation
- Document all public classes and methods using PHPDoc.
- Use a README file to document the project, including installation instructions, usage examples, and contribution guidelines.
- Use a CHANGELOG file to document changes in each version.
- Use a LICENSE file to specify the project's license.

## Dependency Management
- Use Composer for dependency management.
- Keep dependencies up to date and follow semantic versioning.

## Compatibility
- Ensure code is compatible with PHP 8.0 or higher.

## Version Control
- Use Git for version control and follow a branching strategy (e.g., Git Flow).
- Write clear and concise commit messages.
- Use the GitHub Kanban board to manage tasks and track progress.
- Each feature must be validated by the project owner before being merged.
- All code reviews must be performed by the project owner.

## Security
- Perform regular security audits to identify and fix vulnerabilities.
- Validate user inputs to prevent security issues such as SQL injection and XSS.

## Performance
- Optimize performance for critical features and use database indexing where necessary.

## CI/CD
- Set up a CI/CD pipeline to automate testing and deployment processes using GitHub Actions.

## Error Handling
- Use exceptions for error handling instead of returning error codes.
- Centralize error handling and logging to facilitate debugging.

## Accessibility
- Ensure the application complies with accessibility standards (e.g., WCAG).

## Development Environment
- Use Docker to set up the development environment and ensure consistency across all team members.
- Docker is used specifically for the development environment to simplify setup and dependency management.

## Design Patterns
- Follow and document development patterns (e.g., Factory, Singleton, Repository) used in the project.

## Architecture
- Ensure the project follows the MVC (Model-View-Controller) architecture and is object-oriented.

## Framework Restrictions
- Do not use frameworks such as Symfony, React, or similar for this project.

## Database
- Use MySQL as the database for this project.

## Kanban Board
- The Kanban board for this project consists of 5 columns:
  1. **Backlog**: Contains all tasks and features to be implemented.
  2. **Ready**: Tasks that are ready to be picked up.
  3. **In Progress**: Tasks currently being worked on.
  4. **In Review**: Tasks awaiting review by the project owner.
  5. **Done**: Completed tasks.