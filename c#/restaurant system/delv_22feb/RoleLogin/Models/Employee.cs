using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace RoleLogin.Models
{
    public class Employee
    {
        [Key]
        public int EmpId { get; set; }

        [Required]
        public string EmpName { get; set; }

        [Required]
        public int DepartmentId { get; set; }

        [Required]
        public string ManagerName { get; set; }

        public DateTime DOB { get; set; }

        public Rank? Rank {get;set;}

        public DateTime LastDate {get;set;}

        public decimal Salary { get; set; }

        [Required]
        public string PreviousEmployer {get;set;}

        [Required]
        public string Appraisal{get;set;}

        public string ItemArtUrl { get; set; }
        public Byte[] Picture { get; set; }
    }
}