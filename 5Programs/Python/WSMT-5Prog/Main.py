from DataAccess import DataAccess
from Repository import Repository


def request_file():
    str = "------------Menu----------------\n\n"
    str += "Please enter the filename: \n"
    print(str)
    filename = input()
    return filename


def main():
    filename = request_file()
    data_access = DataAccess(filename)
    repo = Repository(data_access)
    repo.get_post_order_tree()


if __name__ == '__main__':
    main()
